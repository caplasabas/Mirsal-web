<?php

namespace App\Listeners;

use App\Events\ClientOfferCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\OneSignalHelper;

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
        $product = $event->clientOffer->product;
        $filter = array(
            array("field"=>"tag","key"=>"userId","value"=>"userId_".$product->seller_id,"relation"=>"=")
        );
        OneSignalHelper::notification(0,$event->clientOffer->buyer_id,$product->seller_id,"CLIENT_OFFER_CREATED","offer",$filter);
        
    }
}
