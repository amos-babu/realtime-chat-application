<?php

namespace App\Livewire;

use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class UserList extends Component
{
    public $search;

    public function render()
    {

        return view(
            'livewire.user-list',
            [
                'users' => User::latest()
                    ->where('name', 'like', "%{$this->search}%")
                    ->where('id', '!=', auth()->id())
                    ->paginate(10)
            ]
        );
    }
}
