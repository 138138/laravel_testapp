<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function phone()
    {
        return $this->hasOne('App\Phone'); // with this automatically expects 'user_id' in phone table in 'phone' model
        // return $this->hasOne('App\Phone','user_id'); // or we can manually map id of the user table with passing second argument as column
    }

    public function comment()
    {
        return $this->hasMany('App\Comment');
        // return $this->hasMany('App\Comment','user_id'); // we can map column name with second arguments
    }
}
