<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'phone_number',
        'country_id',
        'store_id',
        'state',
        'city',
        'address',
        'pincode',
        'landmark',
        'type'
    ];
    public function scopeStore($query,$store)
    {
         return $query->where('store_id',$store);
    }
    public function countries()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    // Relationship for State
    public function StatesModel()
    {
        return $this->belongsTo(StatesModel::class,'state', 'id');
    }
}
