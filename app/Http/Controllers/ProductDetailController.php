<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Stores;
use App\Models\ProductSizes;
use App\Models\ProductPrices;
use App\Models\ProductImages;
use App\Models\Review;
use App\Models\Countries;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\App;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Http;
class ProductDetailController extends Controller
{
    //
    public function view($id,Request $request)
    {

      
        try {

            $countries=Countries::get();
            if (Session::has('activecountry')) {
                $countryCod = Session::get('activecountry');
            } else {
                $ip = request()->ip(); // Get client IP
                $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=b26ee61aa3ee4de5ab87ae1e4c83bee9&ip={$ip}");
                $data = $response->json();
                
                $countryCod = $data['country_code2'] ?? 'IN'; // Example: 'IN'
    
                Session::put('activecountry', $countryCod);
             }
    
            $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
            $store = Stores::where('countryCode', $countryCod)->first();
            $storeId = $store->id ?? 1;
            $currency = $store->currency ?? 'INR';


            
            // Get the product details, ensuring the product is available in the selected store
             $product = Product::WithLanguageDescrption()->Availability($storeId)->where('product_slug', $id)->first();

            if (!$product) {
                return redirect()->back()->with('error', 'Product not found');
            }
    
            // Get product sizes
            // $unitsdetail = ProductSizes::where('product_id', $product->id)
            //     ->select('id', 'size')->orderBy('id','ASC')
            //     ->get();
              $unitsdetail = ProductSizes::where('product_id', $product->id)
            ->whereHas('countries', function ($query) use ($storeId) {
                $query->where('countries.id', $storeId)
                      ->whereRaw("product_size_countries.is_active = 1");
            })
            ->select('id', 'size','image')
            ->orderBy('id', 'ASC')
            ->get();
                foreach($unitsdetail as $unit){
                     $productPrice = ProductPrices::where('product_size_id', $unit->id)
                    ->where('store_id', $storeId)
                    ->first();
                    if($productPrice){
                    
                    $units[]=[
                        'id'=>$unit->id,
                        'size'=>$unit->size,
                        'unitImage'=>$unit->image,
                        'original_price'=>$productPrice->original_price ?? 0,
                        'offer_price'=>$productPrice->offer_price ?? 0,
                        'product_prices_id'=>$productPrice->id ?? 0,
                        'currency'=>$productPrice->currency ?? 'INR'
                    ];
              
                }
            }
      
            // Get base unit for the product size
              $product_size_id = ProductSizes::where('product_id', $product->id)
                ->where('base_unit', 'Yes')
                ->value('id');
            
            // Get the product price for the base unit and selected store
            $selectedProductPrice = ProductPrices::where('product_size_id', $product_size_id)
                ->where('store_id', $storeId)
                ->first();
            if($selectedProductPrice){$offer=$selectedProductPrice->original_price-$selectedProductPrice->offer_price;}
            else{$offer=0;}
                

                $cartItems = Cart::getContent();

            //   $relatedProducts = Product::where('id', '!=', $product->id)->WithLanguageName()
            //     ->availability($storeId)->get();
                $relatedProducts = Product::where('id', '!=', $product->id)->WithLanguageName()->with(['baseprices' => function ($query) use ($storeId) {
                    $query->where('product_prices.store_id', $storeId);
                }])
                ->whereHas('countries', function ($query) use ($storeId) {
                    $query->where('countries_id', $storeId)->where('is_active', 1);
                })
                ->orderby('products.sort_order','ASC')
                ->get();

                $reProducts=[];
                foreach($relatedProducts as $related){
                    $product_size_id = ProductSizes::where('product_id', $related->id)
                    ->where('base_unit', 'Yes')
                    ->value('id');
                    $productPrice = ProductPrices::where('product_size_id', $product_size_id)
                    ->where('store_id', $storeId)
                    ->first();
            $productImages=ProductImages::where('product_id',$product->id)->orderBy('id','DESC')->get();
            $review=Review::with('user')->where('product_id',$product->id)->where('status','Active')->get();
                    $reProducts[]=[
                        'id'=>$related->id,
                        'name'=>$related->name,
                        'product_slug'=>$related->product_slug,
                        'image'=>$related->image,
                        'price'=>$productPrice->offer_price,
                        'original_price'=>$productPrice->original_price,
                        'short_description'=>$related->short_description
                        
                    ];
                }
           
            return view('front-end.product-detail', compact('product', 'units', 'selectedProductPrice', 'storeId', 'currency','language','countries','cartItems','reProducts','productImages','review','offer'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }

    public function product_review($id,Request $request)
    {

      
        try {
            if (session('activecountry')) {
                $countryCode = session('activecountry');
            } else {
                $ip = request()->ip(); // Get client IP
                $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=b26ee61aa3ee4de5ab87ae1e4c83bee9&ip={$ip}");
                $data = $response->json();
                
                $countryCode = $data['country_code2'] ?? 'IN'; // Example: 'IN'
    
                $request->session()->put('activecountry', $countryCode);
             }
            $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
            $countries=Countries::get();
            // Get the store based on the country code, with a fallback if no store is found
            $store = Stores::where('countryCode', $countryCode)->first();
            $storeId = $store->id ?? 1;
            $currency = $store->currency ?? 'INR';
            
            // Get the product details, ensuring the product is available in the selected store
                $cartItems = Cart::getContent();
                $product = Product::find($id);
            return view('front-end.review', compact('product','storeId', 'currency','language','countries','cartItems'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }
    public function reviews($id,Request $request)
    {

      
        try {

            $countries=Countries::get();
            if (Session::has('activecountry')) {
                $countryCod = Session::get('activecountry');
            } else {
                $ip = request()->ip(); // Get client IP
                $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=b26ee61aa3ee4de5ab87ae1e4c83bee9&ip={$ip}");
                $data = $response->json();
                
                $countryCod = $data['country_code2'] ?? 'IN'; // Example: 'IN'
                Session::put('activecountry', $countryCod);
            }
    
            $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
            $store = Stores::where('countryCode', $countryCod)->first();
            $storeId = $store->id ?? 1;
            $currency = $store->currency ?? 'INR';

            $product = Product::where('product_slug', $id)->first();
            
            // Get the product details, ensuring the product is available in the selected store
          
            // Get product sizes
            
      
            // Get base unit for the product size
           
                $cartItems = Cart::getContent();


                $review=Review::with('user')->where('product_id',$product->id)->where('status','Active')->get();
            
           
            return view('front-end.more-reviews', compact('product',  'storeId', 'currency','language','countries','cartItems','review'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }

    
}
