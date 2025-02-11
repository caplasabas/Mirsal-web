<?php

namespace App\Listeners;

use App\Events\DriverOfferCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\OneSignalHelper;

class DriverOfferCreatedListener
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
     * @param  DriverOfferCreated  $event
     * @return void
     */
    public function handle(DriverOfferCreated $event)
    {
        $driverRequest = $event->driverOffer->driverRequest;

        $filter = array(
            array("field"=>"tag","key"=>"userId","value"=>"userId_".$driverRequest->client->id,"relation"=>"=")
        );
        OneSignalHelper::notification(0,$event->driverOffer->driver_id,$driverRequest->client->id,"DRIVER_OFFER_CREATED","offer",$filter);
        $price = str_replace(',', "", $event->driverOffer->price);
        $event->driverOffer->first_payment_price  = $price  * ($event->driverOffer->first_payment_perc/100);

        $event->driverOffer->save();
        
    }
}
