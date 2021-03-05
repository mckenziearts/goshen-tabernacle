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

    public int $index;

    /**
     * Component mount instance.
     *
     * @param  Event  $event
     * @return void
     */
    public function mount(Event $event)
    {
        $this->event = $event;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->privacy = $event->privacy;
        $this->is_visible = $event->is_visible;
        $this->start_date = $event->start_date->format('Y-m-d');
        $this->end_date = $event->end_date->format('Y-m-d');

        switch ($event->privacy) {
            case 'public':
                $this->index = 0;
                break;
            case 'private':
                $this->index = 1;
                break;
            case 'invitation':
                $this->index = 2;
                break;
        }
    }

    /**
     * Update entry to the storage.
     *
     * @return void
     */
    public function store()
    {
        $this->validate($this->rules());

        Event::query()->find($this->event->id)->update([
            'title' => $this->title,
            'description' => $this->description,
            'privacy' => $this->privacy,
            'start_date' => $this->start_date,
            'end_date' => $this->end_date,
            'is_visible' => $this->is_visible,
        ]);

        session()->flash('success', __('Event updated successfully!'));

        $this->redirectRoute('admin.events');
    }

    /**
     * Real-Time validation.
     *
     * @param  string  $field
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updated($field)
    {
        $this->validateOnly($field, $this->rules());
    }

    /**
     * Validations rules.
     *
     * @return string[]
     */
    protected function rules()
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

    /**
     * Render component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('event::livewire.edit');
    }
}
