<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Rank;

class Shop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $connection = 'mysql';
    protected $fillable = [
        'slug',
        'url',
        'name',
        'postcode',
        'address1',
        'address2',
        'tel',
        'email',
        'map',
        'folder',
        'video_folder',
        'open_start',
        'open_end',
        'memo',
    ];

    protected $casts = [
        'open_start' => 'datetime',
        'open_end' => 'datetime',
    ];

    public function banners()
    {
        return $this->hasMany(Banner::class);
    }
    public function events()
    {
        return $this->hasMany(Event::class);
    }

    public function ranks()
    {
        return $this->belongsToMany(Rank::class, 'shop_rank')->withTimestamps();
    }

    public function mainVisualImages()
    {
        return $this->hasMany(MainVisualImage::class)->orderBy('sort_order');
    }
}
