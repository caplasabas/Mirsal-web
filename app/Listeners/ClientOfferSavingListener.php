<?php

namespace App\Listeners;

use App\Events\ClientOfferCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClientOfferSavingListener
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
     * @param  ClientOfferCreated  $event
     * @return void
     */
    public function handle(ClientOfferCreated $event)
    {
        //
    }
}
