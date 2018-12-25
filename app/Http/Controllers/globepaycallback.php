<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;

class globepaycallback extends Controller
{
    //



    public function callback(Request $request){
        Log::info(['Request'=>$request]);
        return 'ok';
    
      }
}
