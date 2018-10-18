<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Illuminate\Support\Facades\Auth;
use AWS;
use App\calculatebalance;

class walletTransferController extends Controller
{
    //

    public function sendOtp(Request $request){
        $amount = $request->input('amount') ;

        if($amount<=calculatebalance::getWalletBalance()){
return 1;

        }
        else{
return 0;
        }


    }
}
