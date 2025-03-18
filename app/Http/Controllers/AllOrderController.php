<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

use App\Models\ReturnItem;
use App\Models\shipmentdetailsinternational;
use App\Models\ShippmentDetailsUae;
use App\Models\DeliveryStatus;
use App\Models\OrderDetails;
use App\Models\ProductSizes;
use App\Models\ShippmentDetailsInternational;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AllOrderController extends Controller
{
    //
    public function show_pending_orders(Request $request)
    {
        try {

        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')->where('delivery_status', 'Pending')->where('store_id', $store)
        ->orderBy('id', 'desc') 
        ->get();
        
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function show_accepted_orders(Request $request)
    {
        try {

        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Accepted')->where('store_id', $store)
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function show_packed_orders(Request $request)
    {
        try {

        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Packed')->where('store_id', $store)
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function show_delivered_orders(Request $request)
    {
        try {

        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Delivered')->where('store_id', $store)
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function canceled_order(Request $request)
    {
        try {

        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Cancel')->where('store_id', $store)
        ->orderBy('id', 'desc') 

        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
  
    public function orders_tracking(Request $request)
    {
        $query = Order::query();
    
        // Apply filters if present in the request
        if ($request->filled('delivery_status')) {
            $query->where('delivery_status', $request->delivery_status);
        }
        if ($request->filled('order_no')) {
            $query->where('order_no', 'LIKE', '%' . $request->order_no . '%');
        }
        if ($request->filled('first_name')) {
            $query->where('first_name', 'LIKE', '%' . $request->first_name . '%');
        }
        if ($request->filled('phone_number')) {
            $query->where('phone_number', 'LIKE', '%' . $request->phone_number . '%');
        }
        if ($request->filled('from_date') && $request->filled('to_date')) {
          $query->whereBetween('date', [$request->from_date, $request->to_date]);
      }
    
        $orders = $query->where('mode','SocialMedia')->with('store')->paginate(10);
    
        return view('orders.order-tracking', compact('orders'));
    }
   
    public function printInvoice($id)
    {
        $order = Order::with('orderdetails', 'store', 'billingstate', 'billingcountry')->findOrFail($id);
        
        $currency = $order->store->currency ; 
    
        return view('orders.print-invoice', compact('order', 'currency'));
    }

}
