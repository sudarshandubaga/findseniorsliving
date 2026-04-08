<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use App\Models\Listing;
use App\Models\ElderlyLawyer;
use App\Models\Caregiver;
use App\Models\State;
use App\Models\HeroSlide;
use App\Models\WhyChooseFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        // Get user's country from session (set by middleware)
        $userCountry = session('user_country', 'United States');

        // Normalize country for DB query
        $dbCountry = $userCountry;
        if ($userCountry === 'United States') {
            $dbCountry = ['USA', 'United States'];
        }

        $featuredListings = Listing::where('is_featured', 1)
            ->when(is_array($dbCountry), function($q) use ($dbCountry) {
                return $q->whereIn('country', $dbCountry);
            }, function($q) use ($dbCountry) {
                return $q->where('country', $dbCountry);
            })
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $featuredLawyers = ElderlyLawyer::where('featured', 1)
            ->when(is_array($dbCountry), function($q) use ($dbCountry) {
                return $q->whereIn('country', $dbCountry);
            }, function($q) use ($dbCountry) {
                return $q->where('country', $dbCountry);
            })
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $featuredCaregivers = Caregiver::inRandomOrder()
            ->limit(12)
            ->get();

        // Location Listings Data
        $cities = Listing::select('city', 'state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->when(is_array($dbCountry), function($q) use ($dbCountry) {
                return $q->whereIn('country', $dbCountry);
            }, function($q) use ($dbCountry) {
                return $q->where('country', $dbCountry);
            })
            ->groupBy('city', 'state', 'country')
            ->orderBy('count', 'desc')
            ->limit(90)
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->city . ', ' . $this->getStateFullName($item->state),
                    'count' => $item->count,
                    'city_slug' => strtolower(str_replace(' ', '-', $item->city)),
                    'state_slug' => strtolower($item->state),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        $states = Listing::select('state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->when(is_array($dbCountry), function($q) use ($dbCountry) {
                return $q->whereIn('country', $dbCountry);
            }, function($q) use ($dbCountry) {
                return $q->where('country', $dbCountry);
            })
            ->groupBy('state', 'country')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $this->getStateFullName($item->state),
                    'count' => $item->count,
                    'slug' => strtolower(str_replace(' ', '-', $item->state)),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        // Lawyer Location Data
        $lawyerCities = ElderlyLawyer::select('city', 'state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->when(is_array($dbCountry), function($q) use ($dbCountry) {
                return $q->whereIn('country', $dbCountry);
            }, function($q) use ($dbCountry) {
                return $q->where('country', $dbCountry);
            })
            ->groupBy('city', 'state', 'country')
            ->orderBy('count', 'desc')
            ->limit(90)
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->city . ', ' . $this->getStateFullName($item->state),
                    'count' => $item->count,
                    'city_slug' => strtolower(str_replace(' ', '-', $item->city)),
                    'state_slug' => strtolower($item->state),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        $lawyerStates = ElderlyLawyer::select('state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->when(is_array($dbCountry), function($q) use ($dbCountry) {
                return $q->whereIn('country', $dbCountry);
            }, function($q) use ($dbCountry) {
                return $q->where('country', $dbCountry);
            })
            ->groupBy('state', 'country')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $this->getStateFullName($item->state),
                    'count' => $item->count,
                    'slug' => strtolower(str_replace(' ', '-', $item->state)),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        $heroSlides = HeroSlide::orderBy('sort_order')->get();
        $whyChooseFeatures = WhyChooseFeature::orderBy('sort_order')->get();

        return view('web.screens.home', compact(
            'featuredListings',
            'featuredLawyers',
            'featuredCaregivers',
            'cities',
            'states',
            'lawyerCities',
            'lawyerStates',
            'heroSlides',
            'whyChooseFeatures'
        ));
    }

    public function setCountry(Request $request)
    {
        $request->validate([
            'country' => 'required|string'
        ]);

        session(['user_country' => $request->country]);

        return redirect()->back();
    }

    private function getStateFullName($code)
    {
        $states = [
            'AL' => 'Alabama',
            'AK' => 'Alaska',
            'AZ' => 'Arizona',
            'AR' => 'Arkansas',
            'CA' => 'California',
            'CO' => 'Colorado',
            'CT' => 'Connecticut',
            'DE' => 'Delaware',
            'FL' => 'Florida',
            'GA' => 'Georgia',
            'HI' => 'Hawaii',
            'ID' => 'Idaho',
            'IL' => 'Illinois',
            'IN' => 'Indiana',
            'IA' => 'Iowa',
            'KS' => 'Kansas',
            'KY' => 'Kentucky',
            'LA' => 'Louisiana',
            'ME' => 'Maine',
            'MD' => 'Maryland',
            'MA' => 'Massachusetts',
            'MI' => 'Michigan',
            'MN' => 'Minnesota',
            'MS' => 'Mississippi',
            'MO' => 'Missouri',
            'MT' => 'Montana',
            'NE' => 'Nebraska',
            'NV' => 'Nevada',
            'NH' => 'New Hampshire',
            'NJ' => 'New Jersey',
            'NM' => 'New Mexico',
            'NY' => 'New York',
            'NC' => 'North Carolina',
            'ND' => 'North Dakota',
            'OH' => 'Ohio',
            'OK' => 'Oklahoma',
            'OR' => 'Oregon',
            'PA' => 'Pennsylvania',
            'RI' => 'Rhode Island',
            'SC' => 'South Carolina',
            'SD' => 'South Dakota',
            'TN' => 'Tennessee',
            'TX' => 'Texas',
            'UT' => 'Utah',
            'VT' => 'Vermont',
            'VA' => 'Virginia',
            'WA' => 'Washington',
            'WV' => 'West Virginia',
            'WI' => 'Wisconsin',
            'WY' => 'Wyoming'
        ];
        return $states[strtoupper($code)] ?? $code;
    }

    private function guessStateCode($name)
    {
        $states = [
            'Alabama' => 'AL',
            'Alaska' => 'AK',
            'Arizona' => 'AZ',
            'Arkansas' => 'AR',
            'California' => 'CA',
            'Colorado' => 'CO',
            'Connecticut' => 'CT',
            'Delaware' => 'DE',
            'Florida' => 'FL',
            'Georgia' => 'GA',
            'Hawaii' => 'HI',
            'Idaho' => 'ID',
            'Illinois' => 'IL',
            'Indiana' => 'IN',
            'Iowa' => 'IA',
            'Kansas' => 'KS',
            'Kentucky' => 'KY',
            'Louisiana' => 'LA',
            'Maine' => 'ME',
            'Maryland' => 'MD',
            'Massachusetts' => 'MA',
            'Michigan' => 'MI',
            'Minnesota' => 'MN',
            'Mississippi' => 'MS',
            'Missouri' => 'MO',
            'Montana' => 'MT',
            'Nebraska' => 'NE',
            'Nevada' => 'NV',
            'New Hampshire' => 'NH',
            'New Jersey' => 'NJ',
            'New Mexico' => 'NM',
            'New York' => 'NY',
            'North Carolina' => 'NC',
            'North Dakota' => 'ND',
            'Ohio' => 'OH',
            'Oklahoma' => 'OK',
            'Oregon' => 'OR',
            'Pennsylvania' => 'PA',
            'Rhode Island' => 'RI',
            'South Carolina' => 'SC',
            'South Dakota' => 'SD',
            'Tennessee' => 'TN',
            'Texas' => 'TX',
            'Utah' => 'UT',
            'Vermont' => 'VT',
            'Virginia' => 'VA',
            'Washington' => 'WA',
            'West Virginia' => 'WV',
            'Wisconsin' => 'WI',
            'Wyoming' => 'WY'
        ];
        return $states[$name] ?? null;
    }
}
