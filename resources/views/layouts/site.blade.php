@props(['title' => null])

<x-base-layout :title="$title">

    @include('layouts.header')

    {{ $slot }}

    @include('layouts.footer')

</x-base-layout>
