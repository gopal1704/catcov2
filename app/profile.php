<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    //
    public $timestamps = false;


    public function User()
    {
        return $this->belongsTo('App\User');
    }
}
