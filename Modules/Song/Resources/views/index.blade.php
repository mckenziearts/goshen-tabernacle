@extends('layouts.cp')
@title(__('Cantiques'))

@section('content')

    <div class="flex h-full">
        <div class="flex-1 min-w-0">
            <x-page-header>
                <div class="flex-1 min-w-0">
                    <label for="search" class="sr-only">{{ __('Recherche rapide') }}</label>
                    <div class="mt-1 relative flex items-center max-w-sm">
                        <input type="search" placeholder="{{ __('') }}" name="search" id="search" class="focus:ring-primary-500 focus:border-primary-500 block w-full pr-12 sm:text-sm border-secondary-300 rounded-md" />
                        <div class="absolute inset-y-0 right-0 flex py-1.5 pr-1.5">
                            <kbd class="inline-flex items-center border border-secondary-200 rounded px-2 text-sm font-sans font-medium text-secondary-400"> ⌘K </kbd>
                        </div>
                    </div>
                </div>
            </x-page-header>
            <div class="mt-10 pr-5 space-y-5">
                <div>
                    <div class="flex items-center justify-between">
                        <h2 id="book-heading" class="text-lg font-medium text-secondary-900">{{ __('Livres de Recueils & Cantiques') }}</h2>
                        <div x-data="{ open: false }" @keydown.escape.stop="open = false;" @click.away="open = false" class="ml-3 relative z-10 inline-block text-left">
                            <div>
                                <button type="button" class="-my-2 p-2 rounded-full bg-white flex items-center text-secondary-400 hover:text-secondary-600 focus:outline-none focus:ring-2 focus:ring-primary-500" id="menu-0-button" x-ref="button" @click="open = !open" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()">
                                    <span class="sr-only">Open options</span>
                                    <x-heroicon-s-dots-horizontal class="h-5 w-5" />
                                </button>
                            </div>

                            <div x-show="open"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                 x-ref="menu-items" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1"
                                 @keydown.tab="open = false"
                                 @keydown.enter.prevent="open = false;"
                                 @keyup.space.prevent="open = false;" style="display: none;"
                            >
                                <div class="py-1" role="none">
                                    <button type="button" class="block w-full text-secondary-700 flex justify-between px-4 py-2 text-sm hover:bg-secondary-100 hover:text-secondary-900" role="menuitem" tabindex="-1">
                                        <span>{{ __('Ajouter un livre') }}</span>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="mt-4"></div>
                </div>
                <div></div>
            </div>
        </div>
        <div class="border-l border-secondary-200 pl-5 pb-4 max-w-xs w-full">
            <div class="space-y-4">
                <div class="flex justify-between items-center">
                    <h2 id="author-heading" class="text-lg font-medium text-secondary-900">{{ __('Auteurs') }}</h2>
                    <div x-data="{ open: false }" @keydown.escape.stop="open = false;" @click.away="open = false" class="ml-3 relative z-10 inline-block text-left">
                        <div>
                            <button type="button" class="-my-2 p-2 rounded-full bg-white flex items-center text-secondary-400 hover:text-secondary-600 focus:outline-none focus:ring-2 focus:ring-primary-500" id="menu-0-button" x-ref="button" @click="open = !open" aria-expanded="false" aria-haspopup="true" x-bind:aria-expanded="open.toString()">
                                <span class="sr-only">Open options</span>
                                <x-heroicon-s-dots-horizontal class="h-5 w-5" />
                            </button>
                        </div>

                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-100"
                             x-transition:enter-start="transform opacity-0 scale-95"
                             x-transition:enter-end="transform opacity-100 scale-100"
                             x-transition:leave="transition ease-in duration-75"
                             x-transition:leave-start="transform opacity-100 scale-100"
                             x-transition:leave-end="transform opacity-0 scale-95"
                             class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                             x-ref="menu-items" role="menu" aria-orientation="vertical" aria-labelledby="menu-0-button" tabindex="-1"
                             @keydown.tab="open = false"
                             @keydown.enter.prevent="open = false;"
                             @keyup.space.prevent="open = false;" style="display: none;"
                        >
                            <div class="py-1" role="none">
                                <button type="button" class="block w-full text-secondary-700 flex justify-between px-4 py-2 text-sm hover:bg-secondary-100 hover:text-secondary-900" role="menuitem" tabindex="-1">
                                    <span>{{ __('Ajouter') }}</span>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
                <ul role="list" class="grid grid-cols-3 gap-3">
                    <li class="relative">
                        <div class="group block w-full aspect-w-1 aspect-h-1 rounded-md bg-secondary-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-secondary-100 focus-within:ring-primary-500 overflow-hidden">
                            <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=512&amp;q=80" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                            <button type="button" class="absolute inset-0 focus:outline-none">
                                <span class="sr-only">{{ __('Modifier :name', ['name' => 'Shekinah']) }}</span>
                            </button>
                        </div>
                        <p class="mt-2 block text-sm font-medium text-secondary-900 truncate pointer-events-none">Shekinah</p>
                        <p class="block text-xs font-medium text-secondary-500 pointer-events-none">2 chants</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>


@endsection
