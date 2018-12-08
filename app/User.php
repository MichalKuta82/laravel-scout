<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function accounts() {
      return $this->hasMany('App\SocialAccount');
    }

    public function posts() {
      return $this->hasMany('App\Post');
    }
    
      //overwritting table name
      // public function searchableAs()
      // {
      //    return 'user_index';
      // }

      //overwritting which elements are searchable
      // public function toSearchableArray()
      // {
      //    return [
      //        'name', 'email',
      //    ];
      // }
}
