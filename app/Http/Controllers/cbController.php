<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\coinbasepayment;
class cbController extends Controller
{
    //

    public function  cb(Request $request){

        $data=json_decode($request->getContent(), true);
        $code=$data->event->data->code;
        App\coinbasepayment::where('code', $code)
          ->update(['status' => 1]);
        return response('', 200);
    }
}
