<?php

namespace App\Listeners;

use App\Events\VeterinarianAccepted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Helpers\OneSignalHelper;

class VeterinarianAcceptedListener
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
     * @param  VeterinarianAccepted  $event
     * @return void
     */
    public function handle(VeterinarianAccepted $event)
    {
        $user = $event->user;
        
        if($user->vet_status == "ACCEPTED"){
            $filter = array(array("field"=>"tag","key"=>"userId","value"=>"userId_".$user->id,"relation"=>"="));
            OneSignalHelper::notification(0,1,$user->id,"VET_ACCEPTED","user",$filter);
        }
    }
}
