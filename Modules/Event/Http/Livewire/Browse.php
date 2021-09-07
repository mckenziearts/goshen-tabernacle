<?php

namespace Modules\Event\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Event\Entities\Event;

class Browse extends Component
{
    use WithPagination;

    public int $perPage = 10;

    /**
     * Removed event fromm storage.
     *
     * @param  int  $id
     * @throws \Exception
     * @return void
     */
    public function remove(int $id)
    {
        Event::query()->find($id)->delete();

        $this->dispatchBrowserEvent('notify', [
            'title' => __('Removed'),
            'message' => __('Event successfully removed'),
        ]);
    }

    public function render()
    {
        return view('event::livewire.browse', [
            'events' => Event::query()->paginate($this->perPage),
            'upcomingEvents' => Event::query()
                ->whereDate('start_date', '>', now()->format('Y-m-d'))
                ->limit(4)
                ->get(),
        ]);
    }
}
