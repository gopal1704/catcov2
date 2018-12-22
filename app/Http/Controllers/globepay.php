<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class globepay extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('globepay');
    }

  public function  successredirect(){
    Session::flash('message', 'Payment Successful!'); 
    return redirect('/home');
  }

  public function  errorredirect(){
    Session::flash('error', 'Payment cancelled!'); 
    return redirect('/home');
  }

}
