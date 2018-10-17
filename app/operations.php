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

public static function calculateMaturity($holdingDate,$duration){

    $maturityDate= new Carbon($holdingDate);
    $maturityDate->addDays($duration);
    return $maturityDate->format('d-m-Y');


}







}


