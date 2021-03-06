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
use Hash;

use DB;
class adminController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:admins');
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

    $transactions = \App\transaction::orderBy('TIMESTAMP', 'desc')->paginate(15);
   

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

    if($user->approvalStatus==0){
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

public function logout(){
    
Auth::logout();

return redirect('/');
}

public function addwalletbalance(){
return view('admin.addwalletbalance');

}

public function editprofile(Request $request){
    $userId= $request->input('userId');
    $timezones = operations::timezones;
        $profile =  profile::where('userId',$userId)->first();
         $countries=operations::countries;
     return view('admin.editprofile',compact('timezones','profile','countries','userId'));

}
public function processEdit(Request $request){
    $userId= $request->input('userId');

    $profile =  profile::where('userId',$userId)->first();
    $profile->firstName= $request->input('firstName');
    $profile->lastName= $request->input('lastName');
    $profile->title =$request->input('title');
    $profile->gender = $request->input('gender');
    $profile->address = $request->input('address');
    $profile->city= $request->input('city');
    $profile->state=$request->input('state');
    $profile->country=$request->input('country');
    $profile->isdcode =$request->input('isdcode');
    $profile->mobile=$request->input('mobile');
    $profile->pincode = $request->input('pincode');
    $profile->dateOfBirth = $request->input('dateOfBirth');
    $profile->timeZone = $request->input('timeZone');
    $profile->save();

    Session::flash('message', 'Profile updated!'); 
    return redirect()->route('adminhome');
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
    public function changePasswordAdmin(Request $request){
//dd(Auth::user()->password);

        if (!(Hash::check($request->get('password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('password'), $request->get('newpassword')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'password' => 'required',
            'newpassword' => 'required|string|min:6',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('newpassword'));
        $user->save();
        Session::flash('message', 'Password changed successfully!'); 
        return redirect('/admin/home');
    }
}
