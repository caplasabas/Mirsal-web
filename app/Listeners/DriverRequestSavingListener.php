<?php

namespace App\Listeners;

use App\Events\DriverRequestSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\OneSignalHelper;

class DriverRequestSavingListener
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
     * @param  DriverRequestSaving  $event
     * @return void
     */
    public function handle(DriverRequestSaving $event)
    {
        $driverRequest = $event->driverRequest;
        
        if($driverRequest->status == "CANCELLED"){
            $filter = array(array("field"=>"tag","key"=>"userId","value"=>"userId_".$driverRequest->acceptedDriverOffer->driver_id,"relation"=>"="));
            OneSignalHelper::notification(0,$driverRequest->client->id,$driverRequest->acceptedDriverOffer->driver_id,"DRIVER_REQUEST_CANCELLED","request",$filter);
        }
    }
}
