<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ProductSizeLanguageScope;
class ProductSizes extends Model
{
    protected $fillable = [
        'product_id', 'size', 'size_ar', 'base_unit'
    ];
    use HasFactory;
    // protected static function booted()
    // {
    //     $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
    //     static::addGlobalScope(new ProductSizeLanguageScope($language));
    // }
    public function scopeWithLanguageSize($query)
    {
        $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
        if ($language === 'ar') {
            return $query->select(['id', 'size_ar as size']);
        } else {
            return $query->select(['id', 'size as size']);
        }
    }
    public function product()
{
    
    return $this->belongsTo(Product::class)->select('id','product_name','image');
}

public function stock()
{
    return $this->hasOne(ProductStock::class);
}

public function transfers()
{
    return $this->hasMany(Transfer::class);
}
public function prices()
{
    return $this->hasMany(ProductPrices::class, 'product_size_id');
}
public function countries()
{
    return $this->belongsToMany(Countries::class, 'product_size_countries')->withPivot('is_active');
}
}
