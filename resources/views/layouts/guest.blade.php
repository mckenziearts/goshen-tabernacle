@props(['title' => config('app.name', 'Laravel')])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title }}</title>

    @include('includes._favicon')

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    @stack('styles')
    @livewireStyles
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">

    <script src="{{ mix('/js/app.js') }}" defer></script>
    @livewireScripts
    @include('includes._ga')
</head>
<body class="font-sans text-slate-500 antialiased">

    {{ $slot }}

    @stack('scripts')
</body>
</html>
