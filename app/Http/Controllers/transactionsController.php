<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\transaction;
use App\User;
use DB;
use Carbon\Carbon;
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
        $transactions = $user->transactions()->orderBy('TIMESTAMP', 'desc')->paginate(8);
      //  return $transactions;
        //->paginate(2);

return view('transactions',compact('transactions'));
    }


    public function dateRange(Request $request){
    


       if($request->input('from')&&$request->input('to')){

        $request->session()->put('from', $request->input('from'));
        $request->session()->put('to', $request->input('to'));
 
        $from=  Carbon::createFromFormat('Y-m-d',$request->input('from'))->subDay();
        $to=    Carbon::createFromFormat('Y-m-d',$request->input('to'))->addDay();


        $transactions = DB::table('transactions')->whereBetween('TIMESTAMP', [$from, $to])->paginate(10);

                    return view('transactions',compact('transactions'));
       }
       else{
        $from=  Carbon::createFromFormat('Y-m-d',$request->session()->get('from'))->subDay();
        $to=    Carbon::createFromFormat('Y-m-d',$request->session()->get('to'))->addDay();

        $transactions = DB::table('transactions')->whereBetween('TIMESTAMP', [$from, $to])->paginate(10);

                    return view('transactions',compact('transactions'));
       }
        

    }



    }


