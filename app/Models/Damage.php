<?php

// app/Models/Damage.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Damage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_size_id',
        'store_id',
        'quantity',
        'reason',
        'damage_date',
    ];

    public function productSize()
    {
        return $this->belongsTo(ProductSizes::class);
    }

    public function store()
    {
        return $this->belongsTo(Stores::class);
    }
}
