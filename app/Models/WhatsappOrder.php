<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class WhatsappOrder extends Model
{
    use HasFactory;

    protected $table = 'whatsapp_orders';
    protected $fillable = [
        'invoice_no',
        'customer_id',
        'whatsapp_no',
        'shipping_charge',
        'total',
        'store_id'
        
    ];

    public function detail(){
        return $this->hasMany('App\Models\WhatsappOrderDetail','order_id',)
          ->join('products','products.id','=','whatsapp_order_details.product_id')
          ->join('product_sizes','product_sizes.id','=','whatsapp_order_details.product_size_id')
           ->select('whatsapp_order_details.*','products.*','product_sizes.*');
    }
    
    public function customer()
    {
        return $this->belongsTo(WhatsappCustomer::class, 'customer_id');
    }

     public function WhatsappOrderDetail()
     {
         return $this->hasMany(OrderDetails::class); // Assuming you have an OrderItem model
     }

     public function WhatsappCustomer()
     {
         return $this->hasMany(WhatsappCustomer::class,'user_id','whatsapp_customers'); // Assuming you have an OrderItem model
     }

     public function store()
     {
         return $this->belongsTo(Store::class, 'store_id');
     }
 
     
    public function country()
    {
        return $this->belongsTo(Countries::class); // Assuming this model belongs to a Store model
    }

    public function scopeStore($query)
    {
        return $query->where('store_id', auth()->user()->store_id);
    }
    public function prices(){
        return $this->hasManyThrough('App\Models\ProductPrices','App\Models\ProductSizes','product_id','product_size_id');
    }

public function orderDetails()
{
    return $this->hasMany(WhatsappOrderDetail::class, 'order_id', 'id');
}

public function product()
{
    return $this->belongsTo(Product::class);
}

public function productSizes()
{
    return $this->hasMany(ProductSizes::class,'id','');
}




public function scopeWhatsappFilter($query, $value)
{
    return $query->when($value, function ($q) use ($value) {
        $q->where('customer_id', $value);
    });
}

public function scopeIntwodate($query, $from_date, $to_date)
{
    return $query->when($from_date && $to_date, function ($q) use ($from_date, $to_date) {
        $q->whereBetween('created_at', [$from_date, $to_date]);
    });
}
 
    
}
