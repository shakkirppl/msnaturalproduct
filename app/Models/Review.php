<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Review extends Model
{
    use HasFactory;
    public function product()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
    public function stores()
    {
    return $this->hasMany(Stores::class,'id','store_id');
    }
    public function user()
    {
    return $this->hasMany(User::class,'id','user_id');
    }
}
