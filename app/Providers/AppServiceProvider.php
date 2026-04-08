<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $countriesData = \Illuminate\Support\Facades\Cache::remember('available_countries_list', 86400, function () {
            $listingCountries = \App\Models\Listing::select('country')->distinct()->whereNotNull('country')->pluck('country')->toArray();
            $lawyerCountries = \App\Models\ElderlyLawyer::select('country')->distinct()->whereNotNull('country')->pluck('country')->toArray();
            return array_unique(array_merge($listingCountries, $lawyerCountries));
        });

        $isoMapping = [
            'United States' => 'us',
            'USA' => 'us',
            'United States of America' => 'us',
            'Canada' => 'ca',
            'India' => 'in',
            'United Kingdom' => 'gb',
            'UK' => 'gb',
            'Australia' => 'au',
            'New Zealand' => 'nz',
            'Ireland' => 'ie',
            'South Africa' => 'za',
        ];

        $countries = [];
        foreach ($countriesData as $cName) {
            $normName = ($cName === 'USA' || $cName === 'United States of America') ? 'United States' : $cName;

            // Skip if already added
            if (isset($countries[$normName]))
                continue;

            $iso = $isoMapping[$cName] ?? (isset($isoMapping[$normName]) ? $isoMapping[$normName] : 'us');

            $countries[$normName] = [
                'name' => $normName,
                'flag' => "https://flagcdn.com/w40/{$iso}.png",
                'iso' => $iso
            ];
        }

        // dd($countries);

        // Fallback for clean DB
        if (empty($countries)) {
            $countries['United States'] = ['name' => 'United States', 'flag' => 'https://flagcdn.com/w40/us.png', 'iso' => 'us'];
        }

        view()->share('availableCountries', $countries);

        \Illuminate\Support\Facades\View::composer('*', function ($view) {
            $currentCountryName = session('user_country', 'United States');
            if ($currentCountryName === 'USA' || $currentCountryName === 'United States of America') {
                $currentCountryName = 'United States';
            }
            $view->with('currentCountryName', $currentCountryName);
        });
    }
}
