<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\ServiceType;
use App\Models\State;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request, $country = null, $state = null, $city = null)
    {
        $query = Listing::query();

        // Country filtering
        $userCountry = session('user_country', 'United States');
        $dbCountry = $userCountry;
        if ($userCountry === 'United States') {
            $dbCountry = ['USA', 'United States'];
        }

        if (is_array($dbCountry)) {
            $query->whereIn('country', $dbCountry);
        } else {
            $query->where('country', $dbCountry);
        }

        // Handle state code mapping
        if ($state) {
            $stateCode = strlen($state) === 2 ? strtoupper($state) : $this->getStateCode($state);
            if ($stateCode) {
                $query->where('state', $stateCode);
            } else {
                // Try matching by name if code mapping fails
                $query->where('state', 'LIKE', '%' . str_replace('-', ' ', $state) . '%');
            }
        }

        if ($city) {
            $cityName = ucwords(str_replace('-', ' ', $city));
            $query->where('city', $cityName);
        }

        if ($request->filled('search')) {
            $query->where('name', 'LIKE', '%' . $request->input('search') . '%');
        }

        // Handle generic location input which checks city, state, or zipcode
        if ($request->filled('location')) {
            $location = $request->input('location');
            $query->where(function($q) use ($location) {
                $q->where('city', 'LIKE', '%' . $location . '%')
                  ->orWhere('state', 'LIKE', '%' . $location . '%')
                  ->orWhere('zipcode', 'LIKE', '%' . $location . '%');
            });
        }

        $serviceTypes = ServiceType::orderBy('name', 'asc')->get();
        // Since we don't have an Amenity model, fetch from DB
        $amenities = \Illuminate\Support\Facades\DB::connection('mysql2')->table('amenities')->orderBy('name', 'asc')->get();

        // Care Type -> Services array
        if ($request->has('services') && is_array($request->input('services'))) {
            $serviceIds = $request->input('services');
            $query->where(function($q) use ($serviceIds) {
                foreach ($serviceIds as $id) {
                    $q->orWhereRaw("FIND_IN_SET(?, service_type_id)", [$id]);
                }
            });
        } elseif ($request->filled('service')) {
            // Fallback for older single service slug URL
            $serviceSlug = $request->input('service');
            $service = ServiceType::where('slug', $serviceSlug)->first();
            if ($service) {
                $query->whereRaw("FIND_IN_SET(?, service_type_id)", [$service->id]);
            }
        }

        // Service Type -> Amenities array
        if ($request->has('amenities') && is_array($request->input('amenities'))) {
            $amenityIds = $request->input('amenities');
            $query->where(function($q) use ($amenityIds) {
                foreach ($amenityIds as $id) {
                    $q->orWhereRaw("FIND_IN_SET(?, amenities_type_id)", [$id]);
                }
            });
        }

        // Add sorting
        if ($request->filled('sort')) {
            if ($request->input('sort') == 'name_asc') {
                $query->orderBy('name', 'asc');
            } elseif ($request->input('sort') == 'popular') {
                $query->orderBy('rating_point', 'desc')->orderBy('name', 'asc');
            } else {
                // newest
                $query->orderBy('id', 'desc');
            }
        } else {
            $query->orderBy('is_featured', 'desc')->orderBy('name', 'asc');
        }

        $listings = $query->paginate(12)->withQueryString()->onEachSide(1);

        return view('web.screens.listings.index', compact('listings', 'state', 'city', 'serviceTypes', 'amenities'));
    }

    private function getStateCode($name)
    {
        $name = strtolower(str_replace('-', ' ', $name));
        $states = [
            'alabama' => 'AL',
            'alaska' => 'AK',
            'arizona' => 'AZ',
            'arkansas' => 'AR',
            'california' => 'CA',
            'colorado' => 'CO',
            'connecticut' => 'CT',
            'delaware' => 'DE',
            'florida' => 'FL',
            'georgia' => 'GA',
            'hawaii' => 'HI',
            'idaho' => 'ID',
            'illinois' => 'IL',
            'indiana' => 'IN',
            'iowa' => 'IA',
            'kansas' => 'KS',
            'kentucky' => 'KY',
            'louisiana' => 'LA',
            'maine' => 'ME',
            'maryland' => 'MD',
            'massachusetts' => 'MA',
            'michigan' => 'MI',
            'minnesota' => 'MN',
            'mississippi' => 'MS',
            'missouri' => 'MO',
            'montana' => 'MT',
            'nebraska' => 'NE',
            'nevada' => 'NV',
            'new-hampshire' => 'NH',
            'new-jersey' => 'NJ',
            'new-mexico' => 'NM',
            'new-york' => 'NY',
            'north-carolina' => 'NC',
            'north-dakota' => 'ND',
            'ohio' => 'OH',
            'oklahoma' => 'OK',
            'oregon' => 'OR',
            'pennsylvania' => 'PA',
            'rhode-island' => 'RI',
            'south-carolina' => 'SC',
            'south-dakota' => 'SD',
            'tennessee' => 'TN',
            'texas' => 'TX',
            'utah' => 'UT',
            'vermont' => 'VT',
            'virginia' => 'VA',
            'washington' => 'WA',
            'west-virginia' => 'WV',
            'wisconsin' => 'WI',
            'wyoming' => 'WY'
        ];
        return $states[$name] ?? null;
    }
}
