<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qa extends Model
{
    //
    protected $fillable = [
        'question',
        'is_public',
    ];
}
