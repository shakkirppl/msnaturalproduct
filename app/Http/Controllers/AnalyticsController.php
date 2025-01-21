<?php
namespace App\Http\Controllers;
use App\Models\Visitors;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AnalyticsController extends Controller
{
    public function index()
    {
        // Fetch visitor data
        $visitors = Visitors::select('id', 'ip', 'countryName', 'regionName', 'cityName', 'created_at')->get();

        // Group by Country
        $countryData = $visitors->groupBy('countryName')->map(function ($row) {
            return $row->count();
        });

        // Group by City
        $cityData = $visitors->groupBy('cityName')->map(function ($row) {
            return $row->count();
        });

        // Visitors by Date (Last 7 Days)
        $dateData = Visitors::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->orderBy('date')
            ->get();

        return view('analytics.index', compact('visitors', 'countryData', 'cityData', 'dateData'));
    }
}
