<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\holding;
use DB;
use App\User;
use App\operations;
use App\calculatebalance;
use Session;
use App\profile;

class createInvestment extends Controller
{
    //
    
    const Credit = 'Cr.';
    const Debit = 'Dr.';
    const MainWallet = 'mw';
    const PendingWallet = 'pw';
    const WithdrawalPendingWallet = 'wpw';
    const Investment ="inv";


    public function __construct()
    {
        $this->middleware('auth');
    }
    

    public function fromWallet(Request $request, $type){

        $amount = floatval ($request->input('amount') );
        $schemeId =$request->input('schemeId') ;
        $walletBalance = calculatebalance::getWalletBalance();

        if($amount<500){
                Session::flash('error', 'Minimum amount is 500 USD kindly enter amount above 500 USD'); 
                return redirect('/placeorder');
        }
        
        if($walletBalance>=$amount){//if sufficient wallet balance

        //
        $transaction= new transaction;
        $transaction->userId = auth()->user()->id;
        $transaction->TYPE= self::Debit;
        $transaction->amount = $amount;
        $transaction->shadowAccount = self::Investment;
        $transaction->ACCOUNT = self::MainWallet;
        $transaction->narration= "Debit for Investment";



//

//referral transaction

        $transaction_r= new transaction;
        $transaction_r->userId = auth()->user()->referralid;
        $transaction_r->TYPE= self::Credit;
        $transaction_r->amount = $amount*(5/100);
        $transaction_r->shadowAccount = 'src';
        $transaction_r->ACCOUNT = self::PendingWallet;
        $transaction_r->narration= "Credit Referral Spot Commission From - ". auth()->user()->id . ' '.operations::getName(auth()->user()->id) ;


// SECOND LEVEL

$secondLevelUser = User::where('id', auth()->user()->referralid)->first()->referralid;


$transaction_l2= new transaction;
        $transaction_l2->userId = $secondLevelUser;
        $transaction_l2->TYPE= self::Credit;
        $transaction_l2->amount = $amount*(3/100);
        $transaction_l2->shadowAccount = 'src';
        $transaction_l2->ACCOUNT = self::PendingWallet;
        $transaction_l2->narration= "Credit Referral Spot Commission 3% - Level - 2  From - ". auth()->user()->id . ' '.operations::getName(auth()->user()->id) ;



// THIRD LEVEL 
$thirdLevelUser = User::where('id', $secondLevelUser)->first()->referralid;


$transaction_l3= new transaction;
        $transaction_l3->userId =$thirdLevelUser ;
        $transaction_l3->TYPE= self::Credit;
        $transaction_l3->amount = $amount*(2/100);
        $transaction_l3->shadowAccount = 'src';
        $transaction_l3->ACCOUNT = self::PendingWallet;
        $transaction_l3->narration= "Credit Referral Spot Commission  2% - Level - 3 From -". auth()->user()->id . ' '.operations::getName(auth()->user()->id)  ;






//
        //holding
        $holding = new holding;
        $holding->userId = auth()->user()->id;
        $holding->schemeId = intval($schemeId);
        $holding->amount=$amount;
        $holding->paymentDetails="Wallet Payment";

      
        DB::transaction(function () use ($transaction, $holding,$transaction_r,$transaction_l3,$transaction_l2) {
            $transaction->save();
            $holding->transactionId= $transaction->id;
            $holding->save();
            $transaction_r->save();
            $transaction_l3->save();
            $transaction_l2->save();

        });


        //sms notice
        $investorProfile = profile::where('userId', auth()->user()->id)->first();
        $referralProfile = profile::where('userId', auth()->user()->referralid)->first();
        $investorName = $investorProfile->title.' '.$investorProfile->firstName.' '.$investorProfile->lastName;

        $mobileInvestor= $investorProfile->isdcode.$investorProfile->mobile;
        $mobileReferral=$referralProfile->isdcode.$referralProfile->mobile;

        operations::sendSMS($mobileInvestor,'Catcotrade - Investment of USD : '.$amount. ' successful!');//send sms to investor
       
       
        operations::sendSMS($mobileReferral,'Catcotrade - Rrferral spot commission USD :  '.$transaction_r->amount. ' from - '.$investorName. ' account - '.auth()->user()->id );//send sms to referral

        //
        Session::flash('message', 'Investment successful!'); 
        return redirect('/home');




         }
else{

        //insufficient funds
        Session::flash('error', 'Insufficient funds in wallet could not process request!'); 
        return redirect('/placeorder');


}



        //create transaction


        }
}
