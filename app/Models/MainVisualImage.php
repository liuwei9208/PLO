<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MainVisualImage extends Model
{
    protected $connection = 'mysql';
    protected $table = 'main_visual_images';
    protected $fillable = [
        'shop_id',
        'sort_order',
        'image_path',
        'link_url',
    ];

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
