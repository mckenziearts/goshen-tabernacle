<?php

namespace Modules\Song\Http\Livewire\Books;

use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Modules\Song\Entities\Book;
use WireUi\Traits\Actions;

class Form extends ModalComponent
{
    use Actions, WithFileUploads;

    public ?int $bookId = null;
    public string $name = '';
    public ?string $edition = null;
    public ?string $previewImage = null;
    public $preview;

    protected $rules = [
        'name' => 'required',
        'preview' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function mount(int $id = null)
    {
        if ($id) {
            /** @var Book $book */
            $book = Book::find($id);
            $this->bookId = $id;
            $this->name = $book->name;
            $this->edition = $book->edition;
            $this->previewImage = $book->getFirstMediaUrl('avatar');
        }
    }

    public function save()
    {
        if ($this->bookId) {
            /** @var Book $book */
            $book = Book::find($this->bookId);
            $book->update(['name' => $this->name, 'slug' => $this->name]);
        } else {
            /** @var Book $book */
            $book = Book::create(['name' => $this->name, 'slug' => $this->name]);
        }

        if ($this->preview) {
            $book->addMedia($this->preview->getRealPath())->toMediaCollection('avatar');
        }

        $this->reset();

        $this->closeModal();

        $this->notification()->success(
            $this->bookId ? 'Mis a jour' : 'Nouveau livre',
            $this->bookId ? 'Le livre a été modifié avec succès!' : 'Le livre a été ajouté avec succès!'
        );

        $this->emit('book-added');
    }

    public function getBookProperty()
    {
        if ($this->bookId) {
            return Book::find($this->bookId);
        }

        return null;
    }

    public function delete()
    {
        $this->book->delete();

        $this->closeModal();

        $this->notification()->success('Suppression', 'Le livre a été supprimé avec succès!');

        $this->emit('book-added');
    }

    public function render()
    {
        return view('song::livewire.books.form');
    }
}
