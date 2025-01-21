<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class ProductionMaster extends Model
{
    use HasFactory;
    protected $dateFormat = 'Y-m-d';
    public function scopeActive($query)
    {
         return $query->where('status',1)->orderBy('id', 'asc');
    }
    public function detail(){
        return $this->hasMany('App\Models\ProductionDetail','bom_master')
          ->join('products','products.id','=','production_details.bom_product_id')
            ->join('product_sizes','product_sizes.id','=','production_details.bom_unit')
          ->select('production_details.*','product_sizes.size as unit','products.product_name as producName');
         
     }
     public function bydetail(){
      return $this->hasMany('App\Models\ProductionByProductDetail','bom_master')
        ->join('products','products.id','=','production_by_product_details.by_product_id')
          ->join('product_sizes','product_sizes.id','=','production_by_product_details.by_unit')
          ->select('production_by_product_details.*','product_sizes.size as unit','products.product_name as producName');
       
   }
    
    public function scopeStore($query)
    {
         return $query->where('store_id',Auth::user()->store_id);
    }
    
    public function scopeUser($query,$value)
    {
      return $query->where('user_id',$value);

    }

    public function scopeWithUser($query,$value)
    {
      return $query->where(function($query)use ($value) {
        if ($value) {
            $query->where('user_id', $value);
        }
         });

    }
   
    
  
      public function scopeIntwodate($query,$from_date,$to_date)
   {
        return $query->where(function($query)use ($from_date,$to_date) {
                           if ($from_date && $to_date) {
                               $query->whereBetween('in_date', [$from_date, $to_date]);
                           }
                            });
   } 
  
   public function user(){
     
     return $this->hasMany(User::class,'id','user_id');
  }
  public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function products(){
     
      return $this->hasMany(Product::class,'id','product_id');
   }
   public function shift(){
     
    return $this->hasMany(Shift::class,'id','shift_id');
 }
}
