<?php

namespace Modules\Song\Http\Livewire\Books;

use Livewire\Component;
use Modules\Song\Entities\Book;

class Lists extends Component
{
    protected $listeners = ['book-added' => '$refresh'];

    public function render()
    {
        return view('song::livewire.books.lists', [
            'books' => Book::get(),
        ]);
    }
}
