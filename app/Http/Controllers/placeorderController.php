<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scheme;
class placeorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
$schemes = scheme::all();

return  view('placeorder', compact('schemes'));
    }

  public function  selectPayment(Request $request){

    if($request->input('paymentMethod')=='wallet'){
        $amount = $request->input('amount');
        $schemeId = $request->input('schemeId');

return view('walletpayment' ,compact('amount','schemeId'));
    
}

    if($request->input('paymentMethod')=='paypal'){
        
    }



  }
}
