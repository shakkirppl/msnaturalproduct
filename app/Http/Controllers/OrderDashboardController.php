<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
class OrderDashboardController extends Controller
{
    //
    public function index()
    {
        // Today's Orders
        $todayOrders = Order::whereDate('created_at', Carbon::today())->count();
        
        // This Week's Orders
        $weekOrders = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        
        // This Month's Orders
        $monthOrders = Order::whereMonth('created_at', Carbon::now()->month)->count();
        
        // Till Date Orders
        $totalOrders = Order::count();
        
        // Pending Orders
        $pendingOrders = Order::where('delivery_status', 'pending')->count();

        // WhatsApp Orders (Social Media Orders)
        $whatsappOrders = Order::where('mode', 'SocialMedia')->count();

        // Country-wise Orders
        $countryWiseOrders = Order::selectRaw('country_id, COUNT(*) as total_orders')
            ->groupBy('country_id')
            ->with('country') // Assuming you have a Country relationship
            ->get();

        // Country-wise Pending Orders
        $countryWisePendingOrders = Order::where('delivery_status', 'pending')
            ->selectRaw('country_id, COUNT(*) as pending_orders')
            ->groupBy('country_id')
            ->with('country')
            ->get();

        return view('orders.dashboard', compact(
            'todayOrders', 
            'weekOrders', 
            'monthOrders', 
            'totalOrders', 
            'pendingOrders', 
            'whatsappOrders', 
            'countryWiseOrders', 
            'countryWisePendingOrders'
        ));
    }
}
