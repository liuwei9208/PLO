<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CourseGroup extends Model
{
    protected $connection = 'mysql';
    protected $table = 'courses';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course',
        'price',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at'

    ];
}
