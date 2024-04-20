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
    public $convo = [];

    public function mount($product_id) {
        $this->product_id = $product_id;
    
        $messages = Message::where('product_id', $product_id)->get();
        
        foreach($messages as $message) {
            if (Auth::guard('seller')->check()) { 
                $this->convo[] = [
                    'username' => $message->seller->first_name . ' ' . $message->seller->last_name,
                    'message'  => $message->message,
                    'avatar'   => $message->seller->avatar
                ];
            } else {
                $this->convo[] = [
                    'username' => $message->customer->first_name . ' ' . $message->customer->last_name,
                    'message'  => $message->message,
                    'avatar'   => $message->customer->avatar
                ];
            }
        }
    }

    public function submitMessage() 
    {
        if (Auth::guard('seller')->check()) { 
            MessageEvent::dispatch(Auth::guard('seller')->user()->id, $this->message, $this->product_id);
        } else {
            MessageEvent::dispatch(Auth::user()->id, $this->message, $this->product_id);
        }

        $this->message = '';  

    }

    #[On('echo:our-channel,MessageEvent')]
    public function listenForMessage($data) {
        $this->convo[] = [
            'username' => $data['username'],
            'message'  => $data['message'],
            'avatar'   => $data['avatar']
        ];
    }

    public function render()
    {
        return view('livewire.chat-component');
    }
}
