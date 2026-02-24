<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\State;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    public function index(Request $request, $state = null, $city = null)
    {
        $query = Listing::query();

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

        // Add some basic ordering
        $query->orderBy('is_featured', 'desc')
            ->orderBy('name', 'asc');

        $listings = $query->paginate(12);

        return view('web.screens.listings.index', compact('listings', 'state', 'city'));
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
