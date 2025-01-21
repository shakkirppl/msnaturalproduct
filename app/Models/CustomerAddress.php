<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class CustomerAddress extends Model
{
    use HasFactory;
    protected $table = 'customer_address';
    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'address','landmark','city','state','pincode','phone_number','country_id','store_id','deafult'
    ];
    public function countrys()
    {
        return $this->hasMany(Countries::class,'id','country_id');
    }
    public function states()
    {
        return $this->hasMany(StatesModel::class,'id','state');
    }
}
