<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\globepay;
use DB;
use Log;

class globepayc extends Controller
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
$amount= $request->input('amount');
$userid=auth()->user()->id;
if($amount>=1){
  $globepay = new globepay;
  $globepay->userId=$userid;
  $globepay->amount=$amount;



  
  DB::transaction(function () use ($globepay) {
    $globepay->save();

   

});

$gp=$globepay->id;
  return view('globepay',compact('amount','gp'));

}
else{
  return 0;
}





  }

}
