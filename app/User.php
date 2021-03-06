<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','referralid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**RELATIONSHIPS */
    public function profiles(){
        return $this->hasOne('App\profile','userId');
    }
    public function transactions(){
        return $this->hasMany('App\transaction','userId');
    }
    public function holdings(){
        return $this->hasMany('App\holding','userId');
    }

}
