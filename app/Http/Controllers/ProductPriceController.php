<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPrices;
use App\Models\ProductSizes;
use App\Models\Countries;
use App\Models\Stores;
use Illuminate\Http\Request;

class ProductPriceController extends Controller
{
    public function index()
    {
        try {

        $productPrices = ProductPrices::with(['product', 'size', 'country', 'store'])->get();
        return view('product-prices.index', compact('productPrices'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create()
    {
        try {

        $productSizes = ProductSizes::with('product')->get();
        $sizes = ProductPrices::all();
        $stores = Stores::all();
        return view('product-prices.create', compact('productSizes', 'sizes', 'stores'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_size_id' => 'nullable|exists:product_sizes,id',
            'store_id' => 'required|exists:stores,id',
            'original_price' => 'required|numeric',
            'offer_price' => 'nullable|numeric',
            'is_available' => 'boolean',
        ]);
        try {

        $ProductSizes=ProductSizes::find($request->product_size_id);
        $Stores=Stores::find($request->store_id);
        $Country=Countries::find($Stores->country_id);
        $request['product_id']=$ProductSizes->product_id;
        $request['country_id']=$Country->id;
        $request['currency']=$Country->country_code;
        $request['is_available']=1;
        ProductPrices::create($request->all());

        return redirect()->route('product-prices.index')->with('success', 'Product price added successfully.');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function edit($id)
    {
        try {

        $productPrice = ProductPrices::findOrFail($id);
        $products = Product::all();
        $stores = Stores::all();
        $productSizes = ProductSizes::with('product')->get();
        return view('product-prices.edit', compact('productPrice', 'products',  'stores','productSizes'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function update(Request $request, $id)
    {
        $productPrice = ProductPrices::findOrFail($id);

        $request->validate([
            'product_size_id' => 'nullable|exists:product_sizes,id',
            'store_id' => 'required|exists:stores,id',
            'original_price' => 'required|numeric',
            'offer_price' => 'nullable|numeric',
           
        ]);
        try {

        $productPrice->update($request->all());

        return redirect()->route('product-prices.index')->with('success', 'Product price updated successfully.');
    } catch (\Exception $e) {
        return $e->getMessage();
      }

    }
}
