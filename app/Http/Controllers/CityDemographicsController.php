<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CityDemographicsController extends Controller
{
    /**
     * Country-level page: List all states that have demographic data.
     */
    public function index(Request $request)
    {
        // Get distinct state_ids from city_demographics
        $stateIds = DB::connection('mysql2')
            ->table('city_demographics')
            ->select('state_id')
            ->distinct()
            ->pluck('state_id');

        // Get state details
        $query = DB::connection('mysql2')
            ->table('state')
            ->whereIn('id', $stateIds);

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $states = $query->orderBy('name', 'asc')->paginate(50);

        // Add aggregated stats for each state
        foreach ($states as $state) {
            $stats = DB::connection('mysql2')
                ->table('city_demographics')
                ->where('state_id', $state->id)
                ->selectRaw('
                    COUNT(*) as city_count,
                    SUM(population) as total_population,
                    SUM(senior_population) as total_senior_population,
                    AVG(percent_65_plus) as avg_percent_65_plus,
                    AVG(median_age) as avg_median_age,
                    AVG(avg_home_care_cost) as avg_home_care_cost,
                    AVG(life_expectancy) as avg_life_expectancy
                ')
                ->first();

            $state->stats = $stats;
        }

        return view('web.screens.country-demographics', compact('states'));
    }

    /**
     * State-level page: Show state overview + list cities in that state.
     */
    public function showState(Request $request, $stateId)
    {
        $state = DB::connection('mysql2')->table('state')->where('id', $stateId)->first();

        if (!$state) {
            abort(404);
        }

        // Aggregated state stats
        $stateStats = DB::connection('mysql2')
            ->table('city_demographics')
            ->where('state_id', $stateId)
            ->selectRaw('
                COUNT(*) as city_count,
                SUM(population) as total_population,
                SUM(senior_population) as total_senior_population,
                AVG(percent_65_plus) as avg_percent_65_plus,
                AVG(median_age) as avg_median_age,
                AVG(median_household_income) as avg_median_income,
                AVG(avg_home_care_cost) as avg_home_care_cost,
                AVG(life_expectancy) as avg_life_expectancy,
                AVG(disability_rate) as avg_disability_rate,
                SUM(nursing_homes) as total_nursing_homes,
                SUM(assisted_living_facilities) as total_assisted_living,
                SUM(memory_care_facilities) as total_memory_care,
                SUM(home_care_agencies) as total_home_care_agencies,
                SUM(hospice_providers) as total_hospice_providers,
                AVG(hourly_rate_low) as avg_hourly_low,
                AVG(hourly_rate_high) as avg_hourly_high,
                SUM(elder_law_firms_count) as total_elder_law_firms,
                SUM(estate_planning_lawyers_count) as total_estate_lawyers
            ')
            ->first();

        // Cities in this state (with search + pagination)
        $cityQuery = DB::connection('mysql2')
            ->table('city_demographics')
            ->where('state_id', $stateId);

        if ($request->filled('search')) {
            $cityQuery->where('city', 'like', '%' . $request->search . '%');
        }

        $cities = $cityQuery->orderBy('population', 'desc')->paginate(20);

        return view('web.screens.state-demographics', compact('state', 'stateStats', 'cities'));
    }

    /**
     * City-level page: Show detailed stats for a single city.
     */
    public function show($id)
    {
        $demographic = DB::connection('mysql2')->table('city_demographics')->where('id', $id)->first();

        if (!$demographic) {
            abort(404);
        }

        // Get the state info for breadcrumb navigation
        $state = DB::connection('mysql2')->table('state')->where('id', $demographic->state_id)->first();

        // Get nearby cities (same state, excluding current)
        $nearbyCities = DB::connection('mysql2')
            ->table('city_demographics')
            ->where('state_id', $demographic->state_id)
            ->where('id', '!=', $id)
            ->orderBy('population', 'desc')
            ->limit(8)
            ->get();

        // Get featured listings for this city
        $featuredListings = DB::connection('mysql2')
            ->table('listings')
            ->where('city', $demographic->city)
            ->orderBy('is_featured', 'desc')
            ->orderBy('rating_point', 'desc')
            ->limit(3)
            ->get();

        return view('web.screens.city-demographic-details', compact('demographic', 'state', 'nearbyCities', 'featuredListings'));
    }
}
