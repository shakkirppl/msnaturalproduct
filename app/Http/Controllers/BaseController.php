<?php
namespace App\Http\Controllers;

use App\Models\Countries;
use App\Models\Stores;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Session;

class BaseController extends Controller
{
    protected $countryCode;
    protected $language;
    protected $storeId;
    protected $currency;

    public function __construct()
    {
       
        if (Session::has('activecountry')) {
          return  $this->countryCode = Session::get('activecountry');
        } else {
            $position = Location::get();
            $this->countryCode = $position->countryCode ?? 'IN'; // Default to 'IN'
            Session::put('activecountry', $this->countryCode);
        }

        $this->language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        $store = Stores::where('countryCode', $this->countryCode)->first();
        $this->storeId = $store->id ?? 1;
        $this->currency = $store->currency ?? 'INR';

        // Share data with views
        view()->share([
            'countryCode' => $this->countryCode,
            'language' => $this->language,
            'storeId' => $this->storeId,
            'currency' => $this->currency,
        ]);
    }
}