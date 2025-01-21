<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Visitors extends Model
{
    use HasFactory;
    
    protected $table = 'visitors';
    protected $fillable = ['id', 'ip','email','countryName','countryCode','regionCode','regionName','cityName','zipCode'];
    public static function create_visitors($request)
    {
        $vistors=new self;
        $vistors->ip=$request->ip;
        $vistors->email='';
        $vistors->countryName=$request->countryName;
        $vistors->countryCode=$request->countryCode;
        $vistors->regionCode=$request->regionCode;
        $vistors->regionName=$request->regionName;
        $vistors->cityName=$request->cityName;
        $vistors->zipCode=$request->zipCode;
        $vistors->save();
    }
   
   
}
