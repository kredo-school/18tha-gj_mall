<?php

namespace App\Livewire;

use App\Events\MessageEvent;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ChatComponent extends Component
{
    public $message;
    public $product_id;
    public $user_id;
    public $seller_id;
    public $convo = [];

    public function mount($product_id, $user_id, $seller_id) {
        $this->product_id = $product_id;
        $this->user_id    = $user_id;
        $this->seller_id  = $seller_id;

        $messages = Message::where('product_id', $product_id)
                            ->Where('user_id', $user_id)
                            ->Where('seller_id', $seller_id)
                            ->get();

        foreach ($messages as $message) {
            if ($message->user_id == $user_id) {
                // Display customer's message
                $this->convo[] = [
                    'username' => $message->customer->last_name . ' ' . $message->customer->first_name,
                    'target'  => 'customer', 
                    'message' => $message->message,
                    'avatar' => $message->customer->avatar
                ];
            } elseif ($message->seller_id == $seller_id) {
                // Display seller's message if it matches the current chat session
                $this->convo[] = [
                    'username' => $message->seller->last_name . ' ' . $message->seller->first_name,
                    'target'  => 'seller', 
                    'message' => $message->message,
                    'avatar' => $message->seller->avatar
                ];
            }
        }
    }

    public function submitMessage()
    {
        if (Auth::guard('seller')->check()) {
            MessageEvent::dispatch('', Auth::guard('seller')->user()->id, $this->message, $this->product_id);
        } else {
            MessageEvent::dispatch(Auth::user()->id, '', $this->message, $this->product_id);
        }

        $this->message = '';
    }

    #[On('echo:our-channel,MessageEvent')]
    public function listenForMessage($data) {
        $this->convo[] = [
            'username' => $data['username'],
            'message'  => $data['message'],
            'avatar'   => $data['avatar'],
            'target'   => $data['target']
        ];
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
