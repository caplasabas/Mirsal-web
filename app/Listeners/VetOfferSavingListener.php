<?php

namespace App\Listeners;

use App\Events\VetOfferSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Helpers\OneSignalHelper;

class VetOfferSavingListener
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
     * @param  VetOfferSaving  $event
     * @return void
     */
    public function handle(VetOfferSaving $event)
    {
        // 
    }
}
