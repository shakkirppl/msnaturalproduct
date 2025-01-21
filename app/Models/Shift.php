<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Shift extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','shift_hours','labor_hour_cost','status'];
    public static function create_shift($request)
    {
        self::create($request->all());
    }
    public static function update_shift($request,$brand)
    {
        $brand->update($request->all());
    }
    public function scopeActive($query)
    {
         return $query->where('status',1)->orderBy('id', 'asc');
    }
 
}
