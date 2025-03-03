<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class WhatsappCustomer extends Model
{
    use HasFactory;
    protected $table = 'whatsapp_customers';
    protected $fillable = [
        'user_id', 'customer_name', 'country_id', 'store_id', 'state',
        'city', 'address', 'pincode', 'created_at', 'updated_at'
    ];
    public function scopeStore($query)
    {
         return $query->where('store_id',Auth::user()->store_id);
    }

    public function countries()
    {
        return $this->belongsTo(Countries::class, 'country_id');
    }

    // Relationship for State
    public function StatesModel()
    {
        return $this->belongsTo(StatesModel::class, 'state');
    }
}
