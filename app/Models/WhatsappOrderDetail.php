<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatsappOrderDetail extends Model
{

    protected $table = 'whatsapp_order_details';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_size_id',
        'product_prize_id',
        'quantity',
        'price',
        'total',
        'store_id'
        
    ];
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }


    public function sizes()
    {
        return $this->hasMany(ProductSizes::class,'id','product_size_id', 'id');
    }
    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
   
public function productSize()
{
    return $this->belongsTo(ProductSizes::class, 'product_size_id');
}
    public function prices(){
        return $this->hasManyThrough('App\Models\ProductPrices','App\Models\ProductSizes','product_id','product_size_id');
    }

    

    public function scopeStore($query)
    {
         return $query->where('store_id',Auth::user()->store_id);
    }

    public function customer()
    {
        return $this->hasMany(Customer::class,'user_id','customer_id'); // Assuming you have an OrderItem model
    }

    public function whatsappOrder()
    {
        return $this->hasMany(WhatsappOrder::class);
    }

    public function order()
{
    return $this->hasMany(WhatsappOrder::class, 'order_id', 'id');
}
}
