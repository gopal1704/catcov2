<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\User;
class transactionsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = User::find(auth()->user()->id);
//return $user;
        $transactions = $user->transactions()->paginate(5);
      //  return $transactions;
        //->paginate(2);

return view('transactions',compact('transactions'));
    }

}
