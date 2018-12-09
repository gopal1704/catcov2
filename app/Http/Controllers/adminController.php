<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\profile;
use Illuminate\Support\Facades\Auth;
use AWS;
use App\calculatebalance;
use App\operations;
use App\transaction;
use Session;
use DB;
class adminController extends Controller
{


    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function index()
    {
return view('admin.home');        
    }

    public function   users(){
        $users = \App\User::with('profiles')->paginate(10);
//return $users;
        return view('admin.users',compact('users'));        

    }
   public function transactions(){

    $transactions = \App\transaction::orderBy('TIMESTAMP', 'desc')->paginate(8);
   

return view('admin.transactions',compact('transactions'));

   }
   public function  withdrawalrequests(){
    $wd = \App\withdrawalrequest::where('status',1)->orderBy('TIMESTAMP', 'desc')->paginate(10);

    return view('admin.withdrawalrequests',compact('wd'));        

   }
public function  approvedwithdrawalrequests(){
    $wd = \App\withdrawalrequest::where('status',0)->orderBy('TIMESTAMP', 'desc')->paginate(10);


    return view('admin.approvedwd',compact('wd'));        

}

public function approveuser(Request $request){
    $userId= $request->input('userId');
    
    $user = profile::where('userId',$userId)->first();
    return view('admin.approveuser',compact('user'));
}
public function approveuserconfirm(Request $request){
    $userId= $request->input('userId');
    
    $user = profile::where('userId',$userId)->first();

    if(approvalStatus==0){
    $user->approvalStatus=1;
    $user->save();
    Session::flash('message', 'User approval success!'); 
    return redirect()->route('adminhome');
    }else{
        Session::flash('error', 'User already approved!'); 
        return redirect()->route('adminhome');
    }

}
public function  holdings(){

   
    $holdings = \App\holding::orderBy('TIMESTAMP', 'desc')->with('schemes')->paginate(10);
    //return $holdings;
    return view('admin.holdings',compact('holdings'));    

}

public function addwalletbalance(){
return view('admin.addwalletbalance');

}

public function addwalletbalanceconfirm(Request $request){

    $walletId= $request->input('walletId');
    $amount=$request->input('amount');


    $toAccount = profile::where('walletId',$walletId)->first()->userId;
   if($toAccount){

        $transaction= new transaction;
        $transaction->userId = $toAccount;
        $transaction->TYPE= 'Cr.';
        $transaction->amount = $amount;
        $transaction->ACCOUNT = 'mw';
        $transaction->narration= 'Credit wallet transfer from CATCO TRADING INTERNATIONAL INC'  ; 
        DB::transaction(function () use ($transaction) {
            $transaction->save();
        });
try{
        $tomobile= profile::where('walletId',$walletId)->first()->isdcode.profile::where('walletId',$walletId)->first()->mobile;
        operations::sendSMS($tomobile,'Credit : USD '.$amount.' from CATCO TRADING INTERNATIONAL INC.');

}catch(Exception $e){

}
        Session::flash('message', 'Wallet transfer successful!'); 
        return redirect()->route('adminhome');

   }else{
    Session::flash('error', 'Error in adding wallet balance kindly check wallet id'); 
    return redirect()->route('adminhome');
}





}
    //
}
