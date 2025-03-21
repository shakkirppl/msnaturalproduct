<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use Stevebauman\Location\Facades\Location;
use App\Models\Stores;
use App\Models\Order;
use App\Models\StatesModel;
use App\Models\DeliveryStatus;
use App\Models\OrderDetails;
use App\Models\InvoiceNumber;
use App\Models\ShippingCharge;
use App\Models\Customer;
use App\Models\CustomerAddress;
use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Support\Facades\Http;
use App\Models\Countries;
class CheckoutController extends Controller
{

    public function index()
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        $countries=Countries::get();
        $countryCode = session('activecountry');
      if (session('activecountry')) {
          $countryCode = session('activecountry');
    } else {
        $ip = request()->ip(); // Get client IP
            $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=b26ee61aa3ee4de5ab87ae1e4c83bee9&ip={$ip}");
            $data = $response->json();
            
            $countryCode = $data['country_code2'] ?? 'IN'; // Example: 'IN'
        $request->session()->put('activecountry', $countryCode);
    }

    $store = Stores::where('countryCode', $countryCode)->first();
    if (!$store) {
        $store = Stores::where('countryCode', 'IN')->first();
    }
    $states= StatesModel::where('country_id', $store->country_id)->get();
    $billingStates= StatesModel::where('country_id', $store->country_id)->get();
    $storeId = $store->id ?? 1;
    $currency = $store->currency ?? 'INR';
     $cartItems = Cart::getContent();
     
    $customer = Auth::check() ? Customer::where('user_id', Auth::id())->first() : null;
    $customerAddress = null;
    if (Auth::user()) {
        $customerAddress=CustomerAddress::with('countrys','states')->where('user_id',Auth::user()->id)->get();
    }
    $totalShippingCharge = 0;
    $originalPrice=0;
    $offerPrice=0;
    if ($storeId == 1) {
    // Fetch the default address for the customer
    $defaultAddress = CustomerAddress::where('user_id', Auth::id())
                        ->where('deafult', 1)
                        ->first();
    if(!$defaultAddress){
        $address = CustomerAddress::where('user_id', Auth::id())
        ->first();
        if($address){
        $address->deafult=1;
        $address->save();
        }
        $defaultAddress = CustomerAddress::where('user_id', Auth::id())
        ->where('deafult', 1)
        ->first();
    }

    $stateId = $defaultAddress ? $defaultAddress->state : 1; // Use default state as 1 if no address

    foreach ($cartItems as $item) {
        // Query the shipping charge for the product size
        $shippingChargeQuery = ShippingCharge::where('product_size_id', $item->id);
        $originalPrice+=$item->attributes->original_price;
        $offerPrice+=$item->price;
        if ($stateId == 1) {
            $shippingCharge = $shippingChargeQuery->where('state_id', 1)->value('shipping_charge') ?? 0;
        } elseif ($stateId > 1) {
            $shippingCharge = $shippingChargeQuery->where('state_id', 2)->value('shipping_charge') ?? 0;
        } else {
            $shippingCharge = 0; // Default shipping charge if state_id is invalid
        }

        $totalShippingCharge += $shippingCharge * $item->quantity;
    }
} else {
    // Calculate shipping charge based on item attributes for stores other than storeId=1
    $totalShippingCharge = $cartItems->reduce(function ($total, $item) {
        return $total + (($item->attributes->shipping_charge ?? 0) * $item->quantity);
    }, 0);
}

    if(Auth::user()){
        return view('front-end.login-checkout', compact('cartItems', 'storeId', 'currency','language','countries','states','customer','totalShippingCharge','billingStates','customerAddress','originalPrice','offerPrice'));
        }
        else{
          
            return view('front-end.account',compact('language','storeId','countries','currency','cartItems','originalPrice','offerPrice'));
        }
    } catch (\Exception $e) {
        return $e->getMessage();
      }
   
    }

    public function guest_checkout()
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        $countries=Countries::get();
      if (session('activecountry')) {
          $countryCode = session('activecountry');
    } else {
        $ip = request()->ip(); // Get client IP
            $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=b26ee61aa3ee4de5ab87ae1e4c83bee9&ip={$ip}");
            $data = $response->json();
            
            $countryCode = $data['country_code2'] ?? 'IN'; // Example: 'IN'
        $request->session()->put('activecountry', $countryCode);
        Cart::clear();
    }
    
    $store = Stores::where('countryCode', $countryCode)->first();
    $storeId = $store->id ?? 1;
    $currency = $store->currency ?? 'INR';
    $states= StatesModel::where('country_id', $storeId)->get();
    $billingStates= StatesModel::where('country_id', $storeId)->get();
    $totalShippingCharge = 0;
    $originalPrice=0;
    $offerPrice=0;
    $customer =  null;
     $cartItems = Cart::getContent();
     foreach ($cartItems as $item) {
        // Query the shipping charge for the product size
        $originalPrice+=$item->attributes->original_price;
        $offerPrice+=$item->price;
     }
    $totalShippingCharge = $cartItems->reduce(function ($total, $item) {
        return $total + ($item->attributes->shipping_charge * $item->quantity);
    }, 0);


        return view('front-end.checkout', compact('cartItems', 'storeId', 'currency','language','countries','states','customer','totalShippingCharge','billingStates','originalPrice','offerPrice'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    
    public function store_order_details(Request $request)
    {
       

    // return $request->all();
    $cartItems = Cart::getContent();
    $quantity = $cartItems->count();
   
    if ($quantity > 0) {
         // Validate based on billing option
    $commonValidation = [
        'address' => 'required|numeric|exists:customer_address,id',
        'billing_option' => 'required',
    ];
    $customMessages = [
        'address.required' => 'Please select or add a shipping address',
        'address.numeric' => 'Please select or add a valid shipping address',
        'address.exists' => 'The selected shipping address does not exist',
        'billing_option.required' => 'Please select a billing type',
        'billing_first_name.required' => 'Billing first name is required',
        // 'billing_last_name.required' => 'Billing last name is required',
        // 'billing_address.required' => 'Billing address is required',
        // 'billing_city.required' => 'Billing city is required',
        'billing_state.required' => 'Billing state is required',
        'billing_post_code.required' => 'Billing postal code is required',
        'billing_phone.required' => 'Billing phone number is required',
        'billing_country_id.required' => 'Please select a billing country',
    ];
    $request->validate($commonValidation, $customMessages);
    $billingValidation = $request->billing_option === 'different' ? [
        'billing_first_name' => 'required|string|max:255',
        'billing_last_name' => 'nullable|string|max:255',
        'billing_address' => 'nullable|string',
        'billing_city' => 'nullable|string|max:255',
        'billing_state' => 'required',
        'billing_post_code' => 'nullable|string',
        'billing_phone' => 'required|string',
        'billing_country_id' => 'required',
    ] : [];
    $validationRules = array_merge($commonValidation, $billingValidation);

    $request->validate($validationRules, $customMessages);
    
    DB::transaction(function () use ($request,$billingValidation, $commonValidation,$cartItems,&$order) {
        $countryCode = session('activecountry');
   
        // Get the store based on the country code, with a fallback if no store is found
        $store = Stores::where('countryCode', $countryCode)->first();
        if(!$store){$store = Stores::find(1);}
        $countryID =$store->country_id;
        $storeId = $store->id ?? 1;
        $currency = $store->currency ?? 'INR';
        // $currentDateTime = Carbon::now()->format('d-m-Y ');
        $currentDateTime = Carbon::now();
    
        $totalShippingCharge=0;
        $totalAmount=0;
        $amount=0;
    
        $amount = Cart::getTotal();
        $cashOnDelivery = $request->has('cash_on_delivery') ? 1 : 0;

    $validatedData = $request->validate(array_merge($commonValidation, $billingValidation));
    $invoice_no =  InvoiceNumber::ReturnInvoice('orders',$storeId);
    $customer = Auth::check() ? Auth::id() : null;
    $addressId=$validatedData['address'];
    $selectedAddress = CustomerAddress::find($addressId);
    $stateId=$selectedAddress->state;
    if ($storeId == 1) {
        foreach ($cartItems as $item) {
            $shippingChargeQuery = ShippingCharge::where('product_size_id', $item->id);

            if ($stateId == 1) {
                $shippingCharge = $shippingChargeQuery->where('state_id', 1)->value('shipping_charge');
            } elseif ($stateId > 1) {
                $shippingCharge = $shippingChargeQuery->where('state_id', 2)->value('shipping_charge');
            } else {
                $shippingCharge = 0; // Default shipping charge for other states or invalid state_id
            }

            $totalShippingCharge += $shippingCharge * $item->quantity;
        }
    }
    else{
        $totalShippingCharge = $cartItems->reduce(function ($total, $item) {
            return $total + ($item->attributes->shipping_charge * $item->quantity);
        }, 0);
    }


    $totalAmount=$amount+$totalShippingCharge;
    
  
    $states= StatesModel::find($stateId);
 // Create the order
 $order = Order::create([
    'order_no'=>$invoice_no,
    'country_id' => $selectedAddress->country_id,
    'customer_id'=>$customer,
    'first_name' => $selectedAddress->first_name,
    'last_name' => $selectedAddress->last_name ?? null,
    'address' => $selectedAddress->address ?? null,
    'city' => $selectedAddress->city ?? null,
    'state' => $selectedAddress->state,
    'state_code'=> $states->code ?? null,
    'pincode' => $selectedAddress->pincode,
    'phone_number' => $selectedAddress->phone_number,
    'billing_option' => $validatedData['billing_option'],
    'shipping'=>$request->special_instructions,
    'billing_first_name' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_first_name'] : $selectedAddress->first_name,
    'billing_second_name' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_last_name'] : $selectedAddress->last_name,
    'billing_address' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_address'] : $selectedAddress->address,
    'billing_city' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_city'] : $selectedAddress->city,
    'billing_state' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_state'] : $selectedAddress->state,
    'billing_post_code' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_post_code'] :$selectedAddress->pincode,
    'billing_phone' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_phone'] : $selectedAddress->phone_number,
    'billing_country_id' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_country_id'] : $selectedAddress->country_id,
    'store_id' => $storeId,
    'date' => $currentDateTime,
    'amount' => $amount,
    'shipping_charge'=>$totalShippingCharge,
    'total_amount' => $totalAmount,
    'payment_type' => $cashOnDelivery,
  
]);

// Save order details
foreach ($cartItems as $item) {
    $totalAmount = $item['price'] * $item['quantity'];
    OrderDetails::create([
        'order_id' => $order->id,
        'store_id' => $item['attributes']['store_id'],
        'customer_id'=>$customer,
        'quantity' => $item['quantity'],
        'currency' => $item['attributes']['currency'],
        'product_id' => $item['attributes']['product_id'],
        'price' => $item['price'],
        'product_size_id' => $item['id'],
        'product_prize_id' => $item['attributes']['productPrice_id'],
        'total_amount' => $totalAmount,
    ]);
}
InvoiceNumber::updateinvoiceNumber('orders',$storeId);
// Clear the cart after order
        Cart::clear();
    }); 
        return redirect('order-confirmation/'.$order->id)->with('success', 'Address saved successfully!');
    }
    else {
        // If quantity is 0 or less, add an error and return to the form
        return back()->withErrors(['cart' => 'Please add an item to the cart']);
    }
    }
    


    public function store_guest_order_details(Request $request)
    {
       

    //   return $request->all();
    $cartItems = Cart::getContent();
    $quantity = $cartItems->count();
   
    if ($quantity > 0) {
         // Validate based on billing option
    $commonValidation = [
        //  'email' => 'required|email',
        'first_name' => 'required|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'city' => 'nullable|string',
        'address' => 'nullable|string',
        'state_id' => 'required|integer|exists:states,id',
        'pincode' => 'required|numeric',
        'phone' => 'required|numeric',
        'billing_option' => 'required',
    ];
    $customMessages = [
        'state_id.required' => 'Please select a State.',
        'state_id.integer' => 'Please  select a State.',
        'state_id.exists' => 'Selected State does not exist.',
    ];
    
    $request->validate($commonValidation, $customMessages);
    $billingValidation = $request->billing_option === 'different' ? [
        'billing_first_name' => 'required|string|max:255',
        // 'billing_last_name' => 'required|string|max:255',
        // 'billing_address' => 'required|string',
        // 'billing_city' => 'required|string',
        'billing_state' => 'required',
        'billing_post_code' => 'required',
        'billing_country_id' => 'required',
        'billing_phone'=> 'required',
    ] : [];

    DB::transaction(function () use ($request,$billingValidation, $commonValidation,$cartItems,&$order) {
        $countryCode = session('activecountry');

        // Get the store based on the country code, with a fallback if no store is found
        $store = Stores::where('countryCode', $countryCode)->first();
        if(!$store){$store = Stores::find(1);}
        $countryID =$store->country_id;
        $storeId = $store->id ?? 1;
        $currency = $store->currency ?? 'INR';
        // $currentDateTime = Carbon::now()->format('d-m-Y ');
        $currentDateTime = Carbon::now();
    
        $totalShippingCharge=0;
        $totalAmount=0;
        $amount=0;
    
        $amount = Cart::getTotal();
        $cashOnDelivery = $request->has('cash_on_delivery') ? 1 : 0;

    $validatedData = $request->validate(array_merge($commonValidation, $billingValidation));
    $invoice_no =  InvoiceNumber::ReturnInvoice('orders',$storeId);
    $customer = Auth::check() ? Auth::id() : null;
    $stateId=$validatedData['state_id'];
    if ($storeId == 1) {
        foreach ($cartItems as $item) {
            $shippingChargeQuery = ShippingCharge::where('product_size_id', $item->id);

            if ($stateId == 1) {
                $shippingCharge = $shippingChargeQuery->where('state_id', 1)->value('shipping_charge');
            } elseif ($stateId > 1) {
                $shippingCharge = $shippingChargeQuery->where('state_id', 2)->value('shipping_charge');
            } else {
                $shippingCharge = 0; // Default shipping charge for other states or invalid state_id
            }

            $totalShippingCharge += $shippingCharge * $item->quantity;
        }
    }
    else{
        $totalShippingCharge = $cartItems->reduce(function ($total, $item) {
            return $total + ($item->attributes->shipping_charge * $item->quantity);
        }, 0);
    }


    $totalAmount=$amount+$totalShippingCharge;
    $stateId=$validatedData['state_id'];
    $states= StatesModel::find($stateId);
 // Create the order
 $order = Order::create([
    'order_no'=>$invoice_no,
    'country_id' => $request->billing_option === 'different' ? $validatedData['billing_country_id'] : $countryID,
    'customer_id'=>$customer,
    'first_name' => $validatedData['first_name'],
    'last_name' => $validatedData['last_name'] ?? null,
    'city' => $validatedData['city'] ?? null,
    'address' => $validatedData['address'] ?? null,
    'state' => $validatedData['state_id'],
    'state_code'=> $states->code,
    'pincode' => $validatedData['pincode'] ,
    'phone_number' => $validatedData['phone'],
    'billing_option' => $validatedData['billing_option'],
    'shipping'=>$request->special_instructions,
    'email' => $validatedData['email'] ?? null,
    'billing_first_name' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_first_name'] : $validatedData['first_name'],
    'billing_second_name' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_last_name'] : $validatedData['last_name'],
    'billing_address' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_address'] : $validatedData['address'],
    'billing_city' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_city'] : $validatedData['city'],
    'billing_state' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_state'] : $validatedData['state_id'],
    'billing_post_code' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_post_code'] : $validatedData['pincode'],
    'billing_phone' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_phone'] : $validatedData['phone'],
    'billing_country_id' => $validatedData['billing_option'] === 'different' ? $validatedData['billing_country_id'] : $countryID,
    'store_id' => $storeId,
    'date' => $currentDateTime,
    'amount' => $amount,
    'shipping_charge'=>$totalShippingCharge,
    'total_amount' => $totalAmount,
    'payment_type' => $cashOnDelivery,
  
]);

// Save order details
foreach ($cartItems as $item) {
    $totalAmount = $item['price'] * $item['quantity'];
    OrderDetails::create([
        'order_id' => $order->id,
        'store_id' => $item['attributes']['store_id'],
        'customer_id'=>$customer,
        'quantity' => $item['quantity'],
        'currency' => $item['attributes']['currency'],
        'product_id' => $item['attributes']['product_id'],
        'price' => $item['price'],
        'product_size_id' => $item['id'],
        'product_prize_id' => $item['attributes']['productPrice_id'],
        'total_amount' => $totalAmount,
    ]);
}

if ($request->has('save_next_time') && $request->save_next_time == 'on') {
    $customer = Customer::where('user_id', $customer)->first();

    if ($customer) {
        // Update existing customer
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country_id = $request->country;
        $customer->landmark = $request->apartment;
        $customer->pincode = $request->pincode;
        $customer->address = $request->address;
        $customer->save();
    } else {
        // Insert new customer
        $customer = new Customer();
        $customer->user_id = $customer;
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->phone_number = $request->phone_number;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country_id = $request->country;
        $customer->landmark = $request->apartment;
        $customer->pincode = $request->pincode;
        $customer->address = $request->address;
        $customer->save();
    }
}
InvoiceNumber::updateinvoiceNumber('orders',$storeId);
// Clear the cart after order
        Cart::clear();
    }); 
        return redirect('order-confirmation/'.$order->id)->with('success', 'Address saved successfully!');
    }
     
    }
    
    public function cancel_order(Request $request,$id)
    {
        try {

        $orders = Order::with('orderdetails')->find($id);
        $orders->delivery_status='Cancel';
        $orders->save();
        return back();
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function re_order(Request $request,$id)
    {
        

        $orders = Order::with('orderdetails')->find($id);
         // Validate based on billing option
         $invoice_no =  InvoiceNumber::ReturnInvoice('orders',$orders->store_id);
        // Create the order
        $currentDateTime = Carbon::now();
        $order = Order::create([
    'order_no'=>$invoice_no,
    'country_id' => $orders->country_id,
    'first_name' => $orders->first_name,
    'last_name' => $orders->last_name,
    'city' => $orders->city,
    'address' => $orders->address,
    'state' => $orders->state,
    'pincode' =>$orders->pincode,
    'phone_number' => $orders->phone_number,
    'billing_option' => $orders->billing_option,
    'email' => $orders->email,
    'billing_first_name' => $orders->billing_first_name,
    'billing_second_name' => $orders->billing_second_name,
    'billing_address' => $orders->billing_address,
    'billing_city' => $orders->billing_city,
    'billing_state' => $orders->billing_state,
    'billing_post_code' => $orders->billing_post_code,
    'billing_phone' => $orders->billing_phone,
    'billing_country_id' => $orders->billing_country_id,
    'store_id' => $orders->store_id,
    'date' => $currentDateTime,
    'amount' => $orders->amount,
    'total_amount' =>$orders->total_amount,
    'payment_type' =>$orders->payment_type,
     'customer_id' => $orders->customer_id,
     'shipping_charge'=>$orders->shipping_charge,
    ]);

    // Save order details
    foreach ($orders->orderdetails as $item) {
    OrderDetails::create([
        'order_id' => $order->id,
        'store_id' => $item->store_id,
        'customer_id'=>$orders->customer_id,
        'quantity' => $item->quantity,
        'currency' => $item->currency,
        'product_id' => $item->product_id,
        'price' => $item->price,
        'product_size_id' => $item->product_size_id,
        'product_prize_id' => $item->product_prize_id,
        'total_amount' => $item->total_amount,
     ]);
}
InvoiceNumber::updateinvoiceNumber('orders',$orders->store_id);

return redirect('order-confirmation/'.$order->id)->with('success', 'Address saved successfully!');


    }
    
    public function calculateShippingCharge(Request $request)
    {
        try {

        $stateId = $request->state_id;
        $storeId= $request->store_id;
        $cartItems = Cart::getContent();
    
        $totalShippingCharge = 0;
    
        if ($storeId == 1) {
            foreach ($cartItems as $item) {
                $shippingChargeQuery = ShippingCharge::where('product_size_id', $item->id);
    
                if ($stateId == 1) {
                    $shippingCharge = $shippingChargeQuery->where('state_id', 1)->value('shipping_charge');
                } elseif ($stateId > 1) {
                    $shippingCharge = $shippingChargeQuery->where('state_id', 2)->value('shipping_charge');
                } else {
                    $shippingCharge = 0; // Default shipping charge for other states or invalid state_id
                }
    
                $totalShippingCharge += $shippingCharge * $item->quantity;
            }
        }
    
        return response()->json(['totalShippingCharge' => $totalShippingCharge]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function order_confirmation($id)
    {
        try {

        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        $countries=Countries::get();
      if (session('activecountry')) {
          $countryCode = session('activecountry');
    } else {
        $ip = request()->ip(); // Get client IP
        $response = Http::get("https://api.ipgeolocation.io/ipgeo?apiKey=b26ee61aa3ee4de5ab87ae1e4c83bee9&ip={$ip}");
        $data = $response->json();
        
        $countryCode = $data['country_code2'] ?? 'IN'; // Example: 'IN'
        $request->session()->put('activecountry', $countryCode);
    }

    $store = Stores::where('countryCode', $countryCode)->first();
    if(!$store){$store = Stores::find(1);}
    $customer = Auth::check() ? Customer::where('user_id', Auth::id())->first() : null;
    $storeId = $store->id ?? 1;
    $currency = $store->currency ?? 'INR';
   $cartItems = Cart::getContent();
    $originalPrice=0;
    $offerPrice=0;
  
    $order = Order::find($id);
        return view('front-end.order-confirmation', compact('cartItems', 'storeId', 'currency','language','countries','order','originalPrice','offerPrice'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    
}
