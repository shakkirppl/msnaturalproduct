<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class WorkCenter extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name','status'];
    public static function create_workcenter($request)
    {
 
        self::create($request->all());
    }
    public static function update_workcenter($request,$workCenter)
    {
   
        $workCenter->update($request->all());
    }
    public function scopeActive($query)
    {
         return $query->where('status',1)->orderBy('id', 'asc');
    }
   
}
