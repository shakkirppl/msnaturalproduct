<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\ProductSizeLanguageScope;
class ProductCountry extends Model
{
    protected $fillable = [
        'product_id', 'countries_id', 'is_active'
    ];

}
