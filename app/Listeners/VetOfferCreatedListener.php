<?php

namespace App\Listeners;

use App\Events\VetOfferCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\OneSignalHelper;

class VetOfferCreatedListener
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
     * @param  VetOfferCreated  $event
     * @return void
     */
    public function handle(VetOfferCreated $event)
    {
        $vetRequest = $event->vetOffer->vetRequest;
        $filter3 = array(
            array("field"=>"tag","key"=>"userId","value"=>"userId_".$vetRequest->client->id,"relation"=>"=")
        );
        OneSignalHelper::notification(0,$event->vetOffer->vet_id,$vetRequest->client->id,"VET_OFFER_CREATED","offer",$filter);
        
    }
}
