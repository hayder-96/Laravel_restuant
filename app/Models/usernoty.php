<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usernoty extends Model
{
    use HasFactory;


    protected $fillable = [
        'noty',
        'user_id'
      
    ];
}
