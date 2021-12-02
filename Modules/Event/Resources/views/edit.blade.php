@extends('layouts.cp')
@title(__('Update event ~ :name', ['name' => $event->title]))

@section('content')

    <livewire:event::edit :event="$event" />

@endsection
