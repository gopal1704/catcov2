<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Illuminate\Support\Facades\Auth;
use AWS;
use App\calculatebalance;
use App\operations;
use App\transaction;
use DB;

class walletTransferController extends Controller
{
    //
    const Credit = 'Cr.';
    const Debit = 'Dr.';
    const MainWallet = 'mw';
    const PendingWallet = 'pw';
    const WithdrawalPendingWallet = 'wpw';
    const Investment ="inv";

    public function sendOtp(Request $request){
        $amount = $request->input('amount') ;
        $account = profile::where('userId', $request->input('accountNumber'))->first();
       
        if($amount<=calculatebalance::getWalletBalance() && $account){

            $otp=rand(650000,100000);

           operations::sendSMS('+919176454024','Otp for wallet transfer '.$otp);
         $request->session()->put('otp', $otp);
         $request->session()->put('accountNumber', $account->userId);
         $request->session()->put('amount', $amount);

           return view('confirmotp');

        }
        else{
return 0;
        }


    }

   public function processtransfer(Request $request){



   if($request->input('otp') == $request->session()->get('otp') ){

  $account=  $request->session()->get('accountNumber');
  $amount=   $request->session()->get('amount');
  $toName =       profile::where('userId',$account)->first()->firstName;
  $fromName =       profile::where('userId',auth()->user()->id)->first()->firstName;

    
        $transaction= new transaction;
        $transaction->userId = auth()->user()->id;
        $transaction->TYPE= self::Debit;
        $transaction->amount = $amount;
        $transaction->ACCOUNT = self::MainWallet;
        $transaction->narration= 'Debit wallet transfer to '  ; 

      //
      $transaction_r= new transaction;
      $transaction_r->userId = $account;
      $transaction_r->TYPE= self::Credit;
      $transaction_r->amount = $amount;
      $transaction_r->ACCOUNT = self::MainWallet;
      $transaction_r->fromId = auth()->user()->id;
      $transaction_r->narration= 'Credit wallet transfer from '; 

      //
      DB::transaction(function () use ($transaction, $transaction_r) {
        $transaction->save();
        $transaction_r->save();
    });


return 'ok';

   } 
   else{
   return 'fail' ;
}
   }
}
