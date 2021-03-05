@extends('layouts.cp')
@section('title', __('Edit :event', ['event' => $event->title]))

@section('content')

    <livewire:event::edit :event="$event" />

@endsection
