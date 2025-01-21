<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\StoreAvailabilityScope;
class ProductPrices extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id', 'product_size_id', 'country_id', 'store_id','original_price','offer_price','currency','is_available','in_stock','availability_date'
    ];
    protected static function booted()
    {
        // No default global scope here since `store_id` is dynamic
    }

    public function scopeStore($query, $store)
    {
        return $query->where('store_id', $store)->where('is_available', 1);
    }
    public function scopePriceProduct($query, $product)
    {
        return $query->where('product_id', $product);
    }
    public function scopeProductUnit($query, $size)
    {
        return $query->where('product_size_id', $size);
    }

    public function applyStoreScope($storeId)
    {
        static::addGlobalScope(new StoreAvailabilityScope($storeId));
    }
    public function product()
{
    return $this->belongsTo(Product::class);
}

public function size()
{
    return $this->belongsTo(ProductSizes::class, 'product_size_id');
}
    public function country()
{
    return $this->belongsTo(Countries::class);
}

public function store()
{
    return $this->belongsTo(Stores::class);
}
}
