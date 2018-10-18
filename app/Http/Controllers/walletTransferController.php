<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Illuminate\Support\Facades\Auth;
use AWS;
use App\calculatebalance;
use App\operations;

class walletTransferController extends Controller
{
    //

    public function sendOtp(Request $request){
        $amount = $request->input('amount') ;
        $account = profile::where('userId', $request->input('accountNumber'))->first();
       
        if($amount<=calculatebalance::getWalletBalance() && $account){

            $otp=rand(650000,100000);

           operations::sendSMS('+919176454024','Otp for wallet transfer '.$otp);

return env('DB_CONNECTION');

        }
        else{
return 0;
        }


    }
}
