<div>
    <div class="py-12">
        <div class="w-full">

            @if (!$messages->isEmpty())

            @else
                <div>
                    <p class="font-mono text-2xl text-center">No Messages Yet</p>
                </div>
            @endif
            @foreach ($messages as $message )

                @if ($message->sender_id === auth()->id())
                    <div class="flex gap-2.5 justify-end pb-3">
                        <div class="">
                        <div class="grid mb-2">
                            <h5 class="pb-1 text-sm font-semibold leading-snug text-right text-gray-900">You</h5>
                            <div class="px-3 py-2 bg-indigo-600 rounded">
                            <h2 class="text-sm font-normal leading-snug text-white">{{$message->message}}</h2>
                            </div>
                            <div class="inline-flex items-center justify-start">
                            <h3 class="py-1 text-xs font-normal leading-4 text-gray-500">{{\Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</h3>
                            </div>
                        </div>
                        </div>
                        <svg class="flex-none rounded-full size-12 bg-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                @else
                    <div class="grid pb-3">
                        <div class="flex gap-2.5 mb-4">
                            <svg class="flex-none rounded-full size-12 bg-gray-50" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M12 20a7.966 7.966 0 0 1-5.002-1.756l.002.001v-.683c0-1.794 1.492-3.25 3.333-3.25h3.334c1.84 0 3.333 1.456 3.333 3.25v.683A7.966 7.966 0 0 1 12 20ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10c0 5.5-4.44 9.963-9.932 10h-.138C6.438 21.962 2 17.5 2 12Zm10-5c-1.84 0-3.333 1.455-3.333 3.25S10.159 13.5 12 13.5c1.84 0 3.333-1.455 3.333-3.25S13.841 7 12 7Z" clip-rule="evenodd"/>
                            </svg>
                            <div class="grid">
                                <h5 class="pb-1 text-sm font-semibold leading-snug text-gray-900">{{$message->name}}</h5>
                                <div class="grid w-max">
                                    <div class="px-3.5 py-2 bg-white rounded justify-start  items-center gap-3 inline-flex">
                                        <h5 class="text-sm font-normal leading-snug text-gray-900">{{$message->message}}</h5>
                                    </div>
                                    <div class="justify-end items-center inline-flex mb-2.5">
                                        <h6 class="py-1 text-xs font-normal leading-4 text-gray-500">{{\Carbon\Carbon::parse($message->created_at)->diffForHumans()}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
