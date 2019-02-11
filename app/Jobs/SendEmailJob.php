<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\test;
use App\Mail\walletTransferCredit;
use App\Mail\walletTransferDebit;
use Mail;

/**
 *      email types   
 *      WTC - Wallet transfer credit
 *      WTD - Wallet transfer debit
 *      INVWP - Investment wallet
 *      INVBTC - Investment  bitcoin
 *      INVGP -Investment globepay
 *      IR - Investment return
 *      MRC - Monthly referral comission.
 *      SRC - Spot referral commission
 *      WD - Withdrawal request.
 *      WDAP - Withdrawal approved
 *      
 * 
 * 
 * 
 * 
 * 
 * 
 *  **/
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $type;
    protected $data;
    protected $email;
    public function __construct($type,$data,$email)
    {
        
    $this->type=$type;
    $this->data=$data;
    $this->email=$email;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        switch($this->type){
            case 'WTC':
            Mail::to($this->email)->send(new walletTransferCredit($this->data));

            break;
            case 'WTD':
            Mail::to($this->email)->send(new walletTransferDebit($this->data));

            break;
            case 'INVWP':
            break;
            default:
            echo '';
        }
        
     //   Mail::to('vgopalooty@gmail.com')->send(new walletTransferCredit());



    }
}
