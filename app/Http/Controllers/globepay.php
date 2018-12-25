<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;
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
    public function ewallet(){
      return view('ewallet');
  }
  public function  successredirect(){
    Session::flash('message', 'Payment Successful!'); 
    return redirect('/home');
  }

  public function  errorredirect(){
    Session::flash('error', 'Payment cancelled!'); 
    return redirect('/home');
  }


  public function process(Request $request){

  }

}
