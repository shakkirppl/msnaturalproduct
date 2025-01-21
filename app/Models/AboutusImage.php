<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class AboutusImage extends Model
{
    use HasFactory;
    protected $table = 'aboutus_images';
    protected $fillable = [
        'id', 'image'
    ];
    public static function create_aboutus_image($request,$image)
    {
        $request['image']=$image;
        
        self::create($request->all());
    }
 
}
