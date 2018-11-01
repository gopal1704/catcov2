<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class holding extends Model
{
    //
    public $timestamps = false;


    public function schemes()
    {
        return $this->hasOne('App\scheme','id','schemeId');
    }
    public function return_credit()
    {
        return $this->hasMany('App\return_credit','id','holdingId');
    }
}
