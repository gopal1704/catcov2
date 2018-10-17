<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scheme extends Model
{
    public $timestamps = false;

    //

    public function holdings()
    {
        return $this->belongsTo('App\holdings','schemeId');
    }

   
}
