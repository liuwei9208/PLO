<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
    protected $fillable = [
        'shop_id',
        'published_at',
        'title',
        'thumbnail',
        'is_public',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_public' => 'boolean',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
