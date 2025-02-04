<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;

class Conversation extends Component
{
    public $conversations;

    public $selectedConversationId;

    public function mount()
    {
        $this->loadConversations();
    }

    #[On('echo:livewire-chat,MessageSent')]
    public function getListeners()
    {
        return [
            "echo:livewire-chat." . auth()->id() . ",MessageSent" => 'loadConversations',
        ];
    }

    public function loadConversations()
    {
        $this->conversations = Message::where('sender_id', auth()->id())
            ->orWhere('recipient_id', auth()->id())

            //getting the last message and the time
            ->select(
                'conversation_id',
                DB::raw('MAX(created_at) as last_message_time'),
                DB::raw('(SELECT message FROM messages AS m WHERE m.conversation_id = messages.conversation_id ORDER BY m.created_at DESC LIMIT 1) as last_message'),
                DB::raw('(SELECT COUNT(*) FROM messages AS m WHERE m.conversation_id = messages.conversation_id AND is_read = 0 AND m.recipient_id = ' . auth()->id() . ') as unread_count')
            )
            ->groupBy('conversation_id')
            ->orderBy('last_message_time', 'desc')
            ->get()
            ->map(function ($message) {

                // Extract the other user's ID
                $userIds = explode('-', $message->conversation_id);
                $otherUserId = $userIds[0] == auth()->id() ? $userIds[1] : $userIds[0];
                $otherUser = User::find($otherUserId);

                return [
                    'conversation_id' => $message->conversation_id,
                    'name' => $otherUser->name ?? 'Unknown User',
                    'otherUserId' => $otherUserId,
                    'last_message' => $message->last_message,
                    'last_message_time' => $message->last_message_time,
                    'unread_count' => $message->unread_count,
                ];
            });
    }

    public function markAsRead($conversationId)
    {
        $this->selectedConversationId = $conversationId;

        Message::where('conversation_id', $conversationId)
            ->where('recipient_id', auth()->id())
            ->update(['is_read' => true]);

        $this->loadConversations();
    }


    public function render()
    {
        return view('livewire.conversation', [
            'conversations' => $this->conversations,
        ]);
    }
}
