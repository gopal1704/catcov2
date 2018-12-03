<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\transaction;
use App\calculatebalance;
use DB;     
class mbt extends Controller
{
    //

    public function bt(Request $request){

$id=$request->input('id');
        if($request->input('id')){

                $pendingBalance = calculatebalance::getPendingWalletBalanceId($request->input('id'));
                   if($pendingBalance>0){
                       $transaction= new transaction;
                       $transaction->userId = $id;
                       $transaction->TYPE=  'Cr.';
                       $transaction->amount =  $pendingBalance;
                       $transaction->ACCOUNT = 'mw';
                       $transaction->narration= 'Credit main wallet balance - Monthly balance transfer from pending wallet balance'  ; 
                
                
                       $transaction_pw= new transaction;
                       $transaction_pw->userId = $id;
                       $transaction_pw->TYPE=  'Dr.';
                       $transaction_pw->amount =  $pendingBalance;
                       $transaction_pw->ACCOUNT = 'pw';
                       $transaction_pw->narration= 'Debit pending wallet balance - Monthly balance transfer to main wallet'  ; 
                       
                       DB::transaction(function () use ($transaction, $transaction_pw) {
                        $transaction->save();
                        $transaction_pw->save();
                    });
                  
                  return $pendingBalance;
                    }   
                    else{
                        return 'zero pending balance';
                    }                
        }
    }

  public function  mbtview(){

    $users = User::with('profiles')->paginate(10);
  //  return $users;
        return view('admin.mbt',compact('users')); 
    }
}
