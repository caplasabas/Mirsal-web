<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

use App\Model\DriverOffer;

class DriverOfferCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $driverOffer;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(DriverOffer $driverOffer)
    {
        $this->driverOffer = $driverOffer;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
