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
    public function index()
    {   
        $profile =  profile::where('userId',auth()->user()->id)->first();
        $balance = calculatebalance::getAllbalances();
        $ip = geoip()->getLocation( \Request::ip());
        // $message = "";
       // $profile =  profile::where('userId',calculatebalance::getWalletBalance())->first();

        if(!$profile){
            return view('createprofile');
        }
        return view('home',compact('profile','balance','ip'));
    }
    public function message($message)
    {   
        $profile =  profile::where('userId',auth()->user()->id)->first();
        $balance = calculatebalance::getAllbalances();
       
       $ip = geoip()->getLocation( \Request::ip());
       // $message = "";
       // $profile =  profile::where('userId',calculatebalance::getWalletBalance())->first();

        if(!$profile){
            return view('createprofile');
        }
        return view('home',compact('profile','message','balance'));
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


  public function  iptest(Request $request){
return \Request::ip();
  }

  public function  test1(){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.commerce.coinbase.com/charges/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $post = array(
        "name" => "Catcotrade",
        "description" => "payment",
        "local_price" => array(
            'amount' => '0.4',
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

    public function card(){

      $asp=  new AstroPayStreamline();
      
    print_r(

        $asp->newinvoice('2',23, 'VI', 'BR','1','00003456789', 'gopal','vgopalooty@gmail.com'));

    }
    }
 
