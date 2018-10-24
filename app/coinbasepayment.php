<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coinbasepayment extends Model
{
    //
    public $timestamps = false;
    
    public function User()
    {
        return $this->belongsTo('App\User');
    }

}
