<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class ShippmentDetailsInternational extends Model
{
    protected $table = 'shipmentdetailsinternational';
    use HasFactory;

   
    public function scopeStore($query,$store)
    {
         return $query->where('store_id',$store);
    }
 
}
