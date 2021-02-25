<?php

namespace Modules\Event\Http\Livewire;

use Livewire\Component;
use Modules\Event\Entities\Event;
use Spatie\MediaLibraryPro\Http\Livewire\Concerns\WithMedia;

class Create extends Component
{
    use WithMedia;

    /**
     * Event description.
     *
     * @var string
     */
    public $title;

    /**
     * Event description.
     *
     * @var string
     */
    public $description;

    /**
     * Event Start date.
     *
     * @var string
     */
    public $start_date;

    /**
     * Event end date.
     *
     * @var string
     */
    public $end_date;

    /**
     * Privacy of the event.
     *
     * @var string
     */
    public $privacy = 'public';

    /**
     * Is visible status for event.
     *
     * @var bool
     */
    public $is_visible = false;

    /**
     * Media library component.
     *
     * @var string[]
     */
    public $mediaComponentNames = ['cover'];

    /**
     * Event cover image.
     *
     * @var mixed
     */
    public $cover;

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

        session()->flash('success', __('Event added successfully!'));

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
            'title' => 'required|min:6|unique:events,title',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'cover' => 'required'
        ];
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('event::livewire.create');
    }
}
