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

  
  public function couponuse()
  {
      return $this->hasMany('App\Models\CouponUse')
          ->where('confirm', 0)
          ->where('created_at', '>', DB::raw('( NOW( ) - INTERVAL 60 minute )'))
          ->withTrashed();
  }

  public function history()
  {
      return $this->hasOne('App\Models\History')->where('name', '来店')->orderBy('created_at', 'desc')->withTrashed();
  }

  public function histories()
  {
      return $this->hasMany('App\Models\History')->where('name', '来店')->orderBy('created_at', 'desc')->withTrashed();
  }

  public function recently()
  {
      return $this->hasMany('App\Models\History')->whereIn('name', ['来店', 'PT有効期限切れ'])->orderBy('created_at', 'desc')->with(['cast', 'course'])->limit(30);

  }
}

?>