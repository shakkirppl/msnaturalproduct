<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class NewsLetter extends Model
{
    use HasFactory;
    protected $table = 'news_letter';
    protected $fillable = [
        'id', 'gmail'
    ];
   
 
}
