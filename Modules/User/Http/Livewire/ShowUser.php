<?php

namespace Modules\User\Http\Livewire;

use Livewire\Component;
use Modules\User\Entities\User;

class ShowUser extends Component
{
    public User $user;

    public function render()
    {
        return view('user::livewire.show-user');
    }
}
