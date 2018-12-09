<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;

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
public function  holdings(){

   
    $holdings = \App\holding::orderBy('TIMESTAMP', 'desc')->with('schemes')->paginate(10);
    //return $holdings;
    return view('admin.holdings',compact('holdings'));    

}
    //
}
