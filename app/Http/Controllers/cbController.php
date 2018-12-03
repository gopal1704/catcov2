<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\coinbasepayment;
class cbController extends Controller
{
    //

    public function  cb(Request $request){
        Log::debug('An informational message.');

        $data=json_decode($request->getContent(), true);
        $code=$data->event->data->code;
        App\coinbasepayment::where('code', $code)
          ->update(['status' => 1]);
          Log::debug('An informational message.');

        return response('', 200);
    }
}
