<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'auther', 'image', 'description', 'store_id'
    ];
    public static function create_testmonial($request,$image)
    {
        $request['store_id']=1;
        $request['image']=$image;
        
        self::create($request->all());
    }
    public static function update_testmonial($request,$brand)
    {
        $request['store_id']=Auth::user()->store_id;
        $brand->update($request->all());
    }
}
