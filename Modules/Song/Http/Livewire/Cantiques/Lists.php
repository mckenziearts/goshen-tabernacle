<?php

namespace Modules\Song\Http\Livewire\Cantiques;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Song\Entities\Song;

class Lists extends Component
{
    use WithPagination;

    protected $listeners = ['song-added' => '$refresh'];

    public function render()
    {
        return view('song::livewire.cantiques.lists', [
            'songs' => Song::with('author', 'book')->paginate(10),
        ]);
    }
}
