<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\scheme;
use DB;
use App\coinbasepayment;
use Illuminate\Support\Facades\Redirect;
use Session;

class placeorderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    { 
$schemes = scheme::all();

return  view('placeorder', compact('schemes'));
    }

  public function  selectPayment(Request $request){

    if($request->input('paymentMethod')=='wallet'){
        $amount = $request->input('amount');
        $schemeId = $request->input('schemeId');

return view('walletpayment' ,compact('amount','schemeId'));
    
}

    if($request->input('paymentMethod')=='paypal'){
        
    }
    if($request->input('paymentMethod')=='btc'){
        $amount = $request->input('amount');
        $schemeId = $request->input('schemeId');
        if($amount<100){
            Session::flash('error', 'Minimum amount is 100 USD kindly enter amount above 500 USD'); 
            return redirect('/placeorder');
    }
        
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.commerce.coinbase.com/charges/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $post = array(
        "name" => "Catcotrade",
        "description" => "payment",
        "local_price" => array(
            'amount' => $amount,
            'currency' => 'USD'
        ),
        "pricing_type" => "fixed_price",
        "redirect_url"=> "https://catcotrade.info/home",
        "cancel_url"=> "https://catcotrade.info/home",

        
        "metadata" => array(
            'customer_id' => auth()->user()->id,
            'name' => auth()->user()->email
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
    
    // echo "<pre>";
    // print_r($response->data);


   $code= $response->data->code;
   $id =$response->data->id;
   $hosted_url= $response->data->hosted_url;


   if($code!=null && $id!=null){
    $coinbasepayment= new coinbasepayment;
    $coinbasepayment->userId = auth()->user()->id;
    $coinbasepayment->code= $code;
    $coinbasepayment->coinbaseId=$id;
    $coinbasepayment->status=0;

    DB::transaction(function () use ($coinbasepayment) {
        $coinbasepayment->save();
       

    });

return Redirect::to($hosted_url);
   }






        
    }

    

  }

  public function  cb(Request $request){
      return 'ok';
  }
}
