<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'order_id',
        'store_id',
        'quantity',
        'currency',
        'product_id',
        'customer_id',
        'price',
        'total_amount',
        'product_size_id',
        'product_prize_id'

    ];



    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }


    public function sizes()
    {
        return $this->hasMany(ProductSizes::class,'id','product_size_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function productSize()
{
    return $this->belongsTo(ProductSizes::class, 'product_size_id');
}
    public function prices()
    {
        return $this->hasManyThrough(ProductPrices::class, ProductSizes::class, 'product_id', 'product_size_id');
    }

    public function order()
    {
        return $this->hasMany(Order::class,'id','order_id');
    }
    public function store()
    {
        return $this->belongsTo(Stores::class); // Assuming this model belongs to a Store model
    }
    public function country()
    {
        return $this->belongsTo(Countries::class); // Assuming this model belongs to a Store model
    }
    public function customer()
    {
        return $this->hasMany(Customer::class,'user_id','customer_id')->select('id','first_name','last_name'); // Assuming you have an OrderItem model
    }
}
