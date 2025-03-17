<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductSizes;
use App\Models\ProductCountry;
use App\Models\ProductSizeCountry;
use Illuminate\Http\Request;

class ProductCountryController extends Controller
{
    public function index()
    {
        $products = Product::with(['sizes', 'countries'])->get();
        return view('products.products-status', compact('products'));
    }
    public function size_index()
    {
        $products = Product::with(['sizes', 'countries'])->get();
        return view('products.products-size-status', compact('products'));
    }
    
    public function toggleProductStatus(Request $request)
    {
        $productCountry = ProductCountry::updateOrCreate(
            ['product_id' => $request->product_id, 'countries_id' => $request->country_id],
            ['is_active' => $request->status]
        );

        return response()->json(['success' => 'Product status updated successfully.']);
    }

    public function toggleProductSizeStatus(Request $request)
    {
        $productSizeCountry = ProductSizeCountry::updateOrCreate(
            ['product_sizes_id' => $request->product_size_id, 'countries_id' => $request->country_id],
            ['is_active' => $request->status]
        );

        return response()->json(['success' => 'Product size status updated successfully.']);
    }
}
