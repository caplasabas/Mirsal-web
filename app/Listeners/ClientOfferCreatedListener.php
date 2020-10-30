<?php

namespace App\Listeners;

use App\Events\ClientOfferCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ClientOfferCreatedListener
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
        $clientRequest = $event->clientOffer->clientRequest;
        $filter = array(
            array("field"=>"tag","key"=>"userId","value"=>"userId_".$clientRequest->client->id,"relation"=>"=")
        );
        OneSignalHelper::notification(0,$event->clientOffer->client_id,$clientRequest->client->id,"CLIENT_OFFER_CREATED","offer",$filter);
        
    }
}
