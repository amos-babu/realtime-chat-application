<?php

namespace App\Livewire;

use App\Events\MessageSent;
use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout('layouts.app')]
class SendMessage extends Component
{
    public $user;

    public $sentMessagesUser;

    #[Validate('required|min:1')]
    public $message = '';

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function sendMessage()
    {
        $this->validate();

        $conversationId = Message::generateConversationId(auth()->id(), $this->user->id);

        $sentMessages = auth()->user()->sentMessages()->create([
            'message' => $this->message,
            'recipient_id' => $this->user->id,
            'conversation_id' => $conversationId
        ]);

        $this->reset('message');

        $this->dispatch('sentMessageEvent', $sentMessages);

        broadcast(new MessageSent($sentMessages))->toOthers();
    }

    public function render()
    {
        return view('livewire.send-message');
    }
}
