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

class approvewithdrawal extends Controller
{
    //


    public function index()
    {
        return 0;
    }


    public function approve(Request $request){

        $id=$request->input('id');
        $wd =  withdrawalrequest::where('id',$id)->first();;
       // return $wd;
        return view('admin.approvewd',compact('wd'));

     
    }

    public function confirm(Request $request){

        $id=$request->input('id');
        $approvalDetails=$request->input('approvalDetails');
        $wd =  withdrawalrequest::where('id',$id)->first();
        $wd->approvalDetails=$approvalDetails;

       
       
        if($wd->status==1){

    $transaction_w= new transaction;
    $transaction_w->userId = $wd->userId;
    $transaction_w->TYPE= 'Dr.';
    $transaction_w->amount = $wd->amount;
    $transaction_w->ACCOUNT = 'wpw';
    $transaction_w->narration= "Debit pending  wallet - withdrawal Approved - Approval details : ". $approvalDetails;
    
    $wd->status=0;

    DB::transaction(function () use ($transaction_w,$wd) {
        $transaction_w->save();
        $wd->save();

    });


    Session::flash('message', 'Withdrawal request approved!'); 

             return redirect()->route('wd');

        }
else{
    
    Session::flash('error', 'Already withdrawal  request approved!'); 

             return redirect()->route('wd');
}
     
    }

}
