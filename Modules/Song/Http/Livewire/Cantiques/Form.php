<?php

namespace Modules\Song\Http\Livewire\Cantiques;

use LivewireUI\Modal\ModalComponent;
use Modules\Song\Entities\Author;
use Modules\Song\Entities\Song;
use WireUi\Traits\Actions;

class Form extends ModalComponent
{
    use Actions;

    public ?int $songId = null;
    public string $title = '';
    public ?string $content = null;
    public ?int $author_id = null;
    public string $type = 'cantique';
    public ?string $audio_link = null;
    public ?string $video_link = null;

    protected $listeners = [
        'trix:valueUpdated' => 'onTrixValueUpdate',
    ];

    protected $rules = [
        'title' => 'required|max:255',
        'content' => 'required',
        'audio_link' => 'nullable|url',
        'video_link' => 'nullable|url',
    ];

    public function mount(int $id = null)
    {
        if ($id) {
            $this->songId = $id;
            $song = Song::find($id);
            $this->title = $song->title;
            $this->content = $song->content;
            $this->type = $song->type;
            $this->author_id = $song->author_id;
            $this->audio_link = $song->audio_link;
            $this->video_link = $song->video_link;
        }
    }

    public function onTrixValueUpdate($value)
    {
        $this->content = $value;
    }

    public function save()
    {
        $this->validate();

        if ($this->songId) {
            Song::find($this->songId)->update([
                'title' => $this->title,
                'slug' => $this->title,
                'content' => $this->content,
                'type' => $this->type,
                'audio_link' => $this->audio_link,
                'video_link' => $this->video_link,
            ]);
        } else {
            Song::create([
                'title' => $this->title,
                'slug' => $this->title,
                'content' => $this->content,
                'type' => $this->type,
                'audio_link' => $this->audio_link,
                'video_link' => $this->video_link,
            ]);
        }

        $this->closeModal();

        $this->notification()->success(
            $this->songId ? 'Mis a jour' : 'Nouveau chant',
            $this->songId ? 'Le chant/cantique a été modifié avec succès!' : 'Le chant/cantique a été ajouté avec succès!'
        );

        $this->emit('song-added');
    }

    public function delete()
    {
        $this->song->delete();

        $this->closeModal();

        $this->notification()->success('Suppression', 'Le chant a été supprimé avec succès!');

        $this->emit('song-added');
    }

    public function getSongProperty()
    {
        if ($this->songId) {
            return Song::find($this->songId);
        }

        return null;
    }

    public function render()
    {
        return view('song::livewire.cantiques.form');
    }
}
