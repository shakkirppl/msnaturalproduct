<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnItem extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function productSize()
    {
        return $this->hasMany(Product::class,'id','product_size_id');
    }
    public function order()
    {
        return $this->hasMany(Order::class,'id','order_id');
    }
    public function stores()
    {
    return $this->hasMany(Stores::class,'id','store_id');
    }
    public function user()
    {
    return $this->hasMany(User::class,'id','user_id');
    }
    public function customer()
    {
    return $this->hasMany(Customer::class,'user_id','customer_id');
    }
    public function reason()
    {
    return $this->hasMany(ReturnReason::class,'id','reason_id');
    }
    
}
