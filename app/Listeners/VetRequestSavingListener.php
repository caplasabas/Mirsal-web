<?php

namespace App\Listeners;

use App\Events\VetRequestSaving;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\OneSignalHelper;

class VetRequestSavingListener
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
     * @param  VetRequestSaving  $event
     * @return void
     */
    public function handle(VetRequestSaving $event)
    {
        $vetRequest = $event->vetRequest;
        
        if($vetRequest->status == "CANCELLED" ){
            $filter = array(array("field"=>"tag","key"=>"userId","value"=>"userId_".$vetRequest->acceptedVetOffer->vet_id,"relation"=>"="));
            OneSignalHelper::notification(0,$vetRequest->client->id,$vetRequest->acceptedVetOffer->vet_id,"DRIVER_REQUEST_CANCELLED","request",$filter);
        }
    }
}
