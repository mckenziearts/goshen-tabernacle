<?php

namespace Modules\Event\Http\Livewire;

use Livewire\Component;
use Modules\Event\Entities\Event;

class Show extends Component
{
    public Event $event;

    /**
     * Render component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('event::livewire.show');
    }
}
