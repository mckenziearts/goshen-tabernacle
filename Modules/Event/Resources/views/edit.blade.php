@extends('layouts.cp')
@title(__('Update event ~ :name', ['name' => $event->name]))

@section('content')

    <livewire:event::edit :event="$event" />

@endsection
