<?php

namespace App\Http\Livewire;

use App\Models\Song;
use Livewire\Component;

class Search extends Component
{
    public string $search = '';

    public function chants()
    {
        if (strlen($this->search) > 3) {
            return Song::with(['author', 'book'])
                ->where('title', 'like', '%' . $this->search . '%')
                ->orWhere('content', 'like', '%' . $this->search . '%')
                ->get();
        }

        return collect();
    }

    public function render()
    {
        return view('livewire.search', [
            'songs' => $this->chants(),
        ]);
    }
}
