<div>
    <div class="flex justify-between">
        <p class="mb-2 font-mono text-2xl">Recent Conversations</p>
        <a href="{{ route('user.list')}}" wire:navigate>
            <x-primary-button class="ms-3">
                {{ __('New Conversation') }}
            </x-primary-button>
        </a>
    </div>
    <ul role="list" class="divide-y divide-gray-100">
        @forelse ($conversations as $conversation)
            <a wire:click="markAsRead('{{ $conversation['conversation_id'] }}')" wire:key="{{$conversation['otherUserId']}}" href="{{ route('send.message', $conversation['otherUserId'])}}" wire:navigate>
                <li class="flex justify-between py-5 gap-x-6">
                    <div class="flex min-w-0 gap-x-4">
                        <svg class="flex-none {{ $conversation['unread_count'] > 0 ? 'bg-gray-500' : 'bg-gray-50' }} rounded-full size-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                          </svg>
                        <div class="flex-auto min-w-0">
                        <p class="font-semibold text-gray-900 text-sm/6">{{ $conversation['name'] }}</p>
                        <p class="mt-1 font-semibold text-gray-500 truncate text-xs/5">{{ $conversation['last_message'] }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="mt-1 {{ $conversation['unread_count'] > 0 ? 'font-bold text-gray-900' : 'text-gray-600' }} text-xs/5">{{ \Carbon\Carbon::parse($conversation['last_message_time'])->diffForHumans() }}</p>
                        </div>
                        @if ($conversation['unread_count'] > 0)
                            <div class="justify-self-end">
                                <span class="inline-flex items-center justify-center w-6 h-6 text-sm font-semibold text-gray-100 bg-gray-900 rounded-full me-2 dark:bg-gray-700 dark:text-gray-300">
                                    {{ $conversation['unread_count'] }}
                                    <span class="sr-only">Icon description</span>
                                </span>
                            </div>
                        @endif

                    </div>

                </li>
            </a>
        @empty
            <p class="text-center text-gray-500">No Conversations Yet.</p>
            <p class="text-center text-gray-500">Click the button to start a conversation</p>
        @endforelse
      </ul>

</div>
