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
//
        //holding
        $holding = new holding;
        $holding->userId = auth()->user()->id;
        $holding->schemeId = intval($schemeId);
        $holding->amount=$amount;
        $holding->paymentDetails="Wallet Payment";

      
        DB::transaction(function () use ($transaction, $holding) {
            $transaction->save();
            $holding->transactionId= $transaction->id;

            $holding->save();
        });


             return redirect('/home');
        


        //create transaction


    }
}
