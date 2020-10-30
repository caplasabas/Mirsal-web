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
        $driverRequest = $event->driverOffer->driverRequest;
        
        if($event->driverOffer->status == "ACCEPTED"){
            $filter = array(array("field"=>"tag","key"=>"userId","value"=>"userId_".$driverRequest->client->id,"relation"=>"="));
            OneSignalHelper::notification(0,$event->driverOffer->driver_id,$driverRequest->client->id,"VET_OFFER_ACCEPTED","offer",$filter);
        }

    }
}
