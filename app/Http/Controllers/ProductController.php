<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductAttribute;
use App\Models\ProductPrices;
use App\Models\ProductSizes;
use App\Models\ProductImages;
use DB;
use App\Helper\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class ProductController extends Controller
{
    use File;
    //
    public function getUnits($productId)
{
    try {

    $units = ProductSizes::where('product_id', $productId)
               ->select('id', 'size')
               ->get();

    return response()->json(['units' => $units]);
} catch (\Exception $e) {
    return $e->getMessage();
  }
}
public function index(Request $request)
{ 
    try {

   $products=Product::orderBy('id','ASC')->get();
    return view('products.index', compact('products'));
} catch (\Exception $e) {
    return $e->getMessage();
  }
}
// Function to show the product creation form
public function create(Request $request)
{
   // Fetch Brands and Categories for dropdowns

   return view('products.create');
}

// Function to store the product
public function store(Request $request)
{
   // return $request->all();
   $validator = Validator::make($request->all(), [
       'product_name' => 'required|string|max:255',
       'product_name_ar' => 'required|string|max:255',
       'single_image' => 'required|image|mimes:jpeg,png,jpg,gif,webp,jfif,svg|max:2048',
    
   ]);

   if ($validator->fails()) {
       return redirect()->back()->withErrors($validator)->withInput();
   }
   try {
   DB::transaction(function () use ($request) {


       $item_slug = preg_replace('~[^\pL\d]+~u', '-',$request->product_name);  
       $item_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $item_slug);  
       $item_slug = preg_replace('~[^-\w]+~', '', $item_slug);
       $item_slug = trim($item_slug, '-');  
       $item_slug = preg_replace('~-+~', '-', $item_slug);  
       $item_slug = strtolower($item_slug);
       $item_slug=$item_slug;

       if ($request->hasFile('single_image')) {
        $file = $request->file('single_image');
        $path = 'uploads/products';
        $singleImageName = $this->file($file,$path,150,150);
    }
   $product = Product::create([
       'product_name' => $request->product_name,
       'description' => $request->description,
       'product_slug' => $item_slug,
       'package_type' => $request->package_type,
       'product_name_ar' => $request->product_name_ar,
       'description_ar' => $request->description_ar,
       'image' => $singleImageName,     
   ]);


   $productSku = ProductSizes::create([
       'product_id' => $product->id,
       'size' => $request->size,
       'size_ar' => $request->size_ar,
       'base_unit' => 'Yes',
   ]);
   ProductImages::create([
       'product_id' => $product->id,
       'image_path' => $singleImageName,
   ]);
    // Handle multiple images
$multipleImages = [];
if ($request->hasFile('multiple_images')) {
   foreach ($request->file('multiple_images') as $image) {
       $file =  $image;
       $path = 'uploads/products';
       $imageName = $this->file($file,$path,150,150);
       $multipleImages[] = $imageName;
   }
}

foreach ($multipleImages as $img) {
   ProductImages::create([
       'product_id' => $product->id,
       'image_path' => $img,
   ]);
}
}); 
   // Additional SKU Creation Logic

   return back()->with('success', 'Product Created Successfully');
} catch (\Exception $e) {
   return $e->getMessage();
 }    
}
public function show($id)
{
    try {

    $products=Product::find($id);
    $productSku = ProductSizes::where('product_id', $id)->get();
    $productImage=ProductImages::where('product_id',$id)->get();
    return view('products.view', compact('products','productSku','productImage'));
} catch (\Exception $e) {
    return $e->getMessage();
  }
}

public function addon($id)
{
    try {

    $products=Product::find($id);
    return view('products.addon', compact('products'));
} catch (\Exception $e) {
    return $e->getMessage();
  }
}
public function storeSku(Request $request)
{
    // return $request->all();
    $validator = Validator::make($request->all(), [
        'product_id' => 'required|exists:products,id',
        'size' => 'required|string',
        'size_ar' => 'required|string',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    DB::transaction(function () use ($request) {
        
        $productSku = ProductSizes::create([
            'product_id' => $request->product_id,
            'size' => $request->size,
            'size_ar' => $request->size_ar,
            'base_unit' => 'No',
        ]);
}); 
    // Handle Images
    return back()->with('success', 'Product Created Successfully');
}
public function destroySku($id) 
{
    try {
        // Find the SKU record by its ID
        $tempProductSku = ProductSizes::findOrFail($id);

        // Wrap in a transaction to ensure atomicity
        DB::transaction(function () use ($tempProductSku) {
            $tempProductSku->delete();
        }); 

        return back()->with('success', 'SKU deleted successfully');
    } catch (\Exception $e) {
        return back()->with('error', 'Failed to delete SKU: ' . $e->getMessage());
    }
}
public function edit($id)
{
    try {

    $products=Product::find($id);
    return view('products.edit', compact('products'));
} catch (\Exception $e) {
    return $e->getMessage();
  }
}
public function updateProduct(Request $request)
{
    // return $request->all();
    $validator = Validator::make($request->all(), [
        'product_name' => 'required|string|max:255',
       'product_id' => 'required|exists:products,id',
     
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }
    try {
    DB::transaction(function () use ($request) {

        $product = Product::find($request->product_id);
        $item_slug = preg_replace('~[^\pL\d]+~u', '-',$request->product_name);  
        $item_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $item_slug);  
        $item_slug = preg_replace('~[^-\w]+~', '', $item_slug);
        $item_slug = trim($item_slug, '-');  
        $item_slug = preg_replace('~-+~', '-', $item_slug);  
        $item_slug = strtolower($item_slug);
        $item_slug=$item_slug;

        $product->product_name = $request->product_name;
        $product->product_slug = $item_slug;
        $product->description = $request->description;
        $product->package_type = $request->package_type;
        $product->product_name_ar = $request->product_name_ar;
        $product->description_ar = $request->description_ar;
        $product->save();
}); 
    // Additional SKU Creation Logic

    return back()->with('success', 'Product Updated Successfully');
} catch (\Exception $e) {
    return $e->getMessage();
  }    
}
}
