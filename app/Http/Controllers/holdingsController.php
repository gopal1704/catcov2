<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class holdingsController extends Controller
{
    //


    public function index(){


    $user = User::find(auth()->user()->id);

    $holdings = $user->holdings()->with('schemes')->get();
    //return $holdings;
    return view('holdings',compact('holdings'));
}
}