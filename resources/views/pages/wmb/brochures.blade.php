@extends('layouts.site')

@section('body')

    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto">
            <div class="relative z-10 py-8 bg-white sm:py-16 md:py-20 lg:max-w-2xl lg:w-full lg:py-28 xl:py-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100"/>
                </svg>

                <div class="mx-auto max-w-7xl px-4 sm:px-6">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">{{ __('Brochures du Frère') }}</span>
                            <span class="block text-purple-600 xl:inline">William M. Brahnam</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            {{ __("Télécharger les prédications de Frère Brahnam en format PDF et audio éditer par VGR (La Voix de Dieu). Ces brochures proviennent de plusieurs sources diverses mentionnées en bas de page.") }}
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <a href="https://drive.google.com/file/d/1cQRzDmwrE7FzPygAJbNFwjhzqrl0HUvf/view?usp=sharing" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 md:py-4 md:text-lg md:px-10">
                                    <x-heroicon-o-cloud-download class="h-5 w-5 mr-2"/>
                                    {{ __('Télécharger le Kosher') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="{{ asset('/images/william-brahnam.jpg') }}" alt="">
        </div>
    </div>

    <section x-data="{ open: false }" aria-labelledby="filter-heading" class="sticky top-0 z-20 border-t border-b border-gray-200 bg-white">
        <h2 id="filter-heading" class="sr-only">{{ __('Filtres') }}</h2>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative py-2 flex items-center justify-between">
            <div class="flex space-x-6 divide-x divide-gray-200 text-sm">
                <div>
                    <button type="button" class="group text-gray-700 font-medium flex items-center" aria-controls="disclosure-1" @click="open = !open" aria-expanded="false" x-bind:aria-expanded="open.toString()">
                        <x-heroicon-s-filter class="flex-none w-5 h-5 mr-2 text-gray-400 group-hover:text-gray-500"/>
                        {{ __(':count Filtres', ['count' => 0]) }}
                    </button>
                </div>
                <div class="pl-6">
                    <button type="button" class="text-gray-500">{{ __('Annuler') }}</button>
                </div>
            </div>
            <div class="flex items-center space-x-5">
                <div x-data="{ open: false }" @keydown.escape.stop="open = false;" @click.away="open = false" class="relative inline-block">
                    <div class="flex">
                        <button type="button" class="group inline-flex justify-center text-sm font-medium text-gray-700 hover:text-gray-900" id="menu-button" x-ref="button" @click="open = !open" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()">
                            {{ __('Ranger') }}
                            <x-heroicon-s-chevron-down class="shrink-0 -mr-1 ml-1 h-5 w-5 text-gray-400 group-hover:text-gray-500"/>
                        </button>
                    </div>

                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="origin-top-right absolute right-0 mt-2 w-40 rounded-md shadow-2xl bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                         x-ref="menu-items" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1"
                         @keydown.tab="open = false" @keydown.enter.prevent="open = false;" @keyup.space.prevent="open = false;" style="display: none;">
                        <div class="py-1" role="none">

                            <a href="#" class="font-medium text-gray-900 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-0">
                                {{ __('Récente') }}
                            </a>

                            <a href="#" class="text-gray-500 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" id="menu-item-1">
                                {{ __('Populaire') }}
                            </a>

                        </div>
                    </div>
                </div>
                <div class="mt-1 relative flex items-center">
                    <input type="text" name="search" id="search" class="shadow-sm focus:ring-purple-500 focus:border-purple-500 block w-full pr-12 sm:text-sm border-gray-300 rounded-md">
                    <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                        <kbd class="inline-flex items-center border border-gray-200 rounded px-2 text-sm font-sans font-medium text-gray-400">
                            ⌘K
                        </kbd>
                    </div>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-200 py-10" id="disclosure-1" x-show="open" style="display: none;">
            <div class="max-w-7xl mx-auto px-4 sm:px-6">
                <h3 class="block font-medium text-sm">{{ __('Année') }}</h3>
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 sm:gap-y-5 md:gap-x-6 md:grid-cols-4">
                    @for($i = 1; $i <= 4; $i++)
                        <fieldset>
                            <div class="pt-6 space-y-6 sm:pt-4 sm:space-y-4">
                                @for($y = 1; $y <= 4; $y++)
                                    <div class="flex items-center text-base sm:text-sm">
                                        <input id="price-0" name="price[]" value="0" type="checkbox" class="shrink-0 h-4 w-4 border-gray-300 rounded text-purple-600 focus:ring-purple-500">
                                        <label for="price-0" class="ml-3 min-w-0 flex-1 text-gray-600">
                                            1957
                                        </label>
                                    </div>
                                @endfor
                            </div>
                        </fieldset>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <div class="relative max-w-3xl mx-auto py-12 sm:py-16 divide-y divide-gray-200">
        <div class="py-4">

        </div>
    </div>

@stop
