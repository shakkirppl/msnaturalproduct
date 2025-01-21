<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Store;
use App\Models\Product;
class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        try {
  
            $name= Auth::user()->name;
            $total = 0;
            $active = 0;
            $deactive = 0;
            $due = 0;
            $recent_store=[];
             $product=Product::get();
             if (Auth::user()->role_id != 3 && Auth::user()->role_id != 2) {
            return view('admin',['name' => $name,'total'=>$total,'active'=>$active,'deactive'=>$deactive,'due'=>$due,'recent_store'=>$product,'now' => Carbon::now()->toDateString()]);
             }
    } catch (\Exception $e) {
        return $e->getMessage();
    }
    }
}
