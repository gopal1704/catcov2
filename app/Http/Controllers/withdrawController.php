<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class withdrawController extends Controller
{
    public function index(){
        

        return view('withdraw');

    }
    public function selectwithdrawalmethod(Request $request){


    }
    public function bank(Request $request){

    }
    public function paypal(Request $request){

    }
    public function moneypolo(Request $request){

    }
    public function bitcoin(Request $request){

    }
}
