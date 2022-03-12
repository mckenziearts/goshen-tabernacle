<?php

namespace Modules\Song\Http\Livewire\Authors;

use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Modules\Song\Entities\Author;
use WireUi\Traits\Actions;

class Create extends ModalComponent
{
    use Actions, WithFileUploads;

    public ?int $authorId = null;
    public string $name = '';
    public ?string $previewImage = null;
    public $avatar;

    public function mount(int $id = null)
    {
        if ($id) {
            /** @var Author $author */
            $author = Author::find($id);
            $this->authorId = $id;
            $this->name = $author->name;
            $this->previewImage = $author->getFirstMediaUrl('avatar');
        }
    }

    protected $rules = [
        'name' => 'required',
        'avatar' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function save()
    {
        $this->validate();

        if ($this->authorId) {
            /** @var Author $author */
            $author = Author::find($this->authorId)->update(['name' => $this->name, 'slug' => $this->name]);
        } else {
            /** @var Author $author */
            $author = Author::create(['name' => $this->name, 'slug' => $this->name]);
        }

        if ($this->avatar) {
            $author->addMedia($this->avatar->getRealPath())->toMediaCollection('avatar');
        }

        $this->reset();

        $this->closeModal();

        $this->notification()->success(
            $this->authorId ? 'Mis a jour' : 'Nouveau chant',
            $this->authorId ? 'Le chant/cantique a été modifié avec succès!' : 'Le chant/cantique a été ajouté avec succès!'
        );

        $this->emit('author-added');
    }

    public function delete()
    {
        $this->author->delete();

        $this->closeModal();

        $this->notification()->success('Suppression', 'Le chant a été supprimé avec succès!');

        $this->emit('author-added');
    }

    public function getAuthorProperty()
    {
        if ($this->authorId) {
            return Author::find($this->authorId);
        }

        return null;
    }

    public static function modalMaxWidth(): string
    {
        return 'xl';
    }

    public function render()
    {
        return view('song::livewire.authors.create');
    }
}
