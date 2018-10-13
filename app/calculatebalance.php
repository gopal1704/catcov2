<?php
namespace App;
use Illuminate\Support\Facades\Auth;

use App\transaction;

class calculatebalance {
    const Credit = 'Cr.';
    const Debit = 'Dr.';
    const MainWallet = 'mw';
    const PendingWallet = 'pw';
    const WithdrawalPendingWallet = 'wpw';



  public static function getWalletBalance(){

   $userId= auth()->user()->id;
   $walletBalance= transaction::where('userId', $userId)->where('account',self::MainWallet)->where('type', self::Credit)->sum('amount') - transaction::where('userId', $userId)->where('type', self::Debit)->sum('amount');
   return  round($walletBalance, 2);

    }

    public static function getAllbalances(){
        $balances = [
            'mainWallet' => 0,
            'pendingWallet' => 0,
            'withdrawalPendingBalance'=> 0,
            ''
        ];
    }

    
}