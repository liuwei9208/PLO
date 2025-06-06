<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
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
    ];
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
