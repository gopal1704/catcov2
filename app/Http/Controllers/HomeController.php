<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Illuminate\Support\Facades\Auth;
use AWS;
use App\calculatebalance;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use App\AstroPayStreamline;
use App\holding;
use App\operations;
use Carbon\Carbon;
use App\return_credit;
use App\User;
use Mail;
use DB;
use App\transaction;
use Hash;
use Session;
use App\Mail\test;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public  function getHoldings(){
        $user = User::find(auth()->user()->id);
        $holdings = $user->holdings()->with('schemes')->orderBy('timestamp', 'desc')->take(5)->get();
        return $holdings;
     }
    public function index()
    {   
        $profile =  profile::where('userId',auth()->user()->id)->first();
        $balance = calculatebalance::getAllbalances();
        $loc = geoip()->getLocation( \Request::ip());

       $city= $loc->city;
       $state= $loc->state_name;
       $ip=\Request::ip();
       $country=$loc->country;
       $location= $city.' '. $state.' '.$country;
       $holdings=$this->getHoldings();
        // $message = "";
       // $profile =  profile::where('userId',calculatebalance::getWalletBalance())->first();

        if(!$profile){
            $timezones = operations::timezones;
    
            return view('createprofile')->with('timezones',$timezones);

        }

      
        return view('home',compact('profile','balance','ip','holdings','location'));
    }
  


    public function message($message)
    {   
        $profile =  profile::where('userId',auth()->user()->id)->first();
        $balance = calculatebalance::getAllbalances();
       
        $loc = geoip()->getLocation( \Request::ip());

        $city= $loc->city;
        $state= $loc->state_name;
        $ip=\Request::ip();
        $country=$loc->country;
        $location= $city.' '. $state.' '.$country;
        $holdings=$this->getHoldings();
        if(!$profile){
            $timezones = operations::timezones;
    
            return view('createprofile')->with('timezones',$timezones);

        }
        return view('home',compact('profile','message','balance','ip','holdings','location'));
    }

    public function logout(){

Auth::logout();
// $sms = AWS::createClient('sns');
    
// $sms->publish([
//         'Message' => 'Hello, catco',
//         'PhoneNumber' => '+919176454024',    
//         'MessageAttributes' => [
//             'AWS.SNS.SMS.SMSType'  => [
//                 'DataType'    => 'String',
//                 'StringValue' => 'Transactional',
//              ]
//          ],
//       ]);
return redirect('/');

    }


  public function  mailtest(Request $request){
    $data = array('name'=>"Virat Gandhi");

    Mail::to('vgopalooty@gmail.com')->send(new test());
}

  public function  test1(){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.commerce.coinbase.com/charges/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $post = array(
        "name" => "Catcotrade",
        "description" => "payment",
        "local_price" => array(
            'amount' => 0.4,
            'currency' => 'USD'
        ),
        "pricing_type" => "fixed_price",
        "metadata" => array(
            'customer_id' => 'customerID',
            'name' => 'ANY NAME'
        )
    );
    
    $post = json_encode($post);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_POST, 1);
    $coinbaseKey= env('COINBASE_KEY');
    $headers = array();
    $headers[] = "Content-Type: application/json";
    $headers[] = "X-Cc-Api-Key: ".$coinbaseKey;
    $headers[] = "X-Cc-Version: 2018-03-22";
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
    $result = curl_exec($ch);
    curl_close ($ch);
    $response = json_decode($result);
    echo "<pre>";
    print_r($response->data);
    }

    public function  resolve(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.commerce.coinbase.com/charges/");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    }

    
public function testreturns(){

// $activeHoldings= holding::where('status',1)->orderBy('timestamp', 'asc')->with('schemes')->with('return_credit')->get();
// foreach ($activeHoldings as $key => $holding){
    
//     $currentTime = Carbon::now();
//     $referralReturnDuration = $holding->schemes->referralReturnDuration;
//     $duration =   $holding->schemes->duration;
//     $totalCycles = $holding->schemes->referralReturnFrequency;
  
   
  


//    for($cycle=1;$cycle<=$totalCycles;$cycle++){
//     $holdingDate = Carbon::createFromFormat('Y-m-d H:i:s',$holding->TIMESTAMP);
//     $holdingDate->addDays($referralReturnDuration*$cycle);
   
//     if($currentTime->greaterThan($holdingDate)){
//         echo "true";

//         $isCycleCredited = DB::table('return_credits')->where('holdingId', $holding->id)->where('returnCycle', $cycle)->first();
//       if(!$isCycleCredited) {
//          //credit the returns 
//          $returnAmount =  ($holding->schemes->referralReturnRate/100 )* $holding->amount;
//          $returnUser = DB::table('users')->where('id', $holding->userId)->first()->referralid;
//          $from =DB::table('profiles')->where('userId', $holding->userId)->first();
//          $fromName = $from->firstName . ' ' . $from->lastName;
//          echo $fromName;

//          //transaction
//          $transaction= new transaction;
//          $transaction->userId = $returnUser;
//          $transaction->TYPE= 'Cr.';
//          $transaction->amount = $returnAmount;
//          $transaction->shadowAccount = 'prc';
//          $transaction->ACCOUNT = 'pw';
//          $transaction->narration= $cycle."rd ". "Referral comission from : " .$fromName. " ". $holding->userId  ;
//          //
//         $sms = 'Catcotrade Credit USD:'.$returnAmount. " Month : ". $cycle." ". "Referral comission from : " .$fromName. " ". $holding->userId  ;
//          //save return credit true 
//          $return_credit = new return_credit;
//          $return_credit->userId= $holding->userId;
//          $return_credit->holdingId= $holding->id;
//          $return_credit->returnCycle=$cycle;

           
//          //
        
//          DB::transaction(function () use ($transaction,$return_credit) {
//             $transaction->save();
//             $return_credit->transactionId= $transaction->id;
// $return_credit->save();
           

//         });

//         //send sms
//         $smsUser = DB::table('users')->where('id', $holding->userId)->first()->referralid;
//         $smsUserProfile =DB::table('profiles')->where('userId', $smsUser)->first();
//         $mobile= $smsUserProfile->isdcode.$smsUserProfile->mobile;
//         operations::sendSMS($mobile,$sms);
        

//          exit();

//       } 
        
//    }
   

//    }

// //maturity logic 
// $holdingDate = Carbon::createFromFormat('Y-m-d H:i:s',$holding->TIMESTAMP);
// $holdingDate->addDays($holding->schemes->duration);
// if($currentTime->greaterThan($holdingDate)){

//     echo "maturity";
//     $maturityAmount = ($holding->amount*($holding->schemes->maturityRate)/100)+$holding->amount;
//     $transaction= new transaction;
//     $transaction->userId = $holding->userId;
//     $transaction->TYPE= 'Cr.';
//     $transaction->amount = $maturityAmount;
//     $transaction->ACCOUNT = 'mw';
//     $transaction->narration= 'Credit investment return' ;
//     $sms = 'Catcotrade Credit investment return : USD '. $maturityAmount ;  
//     DB::transaction(function () use ($transaction) {
//         $transaction->save();
        
       

//     });
//     holding::where('id',$holding->id)->update(['STATUS' => 0]);
//     $smsUserProfile =DB::table('profiles')->where('userId', $holding->userId)->first();
//     $mobile= $smsUserProfile->isdcode.$smsUserProfile->mobile;
//     operations::sendSMS($mobile,$sms);

// }
// }

//test return ends
}
//return $activeHoldings;

public function checkCreditStatus($cycle,$holdingId){

}


public function changePassword(Request $request){
    if (!(Hash::check($request->get('password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
    }
    if(strcmp($request->get('password'), $request->get('newpassword')) == 0){
        //Current password and new password are same
        return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
    }
    $validatedData = $request->validate([
        'password' => 'required',
        'newpassword' => 'required|string|min:6',
    ]);
    //Change Password
    $user = Auth::user();
    $user->password = bcrypt($request->get('newpassword'));
    $user->save();
    Session::flash('message', 'Password changed successfully!'); 
    return redirect('/home');
}




    }
 
