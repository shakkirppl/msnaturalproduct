<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WhatsappOrderDetail;
use App\Models\WhatsappOrder;
use App\Models\WhatsappCustomer;
use App\Models\InvoiceNumber;
use App\Models\ProductSizes;
use App\Models\ProductPrices;
use App\Models\Countries;
use App\Models\StatesModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;



class WhatsappController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get the search input from the request
            $search = $request->input('search');
            
            // Query to get the total count of records
            $totalRecordsQuery = WhatsappOrder::with('customer')
                ->when($search, function($query, $search) {
                    return $query->where(function($q) use ($search) {
                        $q->where('in_date', 'LIKE', "%{$search}%")
                          ->orWhere('invoice_no', 'LIKE', "%{$search}%")
                          ->orWhere('id', 'LIKE', "%{$search}%")
                          ->orWhereHas('customer', function($q) use ($search) {
                              $q->where('customer_name', 'LIKE', "%{$search}%");
                          })
                          ->orWhere('grand_total', 'LIKE', "%{$search}%")
                          ->orWhere('shipping_charge', 'LIKE', "%{$search}%");
                    });
                });
    
            // Get the total count of matching records (without pagination)
            $totalRecords = $totalRecordsQuery->count();
            
             $whatsapporder = $totalRecordsQuery->orderBy('id', 'DESC')->paginate(10);
            
            return view('whatsapp_order.index', ['whatsapporder' => $whatsapporder, 'search' => $search, 'totalRecords' => $totalRecords]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
  


//     public function index(Request $request)
// {
//     try {
//         // Paginate the records, 10 orders per page
//         $whatsapporder = WhatsappOrder::with('detail')->orderBy('id', 'DESC')->paginate(10);
//         return view('whatsapp_order.index', ['whatsapporder' => $whatsapporder]);
//     } catch (\Exception $e) {
//         return $e->getMessage();
//     }
// }

   
    public function view($id)
{
    try {
        $whatsapporder = WhatsappOrder::with(['detail'])->findOrFail($id);

        return view('whatsapp_order.view', ['whatsapporder' => $whatsapporder]);
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
    }
}

    
 
public function create(Request $request)
{
  
    try {
        $invoice_no =  InvoiceNumber::ReturnInvoice('whatsapp_orders',Auth::user()->store_id);
        $product = Product::get();
        $productsize =ProductSizes::get();
        $whatsapp_customers = WhatsappCustomer::Store()->get(); 
        $Productprices =ProductPrices::get();
        $countries = Countries::get(); 
        $states = StatesModel::all(); 
       
        
        return view('whatsapp_order.create', [
            'products' => $product,
            'invoice_no' => $invoice_no,
            'whatsapp_customers' => $whatsapp_customers,
            'productsizes' =>  $productsize,
            'productprices' => $Productprices,
            'countries' => $countries,
            'states' => $states,
        ]);
    } catch (\Exception $e) {
        return $e->getMessage();
    }
  }
    

    

public function store(Request $request)
{  
  
    try {
        // Validate the request
        $request->validate([
            'customer_id' => 'required|integer',
            'in_date' => 'required|date',
            // 'whatsapp_no' => 'required|string',
            'total' => 'required|numeric',
            'grand_total' => 'required|numeric',
            'shipping_charge' => 'required|numeric',
            'invoice_no' => 'required|string',
            'product_id' => 'required|array|min:1',
            'product_id.*' => 'integer|exists:products,id',
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1',
            'price' => 'required|array',
            'price.*' => 'numeric|min:0',
        ]);

        // Save the main order
        $order = new WhatsappOrder();
        $order->in_date = $request->in_date;
        $order->invoice_no = $request->invoice_no;
        $order->customer_id = $request->customer_id;
        $order->whatsapp_no = $request->whatsapp_no ?? null;
        $order->shipping_charge = $request->shipping_charge;
        $order->total = $request->total;
        $order->grand_total = $request->grand_total;
        $order->store_id = Auth::user()->store_id;
        $order->save();

        // Iterate over products
        foreach ($request->product_id as $index => $productId) {
            // Ensure all fields align
            $productSizeId =0;
            $quantity = $request->quantity[$index];
            $price = $request->price[$index];

            // Create order detail
            $orderDetail = new WhatsappOrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $productId;
            $orderDetail->product_size_id = $productSizeId;
            $orderDetail->quantity = $quantity;
            $orderDetail->price = $price;
            $orderDetail->total = $quantity * $price; // Calculate total for this product
            $orderDetail->store_id = Auth::user()->store_id;
            $orderDetail->save();
        }

        // Update invoice number
        InvoiceNumber::updateInvoiceNumber('whatsapp_orders', Auth::user()->store_id);

        return redirect()->route('whatsapp-order/list')->with('success', 'Order created successfully!');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
    }
}


public function getProductSizes(Request $request)
{
    $productId = $request->input('product_id');

    // Fetch sizes related to the selected product
    $sizes = ProductSizes::where('product_id', $productId)->get(['id', 'size']);

    return response()->json(['sizes' => $sizes]);
}



public function getPrice(Request $request)
{
    $productId = $request->input('product_id');
    $sizeId = $request->input('product_size_id');  
    $storeId = Auth::user()->store_id; // Get the store_id for the authenticated user

    // Check for specific products without sizes
    $productsWithoutSizes = [3, 4, 5, 6]; // Replace with actual product IDs
    if (in_array($productId, $productsWithoutSizes)) {
        $price = ProductPrices::where('product_id', $productId)
            ->where('store_id', $storeId) // Add the store condition
            ->first();
    } else {
        $price = ProductPrices::where('product_id', $productId)
            ->where('product_size_id', $sizeId)
            ->where('store_id', $storeId) // Add the store condition
            ->first();
    }

    if ($price) {
        return response()->json(['price' => $price->offer_price]);
    } else {
        return response()->json(['price' => '0.00']);
    }
}



public function createCustomerPage()
{
    
    $countries = Countries::get(); 
    $states = StatesModel::all();      

    
    return view('whatsapp-new-customer.add_customer', [
        'countries' => $countries,
        'states' => $states,
    ]);
}

// Store new customer
public function storeCustomer(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'customer_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:255',
        'country_id' => 'required|integer',
        'state' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:500',
        'pincode' => 'nullable|numeric',
    ]);

    try {
        // Create a new customer
        $customer = new WhatsappCustomer();
        $customer->user_id = auth()->id(); // Authenticated user ID
        $customer->store_id = auth()->user()->store_id; // Authenticated user's store ID
        $customer->customer_name = $request->customer_name;
        $customer->phone_number=$request->phone_number;
        $customer->country_id = $request->country_id;
        $customer->state = $request->state;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->pincode = $request->pincode;
        $customer->save();

        // Return a JSON response for AJAX requests
        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'customer' => $customer]);
        }

        // Non-AJAX request (redirect)
        return redirect()->route('whatsapp-customers')->with('success', 'Customer created successfully!');
    } catch (\Exception $e) {
        // Handle error during customer creation
        if ($request->expectsJson()) {
            return response()->json(['success' => false, 'message' => 'Failed to create customer.']);
        }

        // Non-AJAX error handling
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}



public function destroy($id)
{
    try {
        $order = WhatsappOrder::findOrFail($id); // Find the order
        $order->delete(); // Delete the order
        return redirect()->route('whatsapp-order/list')->with('success', 'Order deleted successfully.');
    } catch (\Exception $e) {
        return redirect()->route('whatsapp-order/list')->with('error', 'Failed to delete the order: ' . $e->getMessage());
    }
}



// public function customer()
//     {
       
//         $customers = WhatsAppCustomer::with(['countries', 'StatesModel'])->Store()->get();


       
//         return view('whatsapp-new-customer.index', compact('customers'));
//     }



public function customer(Request $request)
{
    try {
        // Get the search query
        $search = $request->input('search'); 

        // Paginate the customers with optional search
        $customers = WhatsAppCustomer::with(['countries', 'StatesModel'])
            ->Store()
            ->when($search, function($query) use ($search) {
                return $query->where('customer_name', 'like', "%$search%")
                             
                             ->orWhere('address', 'like', "%$search%")
                             ->orWhereHas('countries', function($query) use ($search) {
                                 $query->where('country_name', 'like', "%$search%");
                             })
                             ->orWhereHas('StatesModel', function($query) use ($search) {
                                 $query->where('state_name', 'like', "%$search%");
                             })
                             ->orWhere('city', 'like', "%$search%")
                             ->orWhere('pincode', 'like', "%$search%");
            })
            ->paginate(10);

        // Get the total count of customers
        $totalEntries = WhatsAppCustomer::Store()->count();

        // Return the data as JSON for AJAX request or render the view
        if ($request->expectsJson()) {
            return response()->json([
                'customers' => $customers,
                'totalEntries' => $totalEntries,
                'search' => $search,
            ]);
        }

        // Pass search value to the view
        return view('whatsapp-new-customer.index', compact('customers', 'totalEntries', 'search'));

    } catch (\Exception $e) {
        return $e->getMessage();
    }
}
   
    

}