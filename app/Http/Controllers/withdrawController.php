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
use App\globepay;
use Carbon\Carbon;
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

       if($amount){

       

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
       
       
       case 'globepay':
       return view('withdraw.globepay')->with('amount',$amount);
       break;
       
        
        default:
        return '';
    }

       }else{

       }
    }

    public function processWithdraw(Request $request){


        $amount=   $request->session()->get('amount');
        $withdrawalMethod=   $request->session()->get('withdrawalMethod');
        $walletBalance = calculatebalance::getWalletBalance();

        if($walletBalance>=$amount){
            switch ($withdrawalMethod) {
                case 'bank':
                $accDetails=$withdrawalMethod= $request->input('bankname').' - '. $request->input('accountnumber'). ' - '.$request->input('ifsc');
                $this->wd($amount,$accDetails);
                Session::flash('message', 'Withdrawal request successful!'); 
                return redirect('/home');
                break;
            
            
                   case 'paypal':
                   $accDetails= 'Paypal Email  '.$request->input('paypalemail');
                   $this->wd($amount,$accDetails);
                   Session::flash('message', 'Withdrawal request successful!'); 
                   return redirect('/home');
                   break;
            
                   case 'moneypolo':
                   $accDetails= 'Moneypolo email :  '.$request->input('moneypolo');
                   $this->wd($amount,$accDetails);
                   Session::flash('message', 'Withdrawal request successful!'); 
                   return redirect('/home');
                   break;
            
                   case 'bitcoin':
                   $accDetails='Bitcoin Address :  ' . $request->input('bitcoin');
                   $this->wd($amount,$accDetails);
                   Session::flash('message', 'Withdrawal request successful!'); 
                   return redirect('/home');
                   break;

                   case 'globepay':
                   $accDetails= 'Globepay email :  '.$request->input('globepayemail');

                   if($amount<=1500){
                   
                    $previous_request = withdrawalrequest::where('userId', auth()->user()->id)->where('status', 1)->first();
                    if( $previous_request){
                        Session::flash('error', 'Withdrawal failed - previous request pending!'); 
                        return redirect('/home');
     
                    }
                    else{
                       // $previous_approved_request = withdrawalrequest::orderBy('TIMESTAMP', 'desc')->where('userId', auth()->user()->id)->where('status', 0)->first();
                       // dd($previous_approved_request->timestamp);
                        // $currentTime = Carbon::now();
                        // $previous_approved_request_time =  Carbon::createFromFormat('Y-m-d H:i:s',$previous_approved_request->timestamp);
                        
                            Session::flash('message', 'Withdrawal request successful!'); 
                            $this->wd($amount,$accDetails);

                            return redirect('/home');
                        
                      


                        
     
                    }


                  


                    } else{
                        Session::flash('error', 'Withdraw failed maximul withdrawal limit 1500 USD'); 
                        return redirect('/home');    
                    }
                
                   break;
                    
                    default:
                    return '';
                }
        }
        else{
            //insufficient bal
            Session::flash('error', 'Insufficient balance -Withdrawal request could not be processed!'); 
        return redirect('/home');
        }

 
    }

    public function wd($amount,$accountdetails){


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
    $wrequest->accountDetails=$accountdetails;
    DB::transaction(function () use ($transaction, $transaction_w,$wrequest) {
        $transaction->save();
        $transaction_w->save();
        $wrequest->save();

    });

  

    }
    
}
