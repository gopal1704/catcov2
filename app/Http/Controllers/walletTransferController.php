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
        $account = profile::where('walletId', $request->input('walletId'))->first();
        $from = profile::where('userId', auth()->user()->id)->first();

        if($amount<=calculatebalance::getWalletBalance() && $account){

            $otp=rand(650000,100000);
            $mobile=$from->isdcode.$from->mobile;
            operations::sendSMS($mobile,'Otp for wallet transfer '.$otp);
         $request->session()->put('otp', $otp);
         $request->session()->put('walletId', $account->walletId);
         $request->session()->put('amount', $amount);

           return view('confirmotp');

        }
        else{
return 0;
        }


    }

   public function processtransfer(Request $request){



   if($request->input('otp') == $request->session()->get('otp') ){

  $walletId=  $request->session()->get('walletId');
  $amount=   $request->session()->get('amount');
  $toName =       profile::where('walletId',$walletId)->first()->firstName;
  $fromName =       profile::where('userId',auth()->user()->id)->first()->firstName;
  $fromWallet =  profile::where('userId',auth()->user()->id)->first()->walletId;

  $toAccount = profile::where('walletId',$walletId)->first()->userId;
    

        $transaction= new transaction;
        $transaction->userId = auth()->user()->id;
        $transaction->TYPE= self::Debit;
        $transaction->amount = $amount;
        $transaction->ACCOUNT = self::MainWallet;
        $transaction->narration= 'Debit wallet transfer to '.$toName . ' ' .$walletId  ; 

      //
      $transaction_r= new transaction;
      $transaction_r->userId = $toAccount;
      $transaction_r->TYPE= self::Credit;
      $transaction_r->amount = $amount;
      $transaction_r->ACCOUNT = self::MainWallet;
      $transaction_r->fromId = auth()->user()->id;
      $transaction_r->narration= 'Credit wallet transfer from '.$fromName . ' '.$fromWallet; 

      //
      DB::transaction(function () use ($transaction, $transaction_r) {
        $transaction->save();
        $transaction_r->save();
    });



    $message = "Wallet transfer Success!";
    return redirect()->route('home', [$message]);
      

   } 
   else{
   return 'fail' ;
}
   }
}
