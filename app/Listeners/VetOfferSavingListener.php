<?php

namespace App\Listeners;

use App\Events\VetOfferSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

use App\Helpers\OneSignalHelper;
use App\Model\VetOffer;

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
        $vetRequest = $event->vetOffer->vetRequest;
        $vet_offer_ref = VetOffer::find($event->vetOffer->id);
        if($event->vetOffer->status == "ACCEPTED" && $vet_offer_ref->status == "PENDING"){
            $filter = array(array("field"=>"tag","key"=>"userId","value"=>"userId_".$vetRequest->client->id,"relation"=>"="));
            OneSignalHelper::notification(0,$event->vetOffer->vet_id,$vetRequest->client->id,"VET_OFFER_ACCEPTED","offer",$filter);
        }
            
    }
}
