<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class ProductionByProductDetail extends Model
{
    use HasFactory;
    public function scopeStore($query)
    {
         return $query->where('store_id',Auth::user()->store_id);
    }
  
      public function user(){
       
       return $this->hasMany('App\Models\User','id','user_id');
    }
    public function master(){
       
       return $this->hasMany('App\Models\GoodsOut','id','goods_out_id');
    }
     public function units(){
        
     return $this->hasMany(Unit::class,'id','unit');
  }
     public function product(){
        
     return $this->hasMany(Product::class,'id','item_id');
  }
}
