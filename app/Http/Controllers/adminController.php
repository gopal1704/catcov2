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
    return view('admin.transactions');        

   }
   public function  withdrawalrequests(){
    return view('admin.withdrawalrequests');        

   }
public function  approvedwithdrawalrequests(){
    return view('admin.approvedwithdrawalrequests');        

}
public function  holdings(){
    return view('admin.holdings');        

}
    //
}
