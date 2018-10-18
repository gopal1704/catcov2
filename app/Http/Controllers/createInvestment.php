<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\holding;
use DB;

class createInvestment extends Controller
{
    //
    
    const Credit = 'Cr.';
    const Debit = 'Dr.';
    const MainWallet = 'mw';
    const PendingWallet = 'pw';
    const WithdrawalPendingWallet = 'wpw';
    const Investment ="inv";


    public function fromWallet(Request $request, $type){
        $amount = floatval ($request->input('amount') );
        $schemeId =$request->input('schemeId') ;
        //
        $transaction= new transaction;
        $transaction->userId = auth()->user()->id;
        $transaction->TYPE= self::Debit;
        $transaction->amount = $amount;
        $transaction->shadowAccount = self::Investment;
        $transaction->ACCOUNT = self::MainWallet;
        $transaction->narration= "Debit for Investment";



//

//referral transaction

        $transaction_r= new transaction;
        $transaction_r->userId = auth()->user()->referralid;
        $transaction_r->TYPE= self::Credit;
        $transaction_r->amount = $amount*(5/100);
        $transaction_r->shadowAccount = 'src';
        $transaction_r->ACCOUNT = self::PendingWallet;
        $transaction_r->narration= "Credit Referral Spot Commission";


//
        //holding
        $holding = new holding;
        $holding->userId = auth()->user()->id;
        $holding->schemeId = intval($schemeId);
        $holding->amount=$amount;
        $holding->paymentDetails="Wallet Payment";

      
        DB::transaction(function () use ($transaction, $holding,$transaction_r) {
            $transaction->save();
            $holding->transactionId= $transaction->id;
            $holding->save();
            $transaction_r->save();

        });


        $message = "Investment Success!";
        return redirect()->route('home', [$message]);
          


        //create transaction


    }
}
