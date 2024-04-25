<?php

namespace App\Events;

use App\Models\Message;
use App\Models\Users\Customer;
use App\Models\Users\Seller;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageEvent implements ShouldBroadcastNow 
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $username;
    public $message;
    public $avatar;
    public $target;
    public $product_id;

    /**
     * Create a new event instance.
     */
    public function __construct($user_id, $seller_id, $message, $product_id)
    {
        $newMessage = New Message();
        $newMessage->user_id    = empty($user_id) ? null : $user_id ;
        $newMessage->seller_id  = empty($seller_id) ? null : $seller_id;
        $newMessage->product_id = $product_id;
        $newMessage->message    = $message;
        $newMessage->save();

        $customer = Customer::find($user_id);
        if ($customer) {
            $this->username = $customer->last_name. ' ' .$customer->first_name;
            $this->avatar   = $customer->avatar;
            $this->target   = 'customer';
        } else {
            // seller 
            $seller = Seller::find($seller_id);
            $this->username = $seller->last_name. ' ' .$seller->first_name;
            $this->avatar   = $seller->avatar;
            $this->target   = 'seller';
        }

        $this->message = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('our-channel'),
        ];
    }
}
