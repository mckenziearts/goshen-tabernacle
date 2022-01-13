@extends('layouts.site')

@section('body')

    <x-container>

        <div class="w-full relative h-[575px]">
            <iframe class="w-full h-full aspect-video rounded-lg shadow-lg"
                    src="https://www.youtube.com/embed/live_stream?channel=UCOhyRt-xCcrmbNxu-eT9AOg"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen
            ></iframe>
        </div>

    </x-container>

    <div class="max-w-4xl mx-auto px-4 py-16 sm:px-6 sm:pb-24 lg:max-w-7xl">
        <h2 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            {{ __('Revivez les précédents lives') }}
        </h2>
        <p class="mt-4 max-w-3xl text-lg text-gray-500">
            {{ __("Si vous n'étiez pas des nôtres durant le dernier live, ou si vous voulez revivez nos derniers cultes. Voici les lives les plus marquants.") }}
        </p>

        <ul role="list" class="mt-12 grid sm:grid-cols-2 gap-x-4 gap-y-8 sm:gap-x-6 lg:grid-cols-3 xl:gap-x-8">
            <li class="relative">
                <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="https://i.ytimg.com/vi/LF-ClrApJ0Q/hqdefault.jpg?sqp=-oaymwEcCPYBEIoBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLBy6BX_WOR4kjX9fZZjEmu6pT8Qug" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    <a href="https://youtu.be/LF-ClrApJ0Q" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">Fils attributs de son Esprit</span>
                    </a>
                </div>
                <p class="mt-3 block text-xl font-medium text-gray-900 truncate pointer-events-none">{{ __('Fils attributs de son Esprit.') }}</p>
                <p class="block text-sm font-medium text-gray-500 pointer-events-none uppercase tracking-wider">Pasteur Gilbert Lontsi</p>
            </li>
            <li class="relative">
                <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="https://i.ytimg.com/vi/HTZhkH6yFlc/hqdefault.jpg?sqp=-oaymwEcCPYBEIoBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLCpb-0zd46Z7ryFSkxcQiyY5ybyUw" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    <a href="https://www.youtube.com/watch?v=HTZhkH6yFlc" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">Parle la Parole</span>
                    </a>
                </div>
                <p class="mt-3 block text-xl font-medium text-gray-900 truncate pointer-events-none">{{ __('Parle la Parole.') }}</p>
                <p class="block text-sm font-medium text-gray-500 pointer-events-none uppercase tracking-wider">Pasteur Gilbert Lontsi</p>
            </li>
            <li class="relative">
                <div class="group block w-full aspect-w-10 aspect-h-7 rounded-lg bg-gray-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-gray-100 focus-within:ring-indigo-500 overflow-hidden">
                    <img src="https://i.ytimg.com/vi/HTZhkH6yFlc/hqdefault.jpg?sqp=-oaymwEcCPYBEIoBSFXyq4qpAw4IARUAAIhCGAFwAcABBg==&rs=AOn4CLCpb-0zd46Z7ryFSkxcQiyY5ybyUw" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    <a href="https://www.youtube.com/watch?v=VcUpHpZYwJE" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">Parle !</span>
                    </a>
                </div>
                <p class="mt-3 block text-xl font-medium text-gray-900 truncate pointer-events-none">{{ __('Parle !') }}</p>
                <p class="block text-sm font-medium text-gray-500 pointer-events-none uppercase tracking-wider">Pasteur Eric AMOUGOU</p>
            </li>
        </ul>
    </div>

@stop
