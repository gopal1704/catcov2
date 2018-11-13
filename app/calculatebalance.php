<?php
namespace App;
use Illuminate\Support\Facades\Auth;

use App\transaction;
use App\holding;
class calculatebalance {
    const Credit = 'Cr.';
    const Debit = 'Dr.';
    const MainWallet = 'mw';
    const PendingWallet = 'pw';
    const WithdrawalPendingWallet = 'wpw';
    const ReferralSpotComission = 'src';
    const ReferralReturns = 'prc';
    const Investment = 'inv';



  public static function getWalletBalance(){

   $userId= auth()->user()->id;
   $walletBalance= transaction::where('userId', $userId)->where('account',self::MainWallet)->where('type', self::Credit)->sum('amount') - transaction::where('userId', $userId)->where('account',self::MainWallet)->where('type', self::Debit)->sum('amount');
   return  round($walletBalance, 2);

    }
    public static function getPendingWalletBalance(){

        $userId= auth()->user()->id;
        $walletBalance= transaction::where('userId', $userId)->where('account',self::PendingWallet)->where('type', self::Credit)->sum('amount') - transaction::where('userId', $userId)->where('account',self::PendingWallet)->where('type', self::Debit)->sum('amount');
        return  round($walletBalance, 2);
     
         }
         public static function getWithdrawalPendingWalletBalance(){

            $userId= auth()->user()->id;
            $walletBalance= transaction::where('userId', $userId)->where('account',self::WithdrawalPendingWallet)->where('type', self::Credit)->sum('amount') - transaction::where('userId', $userId)->where('account',self::WithdrawalPendingWallet)->where('type', self::Debit)->sum('amount');
            return  round($walletBalance, 2);
         
             }
             public static function rsc(){
                $userId= auth()->user()->id;
                $walletBalance= transaction::where('userId', $userId)->where('shadowAccount',self::ReferralSpotComission)->sum('amount') ;
                return  round($walletBalance, 2);
                         
             }
             public static function rrt(){
                $userId= auth()->user()->id;
                $walletBalance= transaction::where('userId', $userId)->where('shadowAccount',self::ReferralReturns)->sum('amount') ;
                return  round($walletBalance, 2);
                         
             }
             public static function inv(){
                $userId= auth()->user()->id;
                $walletBalance= holding::where('userId', $userId)->where('status',1)->sum('amount') ;
                return  round($walletBalance, 2);
                         
             }

             
    public static function getAllbalances(){
      return  $balances = [
            'mainWallet' => self::getWalletBalance(),
            'pendingWallet' => self::getPendingWalletBalance(),
            'withdrawalPendingBalance'=> self::getWithdrawalPendingWalletBalance(),
            'SpotCommission'=> self::rsc(),
            'ReferralReturns'=>self::rrt(),
            'Investment'=>self::inv()
            
        ];
    }

    
}