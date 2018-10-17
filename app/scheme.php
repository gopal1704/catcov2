<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class scheme extends Model
{
    //

    public function holdings()
    {
        return $this->belongsTo('App\holdings','schemeId');
    }

   
}
