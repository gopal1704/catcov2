<?php

namespace App\Console;
use Illuminate\Support\Facades\DB;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\holding;

use App\profile;
use Illuminate\Support\Facades\Auth;
use AWS;
use App\calculatebalance;
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
use App\AstroPayStreamline;
use App\operations;
use Carbon\Carbon;
use App\return_credit;
use App\User;
use Mail;
use App\transaction;
class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        

        $schedule->call(function () {
          
          
      //      public function testreturns(){

                $activeHoldings= holding::where('status',1)->orderBy('timestamp', 'asc')->with('schemes')->with('return_credit')->get();
                foreach ($activeHoldings as $key => $holding){
                    
                    $currentTime = Carbon::now();
                    $referralReturnDuration = $holding->schemes->referralReturnDuration;
                    $duration =   $holding->schemes->duration;
                    $totalCycles = $holding->schemes->referralReturnFrequency;
                  
                   
                  
                
                
                   for($cycle=1;$cycle<=$totalCycles;$cycle++){
                    $holdingDate = Carbon::createFromFormat('Y-m-d H:i:s',$holding->TIMESTAMP);
                    $holdingDate->addDays($referralReturnDuration*$cycle);
                   
                    if($currentTime->greaterThan($holdingDate)){
                        echo "true";
                
                        $isCycleCredited = DB::table('return_credits')->where('holdingId', $holding->id)->where('returnCycle', $cycle)->first();
                      if(!$isCycleCredited) {
                         //credit the returns 
                         $returnAmount =  ($holding->schemes->referralReturnRate/100 )* $holding->amount;
                         $returnUser = DB::table('users')->where('id', $holding->userId)->first()->referralid;
                         $from =DB::table('profiles')->where('userId', $holding->userId)->first();
                         $fromName = $from->firstName . ' ' . $from->lastName;
                         echo $fromName;
                
                         //transaction
                         $transaction= new transaction;
                         $transaction->userId = $returnUser;
                         $transaction->TYPE= 'Cr.';
                         $transaction->amount = $returnAmount;
                         $transaction->shadowAccount = 'prc';
                         $transaction->ACCOUNT = 'pw';
                         $transaction->narration= $cycle."rd ". "Referral comission from : " .$fromName. " ". $holding->userId  ;
                         //
                        $sms = 'Catcotrade Credit USD:'.$returnAmount. " Month : ". $cycle." ". "Referral comission from : " .$fromName. " ". $holding->userId  ;
                         //save return credit true 
                         $return_credit = new return_credit;
                         $return_credit->userId= $holding->userId;
                         $return_credit->holdingId= $holding->id;
                         $return_credit->returnCycle=$cycle;
                
                           
                         //
                        
                         DB::transaction(function () use ($transaction,$return_credit) {
                            $transaction->save();
                            $return_credit->transactionId= $transaction->id;
                $return_credit->save();
                           
                
                        });
                
                        //send sms
                        $smsUser = DB::table('users')->where('id', $holding->userId)->first()->referralid;
                        $smsUserProfile =DB::table('profiles')->where('userId', $smsUser)->first();
                        $mobile= $smsUserProfile->isdcode.$smsUserProfile->mobile;
                        operations::sendSMS($mobile,$sms);
                        
                
                         exit();
                
                      } 
                        
                   }
                   
                
                   }
                
                //maturity logic 
                $holdingDate = Carbon::createFromFormat('Y-m-d H:i:s',$holding->TIMESTAMP);
                $holdingDate->addDays($holding->schemes->duration);
                if($currentTime->greaterThan($holdingDate)){
                
                    echo "maturity";
                    $maturityAmount = ($holding->amount*($holding->schemes->maturityRate)/100)+$holding->amount;
                    $transaction= new transaction;
                    $transaction->userId = $holding->userId;
                    $transaction->TYPE= 'Cr.';
                    $transaction->amount = $maturityAmount;
                    $transaction->ACCOUNT = 'mw';
                    $transaction->narration= 'Credit investment return' ;
                    $sms = 'Catcotrade Credit investment return : USD '. $maturityAmount ;  
                    DB::transaction(function () use ($transaction) {
                        $transaction->save();
                        
                       
                
                    });
                    holding::where('id',$holding->id)->update(['STATUS' => 0]);
                    $smsUserProfile =DB::table('profiles')->where('userId', $holding->userId)->first();
                    $mobile= $smsUserProfile->isdcode.$smsUserProfile->mobile;
                    operations::sendSMS($mobile,$sms);
                
                }
                }
                
                //}
                //return $activeHoldings;
                


           






            

        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
