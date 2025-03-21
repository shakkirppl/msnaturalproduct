<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductPrices;
use App\Models\ProductSizes;
use App\Models\Countries;
use App\Models\Stores;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
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
    
    public function product_price_manage()
    {
        try {

        $productSizes = ProductSizes::with('product')->get();
        return view('product-prices.manage', compact('productSizes'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function update_price($id)
{
    try {
        $countries = Countries::all();
        $productSize = ProductSizes::findOrFail($id);
        $product = Product::find($productSize->product_id);

        $productPrices = ProductPrices::where('product_size_id', $id)
            ->get()
            ->keyBy('country_id'); // Organize by country_id for easy lookup

        return view('product-prices.update-price', compact('product', 'productSize', 'countries', 'productPrices'));
} catch (\Exception $e) {
    return $e->getMessage();
  }
}
public function save_price(Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'product_size_id' => 'required|exists:product_sizes,id',
            'prices' => 'required|array',
            'prices.*.country_id' => 'required|exists:countries,id',
            'prices.*.original_price' => 'required|numeric|min:0',
            'prices.*.offer_price' => 'nullable|numeric|min:0',
            'prices.*.currency' => 'required|string|max:10',
            'prices.*.in_stock' => 'required|boolean',
        ]);
        if ($validator->fails()) {
    
            return redirect()->back()->withErrors($validator)->withInput();
        }
        try {
            DB::transaction(function () use ($request) {
                foreach ($request->prices as $country_id => $priceData) {
                    ProductPrices::updateOrCreate(
                        [
                            'product_size_id' => $request->product_size_id,
                            'country_id' => $country_id,
                        ],
                        [
                            'product_id' => ProductSizes::find($request->product_size_id)->product_id,
                            'store_id' => $country_id,
                            'original_price' => $priceData['original_price'],
                            'offer_price' => $priceData['offer_price'],
                            'currency' => $priceData['currency'],
                            'in_stock' => $priceData['in_stock'],
                            'shipping_charge' => $priceData['shipping_charge'],
                        ]
                    );
                }
            });

            return redirect()->route('product-price-manage', $request->product_size_id)
                ->with('success', 'Prices updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
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
