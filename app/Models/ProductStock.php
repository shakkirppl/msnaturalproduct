<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductStock extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_size_id',
        'store_id',
        'location',
        'quantity',
    ];

    public function productSize()
    {
        return $this->belongsTo(ProductSize::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}