<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userfood extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'image',
        'user_id',
         'price',
         'number',
         
    ];
}
