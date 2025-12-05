<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\BroadcastEvent;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class NewOrder implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $order;

    public function __construct(Order $order)
    {
        $this->order = $order->toArray();
        Log::info('NewOrder event has been triggered!');
    }

    public function broadcastOn()
    {
        return new Channel('orders');
        Log::info('NewOrder event has been to the channel!');
    }

    public function broadcastAs()
    {
        return 'NewOrder';
        Log::info('NewOrder event has been broadcasted!');
    }
}
