<div>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{$user->name}}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-gray-200 shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <livewire:message-display :user="$user">
                        <div class="relative py-6">
                            <form class="fixed bottom-0 left-0 right-0 " wire:submit='sendMessage'>
                                <div class="sticky inline-flex items-center justify-between w-full gap-2 py-1 pl-3 pr-1 bg-white border border-gray-200 rounded-3xl">
                                    <input wire:model='message' class="font-medium leading-4 text-black rounded ext-xs grow shrink basis-0 focus:outline-none" placeholder="Type here...">
                                    <div class="flex items-center gap-2">
                                      <button class="flex items-center px-3 py-2 bg-indigo-600 rounded-full shadow ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                          <g id="Send 01">
                                            <path id="icon" d="M9.04071 6.959L6.54227 9.45744M6.89902 10.0724L7.03391 10.3054C8.31034 12.5102 8.94855 13.6125 9.80584 13.5252C10.6631 13.4379 11.0659 12.2295 11.8715 9.81261L13.0272 6.34566C13.7631 4.13794 14.1311 3.03408 13.5484 2.45139C12.9657 1.8687 11.8618 2.23666 9.65409 2.97257L6.18714 4.12822C3.77029 4.93383 2.56187 5.33664 2.47454 6.19392C2.38721 7.0512 3.48957 7.68941 5.69431 8.96584L5.92731 9.10074C6.23326 9.27786 6.38623 9.36643 6.50978 9.48998C6.63333 9.61352 6.72189 9.7665 6.89902 10.0724Z" stroke="white" stroke-width="1.6" stroke-linecap="round" />
                                          </g>
                                        </svg>
                                        <h3 class="px-2 text-xs font-semibold leading-4 text-white">Send</h3>
                                      </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>
        </div>

    </div>

</div>
