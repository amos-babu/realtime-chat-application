<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class MessageDisplay extends Component
{
    public $messages;

    public $user;

    public function mount(User $user)
    {
        $this->user = $user;
        $this->loadMessages();
    }

    #[On('sentMessageEvent')]
    public function handleLivewireMessages()
    {
        $this->loadMessages();
    }

    public function getListeners()
    {
        return [
            "echo:livewire-chat." . auth()->id() . ",MessageSent" => 'loadMessages',
        ];
    }

    public function loadMessages()
    {
        $conversationId = Message::generateConversationId(auth()->id(), $this->user->id);
        $this->messages = Message::where('conversation_id', $conversationId)
            ->orderBy('created_at', 'asc')
            ->get();
    }

    public function render()
    {
        return view('livewire.message-display', ['messages' => $this->messages]);
    }
}
