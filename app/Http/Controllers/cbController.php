<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cbController extends Controller
{
    //

    public function  cb(Request $request){
        return response('Hello World', 200)
                  ->header('Content-Type', 'text/plain');
    }
}
