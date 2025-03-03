<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';

    // Define the fillable attributes (columns that you can mass assign)
    protected $fillable = [
        'order_no',
        'country_id',
        'email',
        'first_name',
        'last_name',
        'address',
        'apartment', 
        'city',
        'landmark',
        'shipping_address',
        'state',
        'pincode',
        'phone_number',
        'store_id',
        'date',
        'amount',
        'total_amount',
        'payment_type',
        'email',
        'customer_id',
        'billing_first_name',
        'billing_second_name',
        'billing_address',
        'billing_city',
        'billing_state',
        'billing_phone',
        'billing_post_code',
        'billing_country_id',
        'billing_option',
        'shipping_charge',
        'state_code',
        'delivery_status',
        'delivery_date'
    ];

    public function products()
    {
        return $this->belongsTo(Product::class); // Assuming this model belongs to a Store model
    }

    public function detail(){
        return $this->hasMany('App\Models\OrderDetails','order_id')
          ->join('products','products.id','=','order_details.product_size_id')
          ->join('product_sizes','product_sizes.id','=','order_details.product_size_id')
           ->select('order_details.*','products.*','product_sizes.*');
         
     }
    public function orderdetails()
    {
        return $this->hasMany(OrderDetails::class); // Assuming you have an OrderItem model
    }
    public function customer()
    {
        return $this->hasMany(Customer::class,'user_id','customer_id')->select('id','first_name','last_name'); // Assuming you have an OrderItem model
    }
    public function store()
    {
        return $this->belongsTo(Stores::class); // Assuming this model belongs to a Store model
    }
    public function country()
    {
        return $this->belongsTo(Countries::class); // Assuming this model belongs to a Store model
    }
    
    

    // You can also define other relationships like the user who placed the order:
    public function user()
    {
        return $this->belongsTo(User::class,'customer_id'); // Assuming you have a User model
    }





}

