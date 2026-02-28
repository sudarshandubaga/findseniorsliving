<?php

namespace App\Http\Controllers;

use App\Models\ServiceType;
use App\Models\Listing;
use App\Models\ElderlyLawyer;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $featuredListings = Listing::where('is_featured', 1)
            ->inRandomOrder()
            ->limit(12)
            ->get();

        $featuredLawyers = ElderlyLawyer::where('featured', 1)
            ->inRandomOrder()
            ->limit(12)
            ->get();

        // Location Listings Data
        $cities = Listing::select('city', 'state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->groupBy('city', 'state', 'country')
            ->orderBy('count', 'desc')
            ->limit(90)
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->city . ', ' . $item->state,
                    'count' => $item->count,
                    'city_slug' => strtolower(str_replace(' ', '-', $item->city)),
                    'state_slug' => strtolower($item->state),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        $states = Listing::select('state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->groupBy('state', 'country')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->state,
                    'count' => $item->count,
                    'slug' => strtolower(str_replace(' ', '-', $item->state)),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        // Lawyer Location Data
        $lawyerCities = ElderlyLawyer::select('city', 'state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->groupBy('city', 'state', 'country')
            ->orderBy('count', 'desc')
            ->limit(90)
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->city . ', ' . $item->state,
                    'count' => $item->count,
                    'city_slug' => strtolower(str_replace(' ', '-', $item->city)),
                    'state_slug' => strtolower($item->state),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        $lawyerStates = ElderlyLawyer::select('state', 'country', DB::raw('count(*) as count'))
            ->whereNotNull('state')
            ->where('state', '!=', '')
            ->groupBy('state', 'country')
            ->orderBy('count', 'desc')
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->state,
                    'count' => $item->count,
                    'slug' => strtolower(str_replace(' ', '-', $item->state)),
                    'country_slug' => strtolower($item->country)
                ];
            })->toArray();

        return view('web.screens.home', compact('featuredListings', 'featuredLawyers', 'cities', 'states', 'lawyerCities', 'lawyerStates'));
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
