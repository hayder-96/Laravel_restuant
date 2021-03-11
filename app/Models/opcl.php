<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opcl extends Model
{
    use HasFactory;

    protected $fillable = [
        'open',
        'close',
       
    ];
}
