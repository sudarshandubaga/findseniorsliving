<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class SetUserCountry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('user_country')) {
            $ip = $request->ip();
            
            // For testing local IPs
            if ($ip === '127.0.0.1' || $ip === '::1' || str_starts_with($ip, '192.168.') || str_starts_with($ip, '10.')) {
                $userCountry = 'United States';
            } else {
                $userCountry = Cache::remember('user_country_' . $ip, 86400, function () use ($ip) {
                    try {
                        $response = Http::get("http://ip-api.com/json/{$ip}");
                        if ($response->successful()) {
                            return $response->json('country') ?? 'United States';
                        }
                    } catch (\Exception $e) {
                        // Log error or handle fallback
                    }
                    return 'United States';
                });
            }
            
            // Normalize "USA" to "United States" or keep it consistent
            if ($userCountry === 'USA') {
                $userCountry = 'United States';
            }
            
            Session::put('user_country', $userCountry);
        }

        return $next($request);
    }
}
