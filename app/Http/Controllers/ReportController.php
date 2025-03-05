<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Countries;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use DB;
class ReportController extends Controller
{
    public function salesDateWiseReport(Request $request)
    {
        try {
           
    
            // Fetch filters
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $country_id = $request->country_id;
            $search = $request->search;
    
            // Query for filtered data
            $query =  Order::with(['country']);
    
            if ($from_date && $to_date) {
                $query->whereBetween('created_at', [$from_date, $to_date]);
            }
    
            if ($country_id && $country_id != 0) {
                $query->where('country_id', $country_id);
            }
    
            if ($search) {
                $query->where('order_no', 'LIKE', "%$search%")
                      ->orWhere('total_amount', 'LIKE', "%$search%")
                      ->orWhere('first_name', 'LIKE', "%$search%")
                      ->orWhereHas('country', function ($q) use ($search) {
                          $q->where('country_name', 'LIKE', "%$search%");
                      });
            }
    
            $results = $query->orderBy('id', 'desc')->paginate(10);
            $countries = Countries::select('id', 'country_name')->get();
            return view('reports.date-wise', [
                'results' => $results,
                'countries' => $countries,
                'search' => $search,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function salesCountryWiseReport(Request $request)
    {
        try {
           
    
            // Fetch filters
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $country_id = $request->country_id;
            $search = $request->search;
    
            // Query for filtered data
            $query =  Order::with(['country']);
    
            if ($from_date && $to_date) {
                $query->whereBetween('created_at', [$from_date, $to_date]);
            }
    
            if ($country_id && $country_id != 0) {
                $query->where('country_id', $country_id);
            }
    
            if ($search) {
                $query->where('order_no', 'LIKE', "%$search%")
                      ->orWhere('total_amount', 'LIKE', "%$search%")
                      ->orWhere('first_name', 'LIKE', "%$search%")
                      ->orWhereHas('country', function ($q) use ($search) {
                          $q->where('country_name', 'LIKE', "%$search%");
                      });
            }
    
            $results = $query->orderBy('id', 'desc')->paginate(10);
            $countries = Countries::select('id', 'country_name')->get();
            return view('reports.date-wise', [
                'results' => $results,
                'countries' => $countries,
                'search' => $search,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function salesAreaWiseReport(Request $request)
    {
        try {
           
    
            // Fetch filters
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $search = $request->search;
    
            // Query for filtered data
            $query =  Order::with(['country']);
    
            if ($from_date && $to_date) {
                $query->whereBetween('created_at', [$from_date, $to_date]);
            }
    
          
    
            if ($search) {
                $query->where('pincode', 'LIKE', "%$search%")
                      ->orWhere('billing_post_code', 'LIKE', "%$search%");
            }
    
            $results = $query->orderBy('id', 'desc')->paginate(10);
            return view('reports.area-wise', [
                'results' => $results,
                'search' => $search,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    public function salesProductWiseReport(Request $request)
    {
        try {
           
    
            // Fetch filters
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $product_id = $request->product_id;
    
            // Query for filtered data
            $query =  OrderDetails::with(['store','customer','order']);
    
            if ($from_date && $to_date) {
                $query->whereBetween('created_at', [$from_date, $to_date]);
            }
    
          
    
            if ($product_id && $product_id != 0) {
                $query->where('product_id', $product_id);
            }
    
            $results = $query->orderBy('id', 'desc')->paginate(10);
            $products=Product::get();
            return view('reports.product-wise', [
                'results' => $results,
                'products' => $products,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    
    // public function salesReport(Request $request)
    // {
    //     $sales = Order::with(['customer', 'country'])
    //         ->when($request->date, fn($query) => $query->whereDate('created_at', $request->date))
    //         ->when($request->product_id, function ($query) use ($request) {
    //             $query->whereHas('details', fn($q) => $q->where('product_id', $request->product_id));
    //         })
    //         ->when($request->country_id, fn($query) => $query->where('country_id', $request->country_id))
    //         ->orderBy('id', 'desc')
    //         ->paginate(10);

    //     return view('reports.sales', compact('sales'));
    // }

    public function viewSalesDetail($id)
    {
        $order = Order::with(['details.product', 'customer', 'country'])->findOrFail($id);
        return view('reports.sales-detail', compact('order'));
    }

    public function mostMovingItems(Request $request)
    {
         $products = OrderDetails::select('product_id')
            ->with('product')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->when($request->country_id, function ($query) use ($request) {
                $query->whereHas('order', fn($q) => $q->where('country_id', $request->country_id));
            })
            ->orderByDesc('total_sold')
            ->paginate(10);

        return view('reports.most-moving', compact('products'));
    }

    public function leastMovingItems(Request $request)
    {
        $products = OrderDetails::select('product_id')
            ->with('product')
            ->selectRaw('SUM(quantity) as total_sold')
            ->groupBy('product_id')
            ->when($request->country_id, function ($query) use ($request) {
                $query->whereHas('order', fn($q) => $q->where('country_id', $request->country_id));
            })
            ->orderBy('total_sold')
            ->paginate(10);

        return view('reports.least-moving', compact('products'));
    }
     // Most repurchased customers
     public function mostRepurchasedCustomers()
     {
        $customers = Order::join('customers', 'orders.customer_id', '=', 'customers.user_id')
    ->select(
        'orders.customer_id',
        'customers.first_name',
        'customers.last_name',
        'customers.phone_number',
        DB::raw('COUNT(orders.id) as purchase_count')
    )
    ->whereNotNull('orders.customer_id')
    ->groupBy('orders.customer_id', 'customers.first_name', 'customers.last_name', 'customers.phone_number')
    ->orderByDesc('purchase_count')
    ->get();

 
         return view('reports.most-repurchased-customers', compact('customers'));
     }
 
     // Most repurchased products
     public function mostRepurchasedProducts()
     {
         $products = OrderDetails::select('product_id', DB::raw('COUNT(*) as total_sold'))
             ->groupBy('product_id')
             ->orderBy('total_sold', 'desc')
             ->with('product')
             ->get();
 
         return view('reports.most-repurchased-products', compact('products'));
     }
 
}
