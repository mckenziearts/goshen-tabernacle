@extends('layouts.cp')
@title(__('Cantiques'))
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
@endpush

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
            <div class="mt-10 pr-5 space-y-6 sm:space-y-10">
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
                    <div class="swiper mt-4 mySwiper">
                        <div class="swiper-wrapper space-x-3 pt-2">
                            @for($v = 1; $v <= 2; $v++)
                                <div class="swiper-slide grid grid-cols-2 gap-4 sm:grid-cols-4 md:px-0 md:grid-cols-5">
                                    @for($i = 1; $i <= 5; $i++)
                                        <div class="relative">
                                            <div class="group block w-full aspect-w-1 aspect-h-1 rounded-lg bg-secondary-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-secondary-100 focus-within:ring-primary-500 overflow-hidden">
                                                <img src="https://images.unsplash.com/photo-1582053433976-25c00369fc93?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=512&q=80" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                                                <button type="button" class="absolute inset-0 focus:outline-none">
                                                    <span class="sr-only">{{ __('Voir detail pour le livre :name', ['name' => 'Recueils du chretien']) }}</span>
                                                </button>
                                            </div>
                                            <p class="mt-2 block text-sm font-medium text-secondary-900 truncate pointer-events-none">Recueils du chretien</p>
                                            <p class="block text-sm font-medium text-secondary-500 pointer-events-none">89 chants</p>
                                        </div>
                                    @endfor
                                </div>
                            @endfor
                        </div>
                        <div class="w-full mt-5">
                            <div class="swiper-scrollbar h-1 rounded-none"></div>
                        </div>
                    </div>
                </div>

                <livewire:song::cantiques.lists />
            </div>
        </div>
        <div class="border-l border-secondary-200 pl-5 pb-4 max-w-xs w-full">
            <livewire:song::authors.lists />
        </div>
    </div>

@endsection

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.mySwiper', {
            scrollbar: {
                el: '.swiper-scrollbar',
                hide: false,
            },
        });
    </script>
@endpush
