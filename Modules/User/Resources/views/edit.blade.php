@extends('layouts.cp')

@section('content')

    <div>
        <h1 class="text-2xl font-semibold text-secondary-900">Hello World</h1>

        <p class="py-6">
            This view is loaded from module: {!! config('user.name') !!}
        </p>

   </div>

@endsection
