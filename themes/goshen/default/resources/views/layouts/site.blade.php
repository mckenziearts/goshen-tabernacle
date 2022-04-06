<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('includes._favicon')

    <x-seo::meta />

    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    @stack('styles')
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">

    @include('includes._ga')
</head>
<body class="font-sans antialiased">

    @include('layouts.header')

    @yield('body')

    @include('layouts.footer')

    <script src="{{ mix('js/app.js') }}"></script>
    @stack('scripts')

</body>
</html>
