<?php

namespace App\Http\Controllers;
use App\Models\WhatsappOrder;
use App\Models\WhatsappCustomer;

use Illuminate\Http\Request;

class WhatsappOrderReportController extends Controller
{

    public function report(Request $request)
    {
        try {
            $whatsapp_customers = WhatsappCustomer::Store()->get();
    
            // Fetch filters
            $from_date = $request->from_date;
            $to_date = $request->to_date;
            $customer_id = $request->customer_id;
            $search = $request->search;
    
            // Query for filtered data
            $query = WhatsappOrder::with(['customer'])->Store();
    
            if ($from_date && $to_date) {
                $query->whereBetween('in_date', [$from_date, $to_date]);
            }
    
            if ($customer_id && $customer_id != 0) {
                $query->where('customer_id', $customer_id);
            }
    
            if ($search) {
                $query->where('invoice_no', 'LIKE', "%$search%")
                      ->orWhere('grand_total', 'LIKE', "%$search%")
                      ->orWhereHas('customer', function ($q) use ($search) {
                          $q->where('customer_name', 'LIKE', "%$search%");
                      });
            }
    
            $results = $query->orderBy('id', 'desc')->paginate(10);
    
            return view('whatsapp_order_report.report', [
                'results' => $results,
                'whatsapp_customers' => $whatsapp_customers,
                'search' => $search,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
    



    

    public function reportView($id)
    {
        try {
            // Fetch the main order data with details
            $whatsapporder = WhatsappOrder::with('orderDetails.product', 'orderDetails.productSize', 'customer')
                                          ->findOrFail($id);
    
            return view('whatsapp_order_report.report_view', [
                'whatsapporder' => $whatsapporder
            ]);
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }
    

}
