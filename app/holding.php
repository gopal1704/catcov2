<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class holding extends Model
{
    //

    public function schemes()
    {
        return $this->hasOne('App\scheme','id','schemeId');
    }
}
