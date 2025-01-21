<?php

namespace App\Http\Controllers;

use App\Models\StockReturn;
use App\Models\ProductSizes;
use App\Models\Stores;
use Illuminate\Http\Request;

class StockReturnController extends Controller
{
    public function index()
    {
        try {

        $stockReturns = StockReturn::with('productSize.product', 'store')->get();
        return view('stock_returns.index', compact('stockReturns'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create()
    {
        try {

        $productSizes = ProductSizes::with('product')->get();
        $stores = Stores::all();
        return view('stock_returns.create', compact('productSizes', 'stores'));
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
            'reason' => 'nullable|string',
        ]);
        try {

        StockReturn::create([
            'product_size_id' => $request->product_size_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'reason' => $request->reason,
        ]);

        return redirect()->route('stock_returns.index')->with('success', 'Stock returned successfully.');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
}