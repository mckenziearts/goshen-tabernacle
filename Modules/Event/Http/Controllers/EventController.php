<?php

namespace Modules\Event\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Event\Entities\Event;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('event::index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('event::create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Event  $event
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Event $event)
    {
        return view('event::edit', compact('event'));
    }

    /**
     * Show the detail resource.
     *
     * @param  Event  $event
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Event $event)
    {
        return view('event::show', compact('event'));
    }
}
