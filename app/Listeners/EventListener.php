<?php

namespace App\Listeners;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class EventListener implements ShouldBroadcast
{
    use SerializesModels , InteractsWithSockets;

    public $msg;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct($msg)
    {
        $this->$msg = $msg;
    }


    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|\Illuminate\Broadcasting\Channel[]
     */
    public function broadcastOn()
    {
        return new PrivateChannel('testchannel');
    }
}
