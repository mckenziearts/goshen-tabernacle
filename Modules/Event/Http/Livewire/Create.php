<?php

namespace Modules\Event\Http\Livewire;

use Livewire\Component;
use Modules\Event\Entities\Event;
use Modules\Event\Traits\WithAttributes;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia, WithAttributes;

    /**
     * Save new event to the storage.
     *
     * @return void
     */
    public function store()
    {
        $this->validate($this->rules());

        $event = Event::query()->create([
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'privacy' => $this->privacy,
            'is_visible' => $this->is_visible,
        ]);

        $event->addFromMediaLibraryRequest($this->cover)
            ->toMediaCollection('cover');

        $this->clearMedia('cover');

        session()->flash('success', __('Evenement ajoute avec succes!'));

        $this->redirectRoute('admin.events');
    }

    protected function rules(): array
    {
        return [
            'title' => 'required|min:6|unique:events,title',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cover' => 'required'
        ];
    }

    protected function messages(): array
    {
        return [
            'title.required' => 'Le titre de l\'evenement est requis',
            'title.min' => 'Le titre de l\'evenement dois etre de plus de 6 caracteres',
            'title.unique' => 'Ce titre a deja ete attribue a un event',
            'description.required' => 'La description est requise',
            'start_date.required' => 'La date de debut est requise',
            'end_date.required' => 'La date de fin est requise',
            'cover.required' => 'Une image de couverture est requise',
        ];
    }

    public function render()
    {
        return view('event::livewire.create');
    }
}
