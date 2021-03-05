@extends('layouts.cp')
@section('title', __('Detail ~ :event', ['event' => $event->title]))

@section('content')

    <livewire:event::show :event="$event" />

@endsection
