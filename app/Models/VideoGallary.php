<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class VideoGallary extends Model
{
    use HasFactory;
    protected $fillable = [
        'channel', 'image', 'video', 'store_id'
    ];
    public static function create_video($request,$image)
    {
        $request['store_id']=1;
        $request['image']=$image;
        
        self::create($request->all());
    }
    public static function update_video($request,$brand)
    {
        $request['store_id']=Auth::user()->store_id;
        $brand->update($request->all());
    }
}
