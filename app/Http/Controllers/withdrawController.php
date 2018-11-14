<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
class withdrawController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index(){
         $countryIndia = false;
        $profile = profile::where('userId', auth()->user()->id)->first();
      //  dd($profile->country);
        if( $profile->country=='India'){
            $countryIndia=true;
        }

        return view('withdraw')->with('countryIndia',$countryIndia);

    }
    public function selectwithdrawalmethod(Request $request){
       $withdrawalMethod= $request->input('wmethod');
       $amount= $request->input('amount');

       $request->session()->put('amount', $amount);
       $request->session()->put('withdrawalMethod', $withdrawalMethod);

       

       switch ($withdrawalMethod) {
        case 'bank':
                   return view('withdraw.bank')->with('amount',$amount);
       break;
       case 'paypal':
       return view('withdraw.paypal')->with('amount',$amount);
       break;

       case 'moneypolo':
       return view('withdraw.moneypolo')->with('amount',$amount);
       break;

       case 'bitcoin':
       return view('withdraw.bitcoin')->with('amount',$amount);
       break;
        
        default:
        return '';
    }


    }

    public function processWithdraw(Request $request){


        $amount=   $request->session()->get('amount');
        $withdrawalMethod=   $request->session()->get('withdrawalMethod');


  switch ($withdrawalMethod) {
        case 'bank':
                   return 'bank';
       break;
       case 'paypal':
       return view('withdraw.paypal')->with('amount',$amount);
       break;

       case 'moneypolo':
       return view('withdraw.moneypolo')->with('amount',$amount);
       break;

       case 'bitcoin':
       return view('withdraw.bitcoin')->with('amount',$amount);
       break;
        
        default:
        return '';
    }
    }
    
}
