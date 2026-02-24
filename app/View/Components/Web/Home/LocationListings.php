<?php

namespace App\View\Components\Web\Home;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\State;
use App\Models\Zipcode;
use App\Models\Listing;
use Illuminate\Support\Facades\DB;

class LocationListings extends Component
{
    public $cities;
    public $states;

    public function __construct()
    {
        // Get top cities with listing counts from listings table
        $this->cities = DB::connection('mysql2')->table('listings')
            ->select('city', 'state', DB::raw('count(*) as count'))
            ->whereNotNull('city')
            ->where('city', '!=', '')
            ->groupBy('city', 'state')
            ->orderBy('count', 'desc')
            ->limit(90)
            ->get()
            ->map(function ($item) {
                return [
                    'name' => $item->city . ', ' . $item->state,
                    'count' => $item->count,
                    'city_slug' => strtolower(str_replace(' ', '-', $item->city)),
                    'state_slug' => strtolower($item->state)
                ];
            })->toArray();

        // Get states from state table
        $this->states = DB::connection('mysql2')->table('state')
            ->where('status', 1)
            ->orderBy('name', 'asc')
            ->get()
            ->map(function ($item) {
                // We need to count listings for this state. 
                // Since state table uses full name but listings uses code, 
                // we might need a mapping or check how to join.
                // For now, let's just get the count from listings using the state name if applicable, 
                // but usually there's a mapping.
    
                // Let's assume for the demo that we can get the count by state code if we had it.
                // If the user wants "dynamic states (state table)", we use this table for labels.
    
                return [
                    'name' => $item->name,
                    'count' => DB::connection('mysql2')->table('listings')->where('state', $item->name)->count() ?:
                        DB::connection('mysql2')->table('listings')->where('state', $this->guessStateCode($item->name))->count(),
                    'slug' => strtolower($this->guessStateCode($item->name) ?: str_replace(' ', '-', $item->name))
                ];
            })->toArray();
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

    public function render(): View|Closure|string
    {
        return view('components.web.home.location-listings');
    }
}
