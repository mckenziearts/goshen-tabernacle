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
                    <button wire:click="$emit('openModal', 'song::authors.create')" type="button" class="block w-full text-secondary-700 flex justify-between px-4 py-2 text-sm hover:bg-secondary-100 hover:text-secondary-900" role="menuitem" tabindex="-1">
                        <span>{{ __('Ajouter') }}</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <ul role="list" class="grid grid-cols-3 gap-3">
        @foreach($authors as $author)
            <li class="relative">
                <div class="group block w-full aspect-w-1 aspect-h-1 rounded-md bg-secondary-100 focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-offset-secondary-100 focus-within:ring-primary-500 overflow-hidden">
                    <img src="{{ $author->getFirstMediaUrl('avatar') }}" alt="" class="object-cover pointer-events-none group-hover:opacity-75">
                    <button wire:click="$emit('openModal', 'song::authors.create', {{ json_encode([$author->id]) }})" type="button" class="absolute inset-0 focus:outline-none">
                        <span class="sr-only">{{ __('Modifier :name', ['name' => $author->name]) }}</span>
                    </button>
                </div>
                <p class="mt-2 block text-sm font-medium text-secondary-900 truncate pointer-events-none">{{ $author->name }}</p>
                <p class="block text-xs font-medium text-secondary-500 pointer-events-none">{{ $author->songs_count }} chants</p>
            </li>
        @endforeach
    </ul>
</div>
