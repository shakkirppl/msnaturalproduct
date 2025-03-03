<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitors;
class VisitReportController extends Controller
{
    // 1. Last Visit Detail
    public function lastVisit()
    {
        $visits = Visitors::latest()->paginate(10); // Last visit details
        return view('visit-reports.last_visit', compact('visits'));
    }

    // 2. Most Visit Detail
    public function mostVisit()
    {
        $visits = Visitors::select('ip', \DB::raw('count(*) as total'))
                       ->groupBy('ip')
                       ->orderByDesc('total')
                       ->get();
                    //    ->paginate(10); // Most visit details
        return view('visit-reports.most_visit', compact('visits'));
    }

    // 3. Visit By Country Report
    public function visitByCountry()
    {
        $visits = Visitors::select('countryName', \DB::raw('count(*) as total'))
                       ->groupBy('countryName')
                       ->orderByDesc('total')
                       ->get();
                    //    ->paginate(10); // Visits by country
        return view('visit-reports.visit_by_country', compact('visits'));
    }

    // 4. Day Visit Report
    public function dayVisit()
    {
         $visits = Visitors::select(\DB::raw('DATE(created_at) as visit_date'), \DB::raw('count(*) as total'))
                       ->groupBy('visit_date')
                       ->orderByDesc('visit_date')
                       ->get();
                    //    ->paginate(10); // Day visit details
        return view('visit-reports.day_visit', compact('visits'));
    }

    // 5. Date Wise Visit Report
    public function dateWiseVisit(Request $request)
    {
        $query = Visitors::query();

        if ($request->has('from_date') && $request->has('to_date')) {
            $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
        }
        $visits = $query->get();
        // $visits = $query->paginate(10); // Date-wise visit details
        return view('visit-reports.date_wise_visit', compact('visits'));
    }
}