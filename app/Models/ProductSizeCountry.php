<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ProductSizeLanguageScope;
class ProductSizeCountry extends Model
{
    protected $fillable = [
        'product_sizes_id', 'countries_id', 'is_active'
    ];

}
