<?php

namespace Modules\Song\Http\Livewire\Authors;

use Livewire\Component;
use Modules\Song\Entities\Author;

class Lists extends Component
{
    protected $listeners = ['author-added' => '$refresh'];

    public function render()
    {
        return view('song::livewire.authors.lists', [
            'authors' => Author::withCount('songs')->get(),
        ]);
    }
}
