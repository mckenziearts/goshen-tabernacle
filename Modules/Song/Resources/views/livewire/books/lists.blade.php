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
                    <button wire:click="$emit('openModal', 'song::books.form')" type="button" class="block w-full text-secondary-700 flex justify-between px-4 py-2 text-sm hover:bg-secondary-100 hover:text-secondary-900" role="menuitem" tabindex="-1">
                        <span>{{ __('Ajouter un livre') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @if($books->count())
        <div class="swiper mt-4 mySwiper">
            <div class="swiper-wrapper space-x-3 pt-2">
                @foreach($books->chunk(2) as $book_lists)
                    <div class="swiper-slide grid grid-cols-2 gap-4 sm:grid-cols-4 md:px-0 md:grid-cols-5">
                        @foreach($book_lists as $book)
                            <div class="relative">
                                <div class="group block w-full aspect-w-1 aspect-h-1 rounded-lg bg-secondary-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-secondary-100 focus-within:ring-primary-500 overflow-hidden">
                                    <img src="{{ $book->getFirstMediaUrl('avatar') }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                                    <button wire:click="$emit('openModal', 'song::books.form', {{ json_encode([$book->id]) }})" type="button" class="absolute inset-0 focus:outline-none">
                                        <span class="sr-only">{{ __('Voir detail pour le livre :name', ['name' => $book->name]) }}</span>
                                    </button>
                                </div>
                                <p class="mt-2 block text-sm font-medium text-secondary-900 truncate pointer-events-none">{{ $book->name }}</p>
                                <p class="block text-sm font-medium text-secondary-500 pointer-events-none">{{ $book->songs_count }} chants</p>
                            </div>
                        @endforeach
                    </div>
                 @endforeach
            </div>
            <div class="w-full mt-5">
                <div class="swiper-scrollbar h-1 rounded-none"></div>
            </div>
        </div>
    @else
        <div class="mt-4 flex items-center justify-center p-4 border border-dashed rounded-md border-secondary-200">
            <div class="text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path vector-effect="non-scaling-stroke" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 13h6m-3-3v6m-9 1V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">{{ __('Aucun livre') }}</h3>
                <p class="mt-1 text-sm text-gray-500">{{ __('Commencez par ajouter un nouveau livre de cantique.') }}</p>
                <div class="mt-6">
                    <x-button wire:click="$emit('openModal', 'song::books.form')" type="button">
                        <x-heroicon-s-plus class="-ml-1 mr-2 h-5 w-5" />
                        {{ __('Ajouter un livre') }}
                    </x-button>
                </div>
            </div>
        </div>
    @endif
</div>
