<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use App\operations;
use HomeController;
use Session;
use Illuminate\Support\Facades\Storage;


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


public function uploadidproof(Request $request){
  



if($request->hasFile('idproof')){

    //check for size
    if($request->idproof->getSize() > 6291456){
        Session::flash('error', ' max file size 5MB kindly upload file size less than 5MB'); 
        return redirect('/viewprofile');
    
    }
//check extension
if( $request->idproof->extension() == 'jpeg' || $request->idproof->extension() == 'jpg'){
    $fileName= auth()->user()->id.'idProof'.'.jpeg';
    $url=$request->idproof->store('/');
    $profile =  profile::where('userId',auth()->user()->id)->first();
    $profile->idProof=$url;
    $profile->save();
    
    Session::flash('message', 'Id proof uploaded successfully!'); 
    return redirect('/viewprofile');
}
else if( $request->idproof->extension() == 'pdf'){
    $fileName= auth()->user()->id.'idProof'.'.pdf';
    $url=$request->idproof->store('/');
    $profile =  profile::where('userId',auth()->user()->id)->first();
    $profile->idProof=$url;
    $profile->save();
    
    Session::flash('message', 'Id proof uploaded successfully!'); 
    return redirect('/viewprofile');
}
else{
    Session::flash('error', 'Error - please upload only jpeg,jpg or pdf files max size 5MB'); 
    return redirect('/viewprofile');
  
}
 

}
    else{

        Session::flash('error', 'Error - No file selected'); 
        return redirect('/viewprofile');
    }

   
}

public function uploadadproof(Request $request){
   

    if(!$request->hasFile('adproof')){
        Session::flash('error', 'Error - No file selected'); 
        return redirect('/viewprofile');
    }

    
    //check for size
    if($request->adproof->getSize() > 6291456){
        Session::flash('error', ' max file size 5MB kindly upload file size less than 5MB'); 
        return redirect('/viewprofile');
    
    }
//check extension
if( $request->adproof->extension() == 'jpeg' || $request->idproof->extension() == 'jpg'){
    $url=$request->adproof->store('/');
    $profile =  profile::where('userId',auth()->user()->id)->first();
    $profile->proofUrl=$url;
    $profile->save();
    
    Session::flash('message', 'Address proof uploaded successfully!'); 
    return redirect('/viewprofile');
}
else if( $request->adproof->extension() == 'pdf'){
    $fileName= auth()->user()->id.'idProof'.'.pdf';
    $url=$request->adproof->store('/');
    $profile =  profile::where('userId',auth()->user()->id)->first();
    $profile->proofUrl=$url;
    $profile->save();
    
    Session::flash('message', 'Address proof uploaded successfully!'); 
    return redirect('/viewprofile');
}
else{
    Session::flash('error', 'Error - please upload only jpeg,jpg or pdf files max size 5MB'); 
    return redirect('/viewprofile');
  
}
}


    //
}
