<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class withdrawController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index(){
        

        return view('withdraw');

    }
    public function selectwithdrawalmethod(Request $request){
       $withdrawalMethod= $request->input('wmethod');
       switch ($withdrawalMethod) {
        case 'bank':
                   return view('withdraw.bank');
       break;
       case 'paypal':
       return view('withdraw.paypal');
       break;

       case 'moneypolo':
       return view('withdraw.moneypolo');
       break;

       case 'bitcoin':
       return view('withdraw.bitcoin');
       break;
        
        default:
        return '';
    }


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
