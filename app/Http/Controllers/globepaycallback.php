<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use DB;

use App\globepay;

use App\transaction;

use App\User;
use App\operations;

class globepaycallback extends Controller
{
    //



    public function callback(Request $request){
        Log::info($request->input('custom'));
        Log::info($request->input('refrence_no'));


$globepaydbid=$request->input('custom');
if($globepaydbid!=null){
 $gp=globepay::where('id',$globepaydbid)->first();
 $gp->refrence_no=$request->input('refrence_no');
 $gp->status=1;
 $gp->save();

 //transaction
 $transaction_r= new transaction;
 $transaction_r->userId = $gp->userId;
 $transaction_r->TYPE= 'Cr.';
 $transaction_r->amount = $gp->amount;
 $transaction_r->ACCOUNT = 'mw';
 $transaction_r->narration= 'Credit Globepay refno- '.$gp->refrence_no;
 
 DB::transaction(function () use ($transaction_r) {
    $transaction_r->save();
});

}



        

        return 'ok';
    
      }
}
