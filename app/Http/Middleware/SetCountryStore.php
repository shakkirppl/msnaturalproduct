<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;
use App\Models\Countries;
use App\Models\Stores;
use Stevebauman\Location\Facades\Location;

class SetCountryStore
{
    public function handle($request, Closure $next)
    {
        if (Session::has('activecountry')) {
            $countryCode = Session::get('activecountry');
        } else {
            $position = Location::get();
            $countryCode = $position->countryCode ?? 'IN'; // Default to 'IN' if countryCode is null
            Session::put('activecountry', $countryCode);
        }

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        $store = Stores::where('countryCode', $countryCode)->first();
        $storeId = $store->id ?? 1;
        $currency = $store->currency ?? 'INR';

        // Share data across views
        view()->share(compact('countryCode', 'language', 'storeId', 'currency'));

        return $next($request);
    }
}