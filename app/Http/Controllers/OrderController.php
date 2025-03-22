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
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
    //
    public function show_pending_orders(Request $request)
    {
        try {

        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')->where('delivery_status', 'Pending')->where('store_id', $store)
        ->where('mode','website')
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
        ->where('mode','website')
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
        ->where('mode','website')
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
        ->where('mode','website')
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
  

    public function order_view(Request $request , $id)
    {
        try {
        // return $orders = Order::with('orderdetails','store','orderdetails.product','country','deliverystate','billingstate','billingcountry','detail')->find( $id);
         $orders = Order::with('store','country','deliverystate','billingstate','billingcountry','detail')->find( $id);
        $d_status = DeliveryStatus::all();
       
        return view('orders.order-view',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }


    public function updateStatus(Request $request)
    {
      // return $request->all();
        // $request->validate([
        //     'd_status' => 'required|string',
        //     'order_id	'=>'required|integer'
        // ]);
        
        $order=Order::find($request->order_id);
        $order->update(['delivery_status' => $request->d_status]);
     if ($request->d_status === 'Delivered')
     {
      if($order->store_id==3)
    {
        $noOfPieces = OrderDetails::where('order_id', $order->id)->sum('quantity');
        $productSizeIds =OrderDetails::where('order_id', $order->id)->pluck('product_size_id');
        $totalWeight =ProductSizes::whereIn('id', $productSizeIds)->sum('weight');

      $shippmentDetailsUae=new ShippmentDetailsUae;
      $shippmentDetailsUae->ShipperRef=$order->order_no;
      $shippmentDetailsUae->Consignee=$order->first_name.' '.$order->last_name;
      $shippmentDetailsUae->ConsigneeName=$order->first_name.' '.$order->last_name;
      $shippmentDetailsUae->ConsigneeTel1=$order->phone_number;
      $shippmentDetailsUae->ConsigneeMob1=$order->phone_number;
      $shippmentDetailsUae->Destination=$order->state_code;
      $shippmentDetailsUae->ConsigneeAddress1=$order->address;
      $shippmentDetailsUae->ConsigneeAddress2=$order->address;
      $shippmentDetailsUae->CODAmt=$order->shipping_charge;
      $shippmentDetailsUae->NoofPieces=$noOfPieces;
      $shippmentDetailsUae->Weight=$totalWeight;
      $shippmentDetailsUae->GoodsDesc=$order->shipping;
      $shippmentDetailsUae->SpecialInstruct=$order->shipping;
      $shippmentDetailsUae->ServiceType='CAD';
      $shippmentDetailsUae->ProductType='XPS';
      $shippmentDetailsUae->in_date=Carbon::now()->toDatestring();
      $shippmentDetailsUae->in_time=date('H:i:s');
      $shippmentDetailsUae->save();
      return redirect('accepted-orders');
      }
      if($order->store_id==2 || $order->store_id==5)
      {
        $noOfPieces = OrderDetails::where('order_id', $order->id)->sum('quantity');
        $productSizeIds =OrderDetails::where('order_id', $order->id)->pluck('product_size_id');
        $totalWeight =ProductSizes::whereIn('id', $productSizeIds)->sum('weight');
    
            $international=new ShippmentDetailsInternational;
            $international->Shipper='MS Natural Trading LLC';
            $international->ShipperRef=$order->order_no;
            $international->ShipperName='Entrance 3,M Floor,Office no.17,Unimoon Business Centre';
            $international->ShipperAddress1='Al Bahar Building';
            $international->ShipperAddress2='Al Khabeesi,';
            $international->ShipperCity='DXB';
            $international->Origin='DXB';
            $international->ShipperPhone='0555102275';
            $international->Consignee=$order->first_name.' '.$order->last_name;
            $international->ConsigneeName=$order->first_name.' '.$order->last_name;
            $international->ConsigneePhone=$order->phone_number;
            $international->ConsigneeMobile=$order->phone_number;
            $international->ConsigneeAddress1=$order->address;
            $international->ConsigneeAddress2=$order->address;
            $international->ConsigneeCity==$order->state_code;
            $international->Destination=$order->shipping;
            $international->ConsigneeState=$order->state_code;
            $international->ConsigneeZip=$order->pincode;
            $international->CashtoCollect=$order->total_amount;
            $international->CODcurrency=$order->currency;
            $international->NoofPieces=$noOfPieces;
            $international->Weight=$totalWeight;
            $international->GoodsDesc=$order->shipping;
            $international->SpecialInstruct=$order->shipping;
            $international->Service='NOR';
            $international->InvoiceValue=$order->total_amount;
            $international->InvoiceCurr=$order->currency;
            $international->Product='XPS';
            $international->in_date=Carbon::now()->toDatestring();
            $international->in_time=date('H:i:s');
            $international->save();
            if($order->store_id==2)
            {  return redirect('oman-accepted-orders');}
            if($order->store_id==5)
            {  return redirect('bahrain-accepted-orders');}
      }
     }
     return redirect('accepted-orders');
    }


    public function updateStatus1(Request $request, $id)
    {
      return $id;
        $order = Order::findOrFail($id);
    
        // Validate the status value
        $request->validate([
            'd_status' => 'required|in:Pending,Accepted,Packed,Delivered',
        ]);
        try {
        $order->delivery_status = $request->d_status;
        if ($request->d_status === 'Packed' && $request->has('delivery_date')) {
            $order->delivery_date = $request->delivery_date;
        }
        $order->save();

        if ($request->has('delivery_date')) {
       
      
      }

        return response()->json(['success' => true]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }


    public function updateDeliveryDate(Request $request, Order $order)
    {
        $request->validate([
            'delivery_date' => 'required|date',
        ]);
    
        $order->update(['delivery_date' => $request->delivery_date]);
    
        return response()->json(['message' => 'Delivery date updated successfully!']);
    }

    public function oman_show_pending_orders(Request $request)
    {
        try {
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Pending')->where('store_id', 2)
        ->where('mode','website')
        ->orderBy('id', 'desc') 
        ->get();
        
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }

    public function oman_show_accepted_orders(Request $request)
    {
        try {
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Accepted')->where('store_id', 2)
        ->where('mode','website')
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }

    public function oman_show_packed_orders(Request $request)
    {
        try {
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Packed')->where('store_id', 2)
        ->where('mode','website')
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }

    public function oman_show_delivered_orders(Request $request)
    {
        try {
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Delivered')->where('store_id', 2)
        ->where('mode','website')
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }





    public function bahrain_show_pending_orders(Request $request)
    {
        try {
        $store=Auth::user()->store_id;
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Pending')->where('store_id', 5)
        ->where('mode','website')
        ->orderBy('id', 'desc') 
        ->get();
        
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }

    public function bahrain_show_accepted_orders(Request $request)
    {
        try {
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Accepted')->where('store_id', 5)
        ->where('mode','website')
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }
    public function bahrain_show_packed_orders(Request $request)
    {
        try {
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Packed')->where('store_id', 5)
        ->where('mode','website')
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.index',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }  
    }

    public function bahrain_show_delivered_orders(Request $request)
    {
        try {
        $orders = Order::with('orderdetails', 'store')
        ->where('delivery_status', 'Delivered')->where('store_id', 5)
        ->where('mode','website')
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
    
        $orders = $query->with('store')->paginate(10);
    
        return view('orders.order-tracking', compact('orders'));
    }
    public function website_orders_tracking(Request $request)
    {
      $store = Auth::user()->store_id;
    $query = Order::where('store_id', $store); // No need for `query()`
    
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
    $products = Product::all();
    // Fetch orders with store relation and paginate
    $orders = $query->with('store')->paginate(10);

    return view('orders.website-order-tracking', compact('orders','products'));
    }
    
    public function return_items_pending(Request $request)
    {
        try {

        $store=Auth::user()->store_id;
        $orders = ReturnItem::with('product', 'productSize','order','customer','reason')
        ->where('status', 'Pending')->where('store_id', $store)
        ->orderBy('id', 'desc') 
        ->get();
        return view('orders.return-items',compact('orders'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function return_item_collected(Request $request, $id)
    {
        $return = ReturnItem::findOrFail($id);
    
     
        try {
        $return->status = 'Collected';
        $return->save();
    
        return back();
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function printInvoice($id)
    {
        $order = Order::with('orderdetails', 'store', 'billingstate', 'billingcountry')->findOrFail($id);
        
        $currency = $order->store->currency ; 
    
        return view('orders.print-invoice', compact('order', 'currency'));
    }

}
