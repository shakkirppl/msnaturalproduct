<?php

namespace App\Http\Middleware;

use Closure;
use Stevebauman\Location\Facades\Location;
use Illuminate\Http\Request;

class LocationRedirect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        return redirect('/');
        // Detect the user's location based on IP
        $location = Location::get();
// dd($location);
        // Check if the location data is available
        if ($location) {
            switch ($location->countryCode) {
                case 'IN':
                    return redirect('/in'); // Redirects to 'yourproject.com/in'
                case 'AE':
                    return redirect('/uae'); // Redirects to 'yourproject.com/uae'
                    case 'US':
                        return redirect('/us');
                // Add more cases as needed for other countries
                default:
                    return redirect('/default'); // Redirects to 'yourproject.com/default'
            }
        }

        // If location couldn't be determined, redirect to a default route or proceed
        return redirect('/default'); // Change '/default' to your desired route
    }
}
