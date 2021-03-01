<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class partfood extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'image',
        'food_id',
         'price'
       
    ];


}
