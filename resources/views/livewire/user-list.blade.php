<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Users') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div>
                        <x-text-input wire:model.live.debounce.500ms='search' class="w-full" placeholder='Search User ...'>
                        </x-text-input>
                        <ul role="list" class="divide-y divide-gray-100">

                            @if ($users->isEmpty())
                            <div class="mt-3 mb-3 text-center">
                                <h1>No User Record</h1>
                            </div>

                            @else
                                @foreach ($users as $user)
                                <a wire:key="{{$user->id}}" href="{{ route('send.message', $user->id)}}" wire:navigate>
                                    <li class="flex justify-between py-5 gap-x-6">
                                        <div class="flex min-w-0 gap-x-4">
                                            <img
                                            class="flex-none rounded-full size-12 bg-gray-50"
                                            src="https://img.freepik.com/premium-vector/people-person-contact-black-solid-flat-glyph-icon-single-icon-isolated-white-background_419328-3018.jpg?w=360"
                                            alt="User Profile picture">
                                            <div class="flex-auto min-w-0">
                                            <p class="font-semibold text-gray-900 text-sm/6">{{$user->name}}</p>
                                            <p class="mt-1 text-gray-500 truncate text-xs/5">{{$user->email}}</p>
                                            </div>
                                        </div>
                                    </li>
                                </a>
                                @endforeach
                            @endif
                            <div class="my-2">{{$users->links()}}</div>
                          </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
