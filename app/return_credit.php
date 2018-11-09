<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class return_credit extends Model
{   
    
    public $timestamps = false;

    
    public function holdings()
    {
        return $this->belongsTo('App\holdings','holdingId');
    }
}
