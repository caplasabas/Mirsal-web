<?php

namespace App\Listeners;

use App\Events\MessageCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\OneSignalHelper;

class MessageCreatedListener
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
     * @param  MessageCreated  $event
     * @return void
     */
    public function handle(MessageCreated $event)
    {
        $logNotification = $event->logNotification;
        $filter = array(
            array("field"=>"tag","key"=>"userId","value"=>"userId_".$logNotification->user_id_to_notify,"relation"=>"=")
        );
        OneSignalHelper::notification(0,$logNotification->user_id,$logNotification->user_id_to_notify,"MESSAGE","message",$filter);
        
    }
}
