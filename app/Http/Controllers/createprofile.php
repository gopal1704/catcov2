<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use HomeController;

class createprofile extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        
        return view('createprofile');
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

        $profile->save();
       $message = "ssss";
      return redirect()->route('home', [$message]);

    }
    //
}
