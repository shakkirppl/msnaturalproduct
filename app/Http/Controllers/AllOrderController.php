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
use App\Models\Product;
use App\Models\ShippmentDetailsInternational;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class AllOrderController extends Controller
{
    //
    public function sendmail(Request $request)
    {
        try {

            $message = "Hello, <b>this is a test email</b> with HTML content!";
    
            Mail::send([], [], function ($email) use ($message) {
                $email->to('recipient@example.com')
                      ->subject('HTML Email')
                      ->setBody($message, 'text/html'); // Set the body as HTML
            });
        
            return "Email Sent Successfully!";
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function show_pending_orders(Request $request)
    {
        try {
        $id=Auth::user()->id;
        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')->where('delivery_status', 'Pending')
        ->when($id != 5, function ($query) use ($store) {
            return $query->where('store_id', $store);
        })
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
            $id=Auth::user()->id;
        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Accepted')
        ->when($id != 5, function ($query) use ($store) {
            return $query->where('store_id', $store);
        })
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
            $id=Auth::user()->id;
        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Packed')
        ->when($id != 5, function ($query) use ($store) {
            return $query->where('store_id', $store);
        })
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
            $id=Auth::user()->id;
        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Delivered')
        ->when($id != 5, function ($query) use ($store) {
            return $query->where('store_id', $store);
        })
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
        ->where('delivery_status', 'Cancel')
        ->when($id != 5, function ($query) use ($store) {
            return $query->where('store_id', $store);
        })
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
      if ($request->filled('product_id')) {
        $query->whereHas('detail', function ($q) use ($request) {
            $q->where('order_details.product_id', $request->product_id);
        });
    }
    $orders = $query->with('store','deliverystate','detail')->orderBy('orders.id', 'DESC')->paginate(5000);
     // Fetch products for the dropdown
     $products = Product::all();
        return view('orders.order-tracking', compact('orders','products'));
    }
   
    public function printInvoice($id)
    {
        $order = Order::with('orderdetails', 'store', 'billingstate', 'billingcountry')->findOrFail($id);
        
        $currency = $order->store->currency ; 
    
        return view('orders.print-invoice', compact('order', 'currency'));
    }

}
