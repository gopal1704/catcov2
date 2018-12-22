<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class globepay extends Controller
{
    //

    public function index(){
        return view('globepay');
    }

  public function  successredirect(){
    Session::flash('message', 'Investment successful!'); 
    return redirect('/home');
  }

  public function  errorredirect(){
    Session::flash('error', 'Payment cancelled!'); 
    return redirect('/home');
  }

}
