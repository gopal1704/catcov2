<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\User;
class referral extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index(){


        $referrals =  User::where('referralid',auth()->user()->id)->with('profiles')->get();
       //return $referrals;
        return view('referrals',compact('referrals'));
        

    }
}
