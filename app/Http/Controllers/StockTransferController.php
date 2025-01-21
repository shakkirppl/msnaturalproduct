<?php

namespace App\Http\Controllers;

use App\Models\ProductSizes;
use App\Models\ProductStock;
use App\Models\Transfer;
use App\Models\Stores;
use Illuminate\Http\Request;

class StockTransferController extends Controller
{
    //
    public function index()
    {
        try {

   $productSizes = Transfer::with('productSize.product','store')->get();

        return view('transfers.index', compact('productSizes'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create()
    {
        try {

        $productSizes = ProductSizes::with('product')->get();
        $stores = Stores::all();
        return view('transfers.create', compact('productSizes', 'stores'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'product_size_id' => 'required|exists:product_sizes,id',
            'store_id' => 'required|exists:stores,id',
            'quantity' => 'required|integer|min:1',
        ]);
        try {

        $productSize = ProductSizes::findOrFail($request->product_size_id);
        $stock = ProductStock::firstOrCreate([
            'product_size_id' => $productSize->id,
            'location' => 'production_unit'
        ]);
    
        if ($stock->quantity < $request->quantity) {
            return back()->withErrors(['error' => 'Insufficient stock in production unit']);
        }
    
        $stock->decrement('quantity', $request->quantity);
    
        ProductStock::updateOrCreate(
            ['product_size_id' => $productSize->id, 'location' => 'store', 'store_id' => $request->store_id],
            ['quantity' => \DB::raw("quantity + {$request->quantity}")]
        );
    
        Transfer::create([
            'product_size_id' => $productSize->id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity
        ]);
    
        return redirect()->route('transfers.index')->with('success', 'Stock transferred successfully.');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
}
