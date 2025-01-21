<?php

namespace App\Http\Controllers;

use App\Models\Damage;
use App\Models\Product;
use App\Models\Stores;
use App\Models\ProductSizes;
use Illuminate\Http\Request;

class DamageController extends Controller
{
    public function index()
    { 
        try {

        $damages = Damage::with('productSize.product', 'store')->get();
        return view('damages.index', compact('damages'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create()
    {
        try {

        $productSizes = ProductSizes::with('product')->get();
        $stores = Stores::all();
        return view('damages.create', compact('productSizes', 'stores'));
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

        Damage::create([
            'product_size_id' => $request->product_size_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'reason' => $request->reason,
            'damage_date' => now(),
        ]);

        return redirect()->route('damages.index')->with('success', 'Damage record added successfully.');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
}