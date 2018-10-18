<?php
namespace App;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class operations{

    const Credit = 'Cr.';
    const Debit = 'Dr.';
    const MainWallet = 'mw';
    const PendingWallet = 'pw';
    const WithdrawalPendingWallet = 'wpw';

public static function createInvestmentFromWallet($amount){

}

public static function walletTransfer(){

}
public static function sendWithdrawalRequest(){

}
public static function displayTime($t){
$time =  Carbon::createFromFormat('Y-m-d H:i:s', $t);
return $time->toDateTimeString();  
}
public static function calculateMaturity($holdingDate,$duration){

    $maturityDate= Carbon::createFromFormat('Y-m-d H:i:s',$holdingDate);
  //  $maturityDate->tz('Asia/Kolkata');
    $maturityDate->addDays($duration);
    return $maturityDate->toDateTimeString();


}

public static function maturityStatus($holdingDate,$duration){

$maturityDate= Carbon::createFromFormat('Y-m-d H:i:s',$holdingDate);
$maturityDate->addDays($duration);


 return $maturityDate->lessThan(Carbon::now());

}


}