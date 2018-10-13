<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\profile;
use Illuminate\Support\Facades\Auth;

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
        if($profile->profileUpdated==false){
            return view('createprofile');
        }
        return view('home')->with('profile',$profile);
    }

    public function logout(){

Auth::logout();
return redirect('/');

    }
}
