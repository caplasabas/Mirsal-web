<?php

namespace App\Listeners;

use App\Events\OnRegister;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendOTPVerificationSMS
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OnRegister  $event
     * @return void
     */
    public function handle(OnRegister $event)
    {
        //
    }
}
