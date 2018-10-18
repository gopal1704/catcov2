<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Illuminate\Support\Facades\Auth;
use AWS;
use App\calculatebalance;
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
       // $message = "";
       // $profile =  profile::where('userId',calculatebalance::getWalletBalance())->first();

        if(!$profile){
            return view('createprofile');
        }
        return view('home',compact('profile'));
    }
    public function message($message)
    {   
        $profile =  profile::where('userId',auth()->user()->id)->first();
       // $message = "";
       // $profile =  profile::where('userId',calculatebalance::getWalletBalance())->first();

        if(!$profile){
            return view('createprofile');
        }
        return view('home',compact('profile','message'));
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


  public function  test1(){

    return calculatebalance::getAllbalances();
    }
}
 