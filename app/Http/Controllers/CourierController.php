<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\ShippmentDetailsUae;
use App\Models\ShippmentDetailsInternational;
use Illuminate\Http\Request;

class CourierController extends Controller
{
    //
    
    public function courier_template_uae(Request $request)
    {
        try {
            // Define filters
            $startDate = $request->input('start_date'); // Start date filter
            $endDate = $request->input('end_date');     // End date filter
        
    
            // Query with filters
            $orders=ShippmentDetailsUae::
                when($startDate && $endDate, function ($query) use ($startDate, $endDate) {
                    $query->whereBetween('created_at', [$startDate, $endDate]);
                })
               
                ->orderBy('id', 'desc')
                ->get();
    
            return view('courier-template.uae', compact('orders'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
