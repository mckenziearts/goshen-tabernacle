<div class="relative">
    <div class="mt-10 w-full max-w-xl mx-auto">
        <div action="#" method="POST" class="sm:flex">
            <label for="search" class="sr-only">{{ __('Rechercher') }}</label>
            <input wire:model.debounce.350ms="search" type="search" name="search" id="search" class="block w-full py-3 text-base rounded-md sm:rounded-l-md sm:rounded-r-none placeholder-gray-500 shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:flex-1 sm:py-4 sm:px-5 border-gray-300" placeholder="{{ __('Rechercher par titre ou par contenu') }}" autocomplete="song" />
            <button wire:click="songs" wire:loading.attr="disabled" type="button" class="mt-3 w-full px-6 py-3 border border-transparent text-base font-medium rounded-md sm:rounded-r-md sm:rounded-l-none text-white bg-purple-800 shadow-sm hover:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:mt-0 sm:flex-shrink-0 sm:inline-flex sm:items-center sm:w-auto">
                <x-loader wire:loading wire:target="songs" class="text-white" />
                {{ __('Rechercher') }}
            </button>
        </div>
    </div>
    @if(strlen($search) > 3)
        <div class="absolute inset-x-0 mt-5 w-full max-w-2xl mx-auto divide-y divide-gray-200 bg-white z-50 rounded-md shadow-lg max-h-xs overflow-auto">
            @forelse($songs as $song)
                <div class="px-4 py-3">
                    <p class="text-base text-gray-500 text-sm leading-5">
                        <a href="{{ route('chants.show', $song) }}" class="font-medium text-purple-600 hover:text-purple-800 hover:underline">{{ $song->title }}</a>
                        {{ $song->author ? ' - ' . $song->author->name : '' }}
                    </p>
                    <p class="mt-1 line-clamp-2 text-sm leading-5 text-gray-500">
                        {{ $song->excerpt() }}
                    </p>
                    @if($song->book)
                        <a href="{{ route('chants.book', $song->book) }}" class="inline-flex mt-1 text-sm leading-5 text-gray-900 hover:text-gray-700">Livre de recueil #3</a>
                    @endif
                </div>
            @empty
                <div class="px-4 py-3 flex justify-center items-center space-x-2">
                    <svg class="h-6 w-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    <span class="font-medium text-gray-600 dark:text-white text-sm leading-5">{{ __('Aucun résultat pour :search', ['search' => $search]) }}...</span>
                </div>
            @endforelse
        </div>
    @endif
</div>
