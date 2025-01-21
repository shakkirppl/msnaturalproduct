<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Product;
use App\Models\BomMaster;
use App\Models\BomDetail;
use App\Models\BomByProductDetail;
use App\Models\WorkCenter;
use App\Models\InvoiceNumber;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\PurchaseIntegration;
use App\Models\PurchaseIntegrationDetail;

class BOMController extends Controller
{
    //
    // Bom::with('detail','bydetail','workCenter','products')
    public function index(Request $request)
    {
        try {
          $bom = BomMaster::with('workCenter','products')->orderBy('id','DESC')->get();
        return view('bom.index',['bom'=>$bom]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function view($id)
    {
        try {
          $bom = BomMaster::with('detail','bydetail','workCenter','products')->find($id);
        return view('bom.view',['bom'=>$bom]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function create(Request $request)
    {
        try {
          $invoice_no =  InvoiceNumber::ReturnInvoice('bom',0);
            $product = Product::get();
            $workCenter=WorkCenter::get();
        return view('bom.create',['products'=>$product,'workCenter'=>$workCenter,'invoice_no'=>$invoice_no]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
        // return $request->all();
        try {
     
          
         DB::transaction(function () use ($request) {
        
          $bom = new BomMaster;
          $bom->in_date=Carbon::now()->toDatestring();
          $bom->in_time=date('H:i:s');
          $bom->invoice_no=$request->bom_no;
          $bom->product_id = $request->product_id;
          $bom->unit=$request->unit;
          $bom->quantity=$request->quantity;
          $bom->work_center=$request->work_center;
          $bom->user_id=Auth::user()->id;
          $bom->save();
          foreach($request->input('bom_product_id') as $key => $bomProductId) {
            // Ensure both bom_product_id and bom_unit (and bom_quantity) are set and not null
            $bomUnit = $request->input('bom_unit')[$key] ?? null;
            $bomQuantity = $request->input('bom_quantity')[$key] ?? null;
             $baseQuandity=$request->input('bom_quantity')[$key] ?? 0;

            if ($bomProductId !== null && $bomUnit !== null && $bomQuantity !== null) {
               $baseQuandity = ($request->input('bom_quantity')[$key] ?? 0) / ($request->input('quantity') ?? 1);

              $detail = new BomDetail;
                $detail->bom_master = $bom->id;
                $detail->user_id = Auth::user()->id;
                $detail->bom_product_id = $bomProductId;
                $detail->bom_unit = $bomUnit;
                $detail->bom_quantity = $bomQuantity;
                $detail->base_quantity=$baseQuandity;
                $detail->save();
              
            } else {
                // Optionally, you can log or handle the case where some data is missing
                echo "Missing data for key: " . $key . "<br>";
            }
        }
        foreach($request->input('by_product_id') as $key => $byProductId) {
          // Retrieve by_unit and by_quantity for the current key
          $byUnit = $request->input('by_unit')[$key] ?? null;
          $byQuantity = $request->input('by_quantity')[$key] ?? null;
          $baseQuandity=$request->input('by_quantity')[$key] ?? 0;
          // Check if by_product_id, by_unit, and by_quantity are not null
          if ($byProductId !== null && $byUnit !== null && $byQuantity !== null) {
            $baseQuandity = ($request->input('by_quantity')[$key] ?? 0) / ($request->input('quantity') ?? 1);
              $detail = new BomByProductDetail;
              $detail->bom_master = $bom->id;
              $detail->user_id = Auth::user()->id;
              $detail->by_product_id = $byProductId;
              $detail->by_unit = $byUnit;
              $detail->by_quantity = $byQuantity;
              $detail->base_quantity=$baseQuandity;
              $detail->save();
          } else {
              // Optionally handle the case where data is missing
              echo "Missing data for key: " . $key . "<br>";
          }
      }
          InvoiceNumber::updateinvoiceNumber('bom',0);
         }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function getProductDetails($product_id)
{
  try {

    // Fetch components from BomDetail
    $bom=BomMaster::where('product_id',$product_id)->orderBy('id','DESC')->first();
    $components = BomDetail::join('products','products.id','=','bom_details.bom_product_id')
    ->join('product_sizes','product_sizes.id','=','bom_details.bom_unit')
   ->select('bom_details.*','units.name as unit_name','products.name as product_name')->where('bom_details.bom_master', $bom->id)->get();

    // Fetch by-products from ByProductDetail
    $byProducts = BomByProductDetail::join('products','products.id','=','bom_by_product_details.by_product_id')
    ->join('product_sizes','product_sizes.id','=','bom_by_product_details.by_unit')
   ->select('bom_by_product_details.*','units.name as unit_name','products.name as product_name')->where('bom_by_product_details.bom_master', $bom->id)->get();

    return response()->json([
        'components' => $components,
        'byProducts' => $byProducts,
    ]);
  } catch (\Exception $e) {
    return $e->getMessage();
  }     
}


}
