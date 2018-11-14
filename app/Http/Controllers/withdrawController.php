<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\withdrawalrequest;
use App\transaction;
use DB;
use App\operations;
use App\calculatebalance;
use Session;
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
    ///process bank withdrawal request
    $walletBalance = calculatebalance::getWalletBalance();
        
    if($walletBalance>=$amount){//if sufficient wallet balance


$accDetails=$withdrawalMethod= $request->input('bankname').' - '. $request->input('accountnumber'). ' - '.$request->input('ifsc');
    //
    $transaction= new transaction;
    $transaction->userId = auth()->user()->id;
    $transaction->TYPE= 'Dr.';
    $transaction->amount = $amount;
    $transaction->ACCOUNT = 'mw';
    $transaction->narration= "Debit main wallet - withdrawal";

    $transaction_w= new transaction;
    $transaction_w->userId = auth()->user()->id;
    $transaction_w->TYPE= 'Cr.';
    $transaction_w->amount = $amount;
    $transaction_w->ACCOUNT = 'wpw';
    $transaction_w->narration= "Credit pending  wallet - withdrawal";

    $wrequest = new withdrawalrequest;
    $wrequest->amount=$amount;
    $wrequest->userId=auth()->user()->id;
    $wrequest->accountDetails=$accDetails;
    DB::transaction(function () use ($transaction, $transaction_w,$wrequest) {
        $transaction->save();
        $transaction_w->save();
        $wrequest->save();

    });

    Session::flash('message', 'Wallet transfer successful!'); 
    return redirect('/home');



    }
    else{
        //insufficient bal
    }


    /////
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
