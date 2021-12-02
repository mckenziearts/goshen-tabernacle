<?php

namespace Modules\Event\Http\Livewire;

use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Event\Entities\Event;
use Modules\Event\Traits\WithAttributes;

class Edit extends Component
{
    use WithAttributes;

    public Event $event;

    public int $index = 0;

    protected $listeners = [
        'trix:valueUpdated' => 'onTrixValueUpdate',
    ];

    public function mount(Event $event)
    {
        $this->event = $event;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->privacy = $event->privacy;
        $this->is_visible = $event->is_visible;
        $this->start_date = $event->start_date->toRfc7231String();
        $this->end_date = $event->end_date->toRfc7231String();

        $this->index = match ($event->privacy) {
            'public' => 0,
            'private' => 1,
            'invitation' => 2,
        };
    }

    public function onTrixValueUpdate($value)
    {
        $this->description = $value;
    }

    public function store()
    {
        $this->validate($this->rules());

        $this->event->update([
            'title' => $this->title,
            'slug' => $this->title,
            'description' => $this->description,
            'privacy' => $this->privacy,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_visible' => $this->is_visible,
        ]);

        session()->flash('success', __('Event updated successfully!'));

        $this->redirectRoute('cp.events');
    }

    public function rules(): array
    {
        return [
            'title' => [
                'required',
                'min:6',
                Rule::unique('events', 'title')->ignore($this->event->id),
            ],
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }

    public function render()
    {
        return view('event::livewire.edit');
    }
}
