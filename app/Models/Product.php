<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\AvailableScope;
use App\Models\Scopes\LanguageScope;
class Product extends Model
{
    protected $fillable = [
        'product_name', 'description', 'has_size', 'package_type', 'status', 'product_name_ar', 'description_ar', 'image','product_slug','short_description','short_description_ar'
    ];
    use HasFactory;
    // protected static function booted()
    // {
    //     $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
    //     static::addGlobalScope(new LanguageScope($language));
    // }
    public function scopeWithLanguageName($query)
    {
        
        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        if ($language === 'ar') {
            return $query->select(['id', 'product_name_ar as name','product_slug','image','short_description_ar as short_description']);
        } else {
            return $query->select(['id', 'product_name as name','product_slug','image','short_description as short_description']);
        }
    }
    public function scopeWithPrice($query)
    {
        
        return $query->select(['package_type']);
    }
    public function scopeWithLanguageDescrption($query)
    {
        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        if ($language === 'ar') {
            return $query->select(['id','product_name_ar as name','product_slug','image', 'description_ar as description','short_description as short_description']);
        } else {
            return $query->select(['id','product_name as name','product_slug','image', 'description as description','short_description_ar as short_description']);
        }
    }
    public function scopeAvailability($query, $store)
    {
        $productId = ProductPrices::where('store_id', $store)
                                  ->where('is_available', 1)
                                  ->pluck('product_id');
    
        return $query->whereIn('id', $productId);
    }
    public function boms()
    {
        return $this->hasMany(BomMaster::class, 'product_id');
    }
    public function skus(){
        return $this->hasMany('App\Models\ProductSku','product_id')
        ->select('product_skus.*');
         
     }
     public function skusBase(){
        return $this->hasMany('App\Models\ProductSku', 'product_id', 'id')
                    ->where('base_unit', 'Yes')
                    ->select('id', 'image', 'product_id'); // Make sure to include 'product_id' in the select to match the relationship
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }
//     public function prices()
// {
//     return $this->hasMany(ProductPrice::class);
// }
// Product.php
public function sizes()
    {
        return $this->hasMany(ProductSizes::class);
    }
public function prices()
{
    return $this->hasManyThrough(ProductPrices::class, ProductSizes::class, 'product_id', 'product_size_id');
}


 public function baseprices()
{
    return $this->hasManyThrough(
        ProductPrices::class,
        ProductSizes::class,
        'product_id',                      // Foreign key on ProductSizes table
        'product_size_id',                 // Foreign key on ProductPrices table
        'id',                              // Local key on Products table
        'id'                               // Local key on ProductSizes table
    )->where('product_sizes.base_unit', 'YES'); // Condition within relationship
}
public function countries()
    {
        return $this->belongsToMany(Countries::class, 'product_countries')->withPivot('is_active');
    }
}
