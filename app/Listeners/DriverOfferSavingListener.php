<?php

namespace App\Listeners;

use App\Events\DriverOfferSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class DriverOfferSavingListener
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
     * @param  DriverOfferSaving  $event
     * @return void
     */
    public function handle(DriverOfferSaving $event)
    {
        //
    }
}
