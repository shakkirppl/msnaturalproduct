<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\ProductPrices; // Assuming this holds price info based on size
use App\Models\ProductSizes;
use App\Models\Stores;
use App\Models\Product;
use App\Models\Countries;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\Session;
class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        try {

        //  return $request->all();
        $productSizeId = $request->input('product_size_id');
        $storeId=$request->input('store_id');
        $quantity = $request->input('quantity', 1);
        
        // Fetch product details based on productSizeId
        $productPrice = ProductPrices::where('product_size_id', $productSizeId)
        ->where('store_id', $storeId)
        ->first();
        $productSizes=ProductSizes::find($productSizeId);
        $product=Product::find($productSizes->product_id);
        if (!$productPrice) {
            return response()->json(['error' => 'Product size not found'], 404);
        }

        // Add item to cart
        Cart::add([
            'id' => $productSizes->id,
            'name' => $product->product_name.' '. $productSizes->size, // Assuming a relation to get product name
            'price' => $productPrice->offer_price,
            'quantity' => $quantity,
            'attributes' => [
                'product_id' => $product->id, // Customize as needed
                'store_id' => $productPrice->store_id,
                'size'=>$productSizes->size,
                'currency'=>$productPrice->currency,
                'image'=>$product->image,
                'productPrice_id'=>$productPrice->id,
                'shipping_charge'=>$productPrice->shipping_charge,
                'original_price'=>$productPrice->original_price,
            ]
        ]);
        $cartItems = Cart::getContent()->toArray();
        $cartTotal = Cart::getTotal();
        
        return response()->json([
            'cartItems' => array_values(Cart::getContent()->toArray()), // Convert to array
            'cartTotal' => $cartTotal,
            'message' => 'Product added to cart'
        ]);
        // return response()->json(['message' => 'Product added to cart']);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function homeAddToCart(Request $request)
    {
        try {

        //  return $request->all();
        $productId = $request->input('product_size_id');
        $storeId=$request->input('store_id');
        $quantity = $request->input('quantity', 1);
        
        // Fetch product details based on productId
        $product = Product::find($productId);
        $productSizes=ProductSizes::where('product_id',$product->id)->where('base_unit','Yes')->first();

        $productPrice = ProductPrices::where('product_size_id', $productSizes->id)
        ->where('store_id', $storeId)
        ->first();
      

        // Add item to cart
        Cart::add([
            'id' => $productSizes->id,
            'name' => $product->product_name.' '. $productSizes->size, // Assuming a relation to get product name
            'price' => $productPrice->offer_price,
            'quantity' => $quantity,
            'attributes' => [
                'product_id' => $product->id, // Customize as needed
                'store_id' => $productPrice->store_id,
                'size'=>$productSizes->size,
                'currency'=>$productPrice->currency,
                'image'=>$product->image,
                'productPrice_id'=>$productPrice->id,
                'shipping_charge'=>$productPrice->shipping_charge,
                'original_price'=>$productPrice->original_price,
            ]
        ]);
// Fetch updated cart data
$cartItems = Cart::getContent()->toArray();
$cartTotal = Cart::getTotal();

return response()->json([
    'cartItems' => array_values(Cart::getContent()->toArray()), // Convert to array
    'cartTotal' => $cartTotal,
    'message' => 'Product added to cart'
]);
        // return response()->json(['message' => 'Product added to cart']);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    
    public function view_cart(Request $request)
    {
        // Cart::clear();
        try {


            if (Session::has('activecountry')) {
                $countryCod = Session::get('activecountry');
            } else {
                $position = Location::get();
                $countryCod = $position->countryCode ?? 'IN'; // Default to 'IN'
                Session::put('activecountry', $countryCod);
                Cart::clear();
            }
    
            $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
            $store = Stores::where('countryCode', $countryCod)->first();
            $storeId = $store->id ?? 1;
            $currency = $store->currency ?? 'INR';


    // Get the store based on the country code, with a fallback if no store is found
    $store = Stores::where('countryCode', $countryCod)->first();

if (!$store) {
    $store = Stores::where('countryCode', 'IN')->first();
}
    $storeId = $store->id ?? 1;
    $currency = $store->currency ?? 'INR';
    $cartItems = Cart::getContent();
    $totalShippingCharge=0;
    $originalPrice=0;
    $offerPrice=0;
    foreach ($cartItems as $item) {
        $originalPrice+=$item->attributes->original_price;
        $offerPrice+=$item->price;
     }
    $totalShippingCharge = $cartItems->reduce(function ($total, $item) {
        return $total + ($item->attributes->shipping_charge * $item->quantity);
    }, 0);
    $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
    $countries=Countries::get();
    if (Cart::isEmpty()) 
    {
        return view('front-end.empty-cart',compact('cartItems','storeId','currency','language','countries','totalShippingCharge','originalPrice','offerPrice'));
    }
    else{
       return view('front-end.view-cart',compact('cartItems','storeId','currency','language','countries','totalShippingCharge','originalPrice','offerPrice'));
    }
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function remove($id)
    {
        try {

        Cart::remove($id);
        return redirect()->back()->with('success', 'Item removed from cart.');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function update(Request $request)
    {
        try {

        $id = $request->input('id');
        $quantity = $request->input('quantity');

        Cart::update($id, [
            'quantity' => ['relative' => false, 'value' => $quantity]
        ]);

        return response()->json(['success' => true, 'message' => 'Cart updated successfully.']);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function cartCount(Request $request)
    {
        try {
            $cartItems = Cart::getContent();
            return response()->json(['count' => $cartItems->count()]);
} catch (\Exception $e) {
    return $e->getMessage();
  }
}
}
