<?php

namespace Modules\Event\Http\Livewire;

use Livewire\Component;
use Modules\Event\Entities\Event;
use Modules\Event\Traits\WithAttributes;

class Create extends Component
{
    use WithAttributes;

    protected $rules = [
        'title' => 'required|min:6|unique:events,title',
        'description' => 'required',
        'start_date' => 'required',
        'end_date' => 'required',
        'cover' => 'required'
    ];

    protected $listeners = [
        'trix:valueUpdated' => 'onTrixValueUpdate',
    ];

    public function onTrixValueUpdate($value)
    {
        $this->description = $value;
    }

    public function store()
    {
        $this->validate();

        $event = Event::query()->create([
            'title' => $this->title,
            'slug' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'privacy' => $this->privacy,
            'is_visible' => $this->is_visible,
        ]);

        /*$event->addFromMediaLibraryRequest($this->cover)
            ->toMediaCollection('cover');

        $this->clearMedia('cover');*/

        session()->flash('success', __('Event successfully added!'));

        $this->redirectRoute('cp.events');
    }

    public function render()
    {
        return view('event::livewire.create');
    }
}
