<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{
  protected $connection = 'member_mysql';
  protected $table = 'users';
  protected $fillable = [
    'id',
    'name',
    'subname',
    'email',
    'password',
    'tel',
    'oldid',
    'commentbr',
    'address',
    'birth',
    'crated_at',
  ];
  
}

?>