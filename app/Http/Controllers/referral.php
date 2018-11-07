<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
class referral extends Controller
{
    
    public function index(){


        $referrals =  profile::where('userId',auth()->user()->id)->get();
        //return $referrals;
        return view('referrals',compact('referrals'));
        

    }
}
