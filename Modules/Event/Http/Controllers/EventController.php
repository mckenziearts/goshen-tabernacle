<?php

namespace Modules\Event\Http\Controllers;

use App\Http\Controllers\AdminController;
use Modules\Event\Entities\Event;

class EventController extends AdminController
{
    public function index()
    {
        return view('event::index');
    }

    public function create()
    {
        return view('event::create');
    }

    public function edit(Event $event)
    {
        return view('event::edit', compact('event'));
    }

    public function show(Event $event)
    {
        return view('event::show', compact('event'));
    }
}
