<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\BomMaster;
use App\Models\BomDetail;
use App\Models\WorkCenter;
use App\Models\ProductionMaster;
use App\Models\ProductionByProductDetail;
use App\Models\ProductionDetail;
use App\Models\InvoiceNumber;
use App\Models\Shift;
use App\Models\Store;
use App\Models\Unit;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ProductionController extends Controller
{
    //
    public function index(Request $request)
    {
        try {
            $production = ProductionMaster::with('detail','bydetail','products')->orderBy('id','DESC')->get();
          
        return view('production.index',['production'=>$production]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function view($id)
    {
        try {
          $bom = ProductionMaster::with('detail','bydetail','products','shift')->find($id);
        return view('production.view',['bom'=>$bom]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function create(Request $request)
    {
        try {
            $bom = BomMaster::get();
            $invoice_no =  InvoiceNumber::ReturnInvoice('production',0);
            $product = Product::whereHas('boms')->get();
            $workCenter=WorkCenter::get();
            $shift=Shift::get();
        return view('production.create',['products'=>$product,'bom'=>$bom,'invoice_no'=>$invoice_no,'shift'=>$shift]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
        //  return $request->all();
        try {
     
          $validator = Validator::make($request->all(), [
            'bom_no' => 'required|string',
            'product_id' => 'required|integer',
            'unit' => 'required|integer',
            'quandity' => 'required|numeric|min:0',
            // 'shift_hours' => 'nullable|numeric|min:0',
            // 'labor_hour_cost' => 'nullable|numeric|min:0',
            'labor_cost' => 'nullable|numeric|min:0',
            'bom_product_id.*' => 'required|integer',
            'bom_unit.*' => 'required|integer',
            'bom_quantity.*' => 'required|numeric|min:0',
            'bom_actual_quantity.*' => 'required|numeric|min:0.01', // Ensure actual qty is greater than 0
            // 'by_product_id.*' => 'nullable|integer',
            // 'by_unit.*' => 'nullable|integer',
            // 'by_quantity.*' => 'nullable|numeric|min:0',
            // 'by_actual_quantity.*' => 'nullable|numeric|min:0.01', // Ensure by-product actual qty is greater than 0 if exists
            'shift_id' => 'required|integer',
            'no_of_labourse' => 'nullable|integer|min:0',
        ]);
    
        // If validation fails, redirect back with errors
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        DB::transaction(function () use ($request) {
        
          $bom = new ProductionMaster;
          $bom->in_date=Carbon::now()->toDatestring();
          $bom->in_time=date('H:i:s');
          $bom->invoice_no=$request->bom_no;
          $bom->product_id = $request->product_id;
          $bom->unit=$request->unit;
          $bom->quantity=$request->quandity;
          $bom->no_of_labours = $request->no_of_labourse ?? 0;
          $bom->shift_hours=$request->shift_hours ?? 0;
          $bom->labor_hour_cost=$request->labor_hour_cost ?? 0;
          $bom->labor_cost=$request->labor_cost ?? 0;
          $bom->shift_id = $request->shift_id ?? 0;
          $bom->user_id=Auth::user()->id;
          $bom->save();
        

          foreach($request->input('bom_product_id') as $key=>$val)
          {
            $detail = new ProductionDetail;
            $detail->bom_master=$bom->id;
            $detail->user_id=Auth::user()->id;
            $detail->bom_product_id = $request->input('bom_product_id')[$key];
            $detail->bom_unit=$request->input('bom_unit')[$key];
            $detail->bom_quantity=$request->input('bom_quantity')[$key];
            $detail->bom_actual_quantity=$request->input('bom_actual_quantity')[$key];
            $detail->save();

          }
          if (is_array($request->input('by_product_id'))) {
          foreach($request->input('by_product_id') as $key=>$val)
          {
            $detail = new ProductionByProductDetail;
            $detail->bom_master=$bom->id;
            $detail->user_id=Auth::user()->id;
            $detail->by_product_id = $request->input('by_product_id')[$key];
            $detail->by_unit=$request->input('by_unit')[$key];
            $detail->by_quantity=$request->input('by_quantity')[$key];
            $detail->by_actual_quantity=$request->input('by_actual_quantity')[$key];
            $detail->save();
          }
        }
          InvoiceNumber::updateinvoiceNumber('production',0);
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
}
