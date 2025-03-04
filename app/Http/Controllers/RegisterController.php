<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Stores;
use App\Models\Countries;
use App\Models\Customer;
use App\Models\CustomerAddress;
use App\Models\Order;
use App\Models\StatesModel;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Auth\LoginRequest;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use DB;
class RegisterController extends Controller
{
    //
    
    public function customer_address(Request $request)
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
       if(session('activecountry')){
           $countryCode=session('activecountry');
       }
       else{
           $position = Location::get();
           $countryCode = $position->countryCode; // For example, 'IN' for India, 'OM' for Oman, etc.
           $request->session()->put('activecountry',$countryCode);
       }
       $store = Stores::where('countryCode', $countryCode)->first();
       if (!$store) {
        $store = Stores::where('countryCode', 'IN')->first();
    }
     
       $storeId = $store->id ?? 1;
       $currency=$store->currency?? 'INR';
       $countries=Countries::get();
       $states= StatesModel::where('country_id', $store->country_id)->get();
      $billingStates= StatesModel::where('country_id', $store->country_id)->get();
       $cartItems = Cart::getContent();
       $customer=Customer::where('user_id',Auth::user()->id)->first();
       $customerAddress=CustomerAddress::with('countrys','states')->where('user_id',Auth::user()->id)->get();
        return view('front-end.address',compact('language','storeId','countries','currency','cartItems','customer','states','billingStates','customerAddress'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function login(Request $request)
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
       if(session('activecountry')){
           $countryCode=session('activecountry');
       }
       else{
           $position = Location::get();
           $countryCode = $position->countryCode; // For example, 'IN' for India, 'OM' for Oman, etc.
           $request->session()->put('activecountry',$countryCode);
       }
      
       $store = Stores::where('countryCode', $countryCode)->first();
       $storeId = $store->id ?? 1;
       $currency=$store->currency?? 'INR';
       $countries=Countries::get();
       $cartItems = Cart::getContent();
        return view('front-end.login',compact('language','storeId','countries','currency','cartItems'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function register(Request $request)
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        $request->session()->put('activecountry','IN');
       if(session('activecountry')){
           $countryCode=session('activecountry');
       }
       else{
           $position = Location::get();
           $countryCode = $position->countryCode; // For example, 'IN' for India, 'OM' for Oman, etc.
           $request->session()->put('activecountry',$countryCode);
       }
      
       $store = Stores::where('countryCode', $countryCode)->first();
       $storeId = $store->id ?? 1;
       $currency=$store->currency?? 'INR';
       $countries=Countries::get();
       $cartItems = Cart::getContent();
       $originalPrice=0;
       $offerPrice=0;
       foreach ($cartItems as $item) {
           $originalPrice+=$item->attributes->original_price;
           $offerPrice+=$item->price;
        }
        return view('front-end.signup',compact('language','storeId','countries','currency','cartItems','originalPrice','offerPrice'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function account(Request $request)
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        $request->session()->put('activecountry','IN');
       if(session('activecountry')){
           $countryCode=session('activecountry');
       }
       else{
           $position = Location::get();
           $countryCode = $position->countryCode; // For example, 'IN' for India, 'OM' for Oman, etc.
           $request->session()->put('activecountry',$countryCode);
       }
      
       $store = Stores::where('countryCode', $countryCode)->first();
       $storeId = $store->id ?? 1;
       $currency=$store->currency?? 'INR';
       $countries=Countries::get();
       $cartItems = Cart::getContent();
       $originalPrice=0;
       $offerPrice=0;
       foreach ($cartItems as $item) {
           $originalPrice+=$item->attributes->original_price;
           $offerPrice+=$item->price;
        }
        if(Auth::user()){
            if (Auth::user()->role_id == 3) { // Check if the user has role_id 3
                return redirect('your-profile'); // Redirect to the profile page
            }
            else{
                return view('front-end.account',compact('language','storeId','countries','currency','cartItems','originalPrice','offerPrice'));
            }
        }
        else{
            return view('front-end.account',compact('language','storeId','countries','currency','cartItems','originalPrice','offerPrice'));
        }
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function register_user(Request $request)
    {
        //  return $request->all();
        // $request->validate([
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        try {

        if(session('activecountry')){
            $countryCode=session('activecountry');
        }
        else{
            $position = Location::get();
            $countryCode = $position->countryCode; // For example, 'IN' for India, 'OM' for Oman, etc.
            $request->session()->put('activecountry',$countryCode);
        }
        $store = Stores::where('countryCode', $countryCode)->first();
        $storeId = $store->id ?? 1;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=>3,
            'store_id'=>$storeId
        ]);

        event(new Registered($user));
        $customer=new Customer;
        $customer->first_name=$request->name;
        $customer->email=$request->email;
        $customer->user_id=$user->id;
        $customer->store_id=$storeId;
        $customer->country_id=$storeId;
        $customer->save();
        Auth::login($user);

        return redirect('/');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function login_user(LoginRequest $request): RedirectResponse
    {
        try {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function admin_login_post(LoginRequest $request)
    {
        try {

        $request->authenticate();

        $request->session()->regenerate();

        return redirect('dashboard');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
  
    public function add_shipping_address(Request $request)
    {
       
        //  return 'ok';
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255']
        ]);
  
        try {
        $id=Auth::id();
        DB::transaction(function () use ($request, $id) {
            $customer=new CustomerAddress;
            $customer->user_id=$id;
            $customer->first_name=$request->first_name;
            $customer->last_name=$request->last_name;
            $customer->address=$request->address;
            $customer->landmark=$request->landmark;
            $customer->city=$request->city;
            $customer->state=$request->state;
            $customer->pincode=$request->pincode;
            $customer->phone_number=$request->phone_number;
            $customer->country_id=$request->country_id;
            $customer->store_id=$request->store_id;
            $customer->save();
    }); 
        return back();
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function add_new_shipping_address(Request $request)
    {
       
        //  return 'ok';
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255']
        ]);
  
        try {
        $id=Auth::id();
        DB::transaction(function () use ($request, $id) {
            CustomerAddress::where('user_id', $id)
            ->update(['deafult' => 0]);
            $customer=new CustomerAddress;
            $customer->user_id=$id;
            $customer->first_name=$request->first_name;
            $customer->last_name=$request->last_name;
            $customer->address=$request->address;
            $customer->landmark=$request->landmark;
            $customer->city=$request->city;
            $customer->state=$request->state;
            $customer->pincode=$request->pincode;
            $customer->phone_number=$request->phone_number;
            $customer->country_id=$request->country_id;
            $customer->store_id=$request->store_id;
            $customer->deafult=1;
            $customer->save();
          
    }); 
        return redirect('checkout');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    
    public function update_shipping_address(Request $request)
    {
        //   return $request->all();
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
            'state_id' => ['required', 'integer'],
        ]);
        try {
        
        DB::transaction(function () use ($request) {
            $customer= CustomerAddress::find($request->id);
            $customer->first_name=$request->first_name;
            $customer->last_name=$request->last_name;
            $customer->address=$request->address;
            $customer->landmark=$request->landmark;
            $customer->city=$request->city;
            $customer->state=$request->state_id;
            $customer->pincode=$request->pincode;
            $customer->phone_number=$request->phone_number;
            $customer->country_id=$request->country_id;
            $customer->save();
    }); 
        return redirect('your-profile');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function address_edit(Request $request,$id)
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
       if(session('activecountry')){
           $countryCode=session('activecountry');
       }
       else{
           $position = Location::get();
           $countryCode = $position->countryCode; // For example, 'IN' for India, 'OM' for Oman, etc.
           $request->session()->put('activecountry',$countryCode);
       }
       $store = Stores::where('countryCode', $countryCode)->first();
       if (!$store) {
        $store = Stores::where('countryCode', 'IN')->first();
    }
     
       $storeId = $store->id ?? 1;
       $currency=$store->currency?? 'INR';
       $customerAddress=CustomerAddress::find($id);
       $countries=Countries::get();
      $billingStates= StatesModel::where('country_id', $customerAddress->country_id)->get();
       $cartItems = Cart::getContent();
      
        return view('front-end.edit-address',compact('language','storeId','countries','currency','cartItems','billingStates','customerAddress'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function address_new(Request $request)
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
       if(session('activecountry')){
           $countryCode=session('activecountry');
       }
       else{
           $position = Location::get();
           $countryCode = $position->countryCode; // For example, 'IN' for India, 'OM' for Oman, etc.
           $request->session()->put('activecountry',$countryCode);
       }
       $store = Stores::where('countryCode', $countryCode)->first();
       if (!$store) {
        $store = Stores::where('countryCode', 'IN')->first();
    }
   $orders = Order::with([
        'orderdetails.product', // Load product details for each order detail
        'orderdetails.productSize' // Load product size for each order detail
    ])->where('customer_id', Auth::user()->id)->orderBy('id','DESC')->get();
       $storeId = $store->id ?? 1;
       $currency=$store->currency?? 'INR';
       $countries=Countries::get();
      $billingStates= StatesModel::where('country_id', $storeId)->get();
       $cartItems = Cart::getContent();
      
        return view('front-end.address-new',compact('language','storeId','countries','currency','cartItems','billingStates','orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    
    public function address_remove(Request $request,$id)
    {
        try {
            $customerAddress=CustomerAddress::find($id);
            $customerAddress->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function address_set_default(Request $request,$id)
    {
        try {
            $customerAddress=CustomerAddress::find($id);
            $customerAddress->deafult=1;
            $customerAddress->save();
            CustomerAddress::where('id', '!=', $id)
            ->where('user_id', $customerAddress->user_id)
            ->update(['deafult' => 0]);
            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
}
