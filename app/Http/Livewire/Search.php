<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Song;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

final class Search extends Component
{
    public string $search = '';

    public function chants(): Collection
    {
        if (mb_strlen($this->search) > 3) {
            return Song::with(['author', 'book'])
                ->where('title', 'like', '%'.$this->search.'%')
                ->orWhere('content', 'like', '%'.$this->search.'%')
                ->get();
        }

        return collect();
    }

    public function render(): View
    {
        return view('livewire.search', [
            'songs' => $this->chants(),
        ]);
    }
}
