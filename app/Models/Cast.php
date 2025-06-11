<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cast extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'shop_id',
        'joined_at',
        'age',
        'height',
        'bra_size',
        'bust',
        'waist',
        'hip',
        'appeal_point',
        'manager_comment',
        'profile_url',
        'diary_email_from',
        'diary_email_to',
        'diary_email_password',
        'gallery_1',
        'gallery_2',
        'gallery_3',
        'gallery_4',
        'gallery_5',
        'is_public',
        'memo',
    ];

    /**
     * Shop relationship.
     */
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }

    public function options()
    {
        return $this->belongsToMany(Option::class);
    }

    public function personalities()
    {
        return $this->belongsToMany(Personality::class);
    }

    public function styles()
    {
        return $this->belongsToMany(Style::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
