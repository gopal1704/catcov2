<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
class transactionsController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user()->id;
        $transactions = transaction::where('userId',$user)->paginate(2);

return view('transactions',compact('transactions'));
    }

}
