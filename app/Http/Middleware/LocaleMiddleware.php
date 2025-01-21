<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        // Check if 'locale' is set in session
        if (Session::has('locale')) {
            // Set the application locale
            App::setLocale(Session::get('locale'));
        }

        return $next($request);
    }
}