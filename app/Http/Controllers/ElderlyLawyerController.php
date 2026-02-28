<?php

namespace App\Http\Controllers;

use App\Models\ElderlyLawyer;
use Illuminate\Http\Request;

class ElderlyLawyerController extends Controller
{
    public function index(Request $request, $country = null, $state = null, $city = null)
    {
        $query = ElderlyLawyer::query();

        if ($state) {
            $stateName = str_replace('-', ' ', $state);
            $query->where(function ($q) use ($state, $stateName) {
                $q->where('state', 'LIKE', $state)
                    ->orWhere('state', 'LIKE', $stateName);
            });
        }

        if ($city) {
            $cityName = str_replace('-', ' ', $city);
            $query->where(function ($q) use ($city, $cityName) {
                $q->where('city', 'LIKE', $city)
                    ->orWhere('city', 'LIKE', $cityName);
            });
        }

        $query->orderBy('featured', 'desc')
            ->orderBy('name', 'asc');

        $lawyers = $query->paginate(12)->onEachSide(1);

        return view('web.screens.elderly-lawyers.index', compact('lawyers', 'state', 'city'));
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
