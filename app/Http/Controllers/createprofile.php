<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\operations;
use HomeController;
use Session;

class createprofile extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $timezones = operations::timezones;
    
        return view('createprofile')->with('timezones',$timezones);
    }
    public function save(Request $request){

        
        $profile = new profile;
        $profile->userId = auth()->user()->id;
        $profile->profileUpdated= true;
        $profile->firstName= $request->input('firstName');
        $profile->lastName= $request->input('lastName');
        $profile->title =$request->input('title');
        $profile->gender = $request->input('gender');
        $profile->address = $request->input('address');
        $profile->city= $request->input('city');
        $profile->state=$request->input('state');
        $profile->country=$request->input('country');
        $profile->isdcode =$request->input('isdcode');
        $profile->mobile=$request->input('mobile');
        $profile->pincode = $request->input('pincode');
        $profile->dateOfBirth = $request->input('dateOfBirth');
        $profile->timeZone = $request->input('timeZone');
        $profile->walletId = str_random(28);
        $profile->save();
       $message = "Profile Updated!";
      return redirect()->route('home', [$message]);

    }

    public function viewProfile(){

        $profile =  profile::where('userId',auth()->user()->id)->first();
    
    return view('profile.viewprofile',compact('profile'));
    }
    public function goToEditProfile(){

        $timezones = operations::timezones;
        $profile =  profile::where('userId',auth()->user()->id)->first();

    
        return view('profile.editprofile',compact('timezones','profile'));
    }
public function processEdit(Request $request){

    $profile =  profile::where('userId',auth()->user()->id)->first();
    $profile->firstName= $request->input('firstName');
    $profile->lastName= $request->input('lastName');
    $profile->title =$request->input('title');
    $profile->gender = $request->input('gender');
    $profile->address = $request->input('address');
    $profile->city= $request->input('city');
    $profile->state=$request->input('state');
    $profile->country=$request->input('country');
    $profile->isdcode =$request->input('isdcode');
    $profile->mobile=$request->input('mobile');
    $profile->pincode = $request->input('pincode');
    $profile->dateOfBirth = $request->input('dateOfBirth');
    $profile->timeZone = $request->input('timeZone');
    $profile->save();

    Session::flash('message', 'Profile updated!'); 
    return redirect('/home');
}


    //
}
