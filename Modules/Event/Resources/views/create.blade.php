@extends('layouts.cp')

@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
        <h1 class="text-2xl font-semibold text-secondary-900">Hello World</h1>

        <p class="py-6">
            This view is loaded from module: {!! config('event.name') !!}
        </p>

   </div>

@endsection
