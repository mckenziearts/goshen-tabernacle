<div>
    <!-- Upcoming Events -->
    <div class="px-4 mt-6 sm:px-6 lg:px-8">
        <h2 class="text-gray-500 text-xs font-medium uppercase tracking-wide">{{ __('Events a venir') }}</h2>
        @if($upcomingEvents->isNotEmpty())
            <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3" x-max="1">
                @foreach($upcomingEvents as $upcomingEvent)
                    <li x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false" x-on:notify.window="open = false" class="relative col-span-1 flex shadow-sm rounded-md">
                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-sm font-medium rounded-l-md uppercase">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-gray-200 bg-white rounded-r-md truncate">
                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                <a href="{{ route('admin.events.show', $upcomingEvent) }}" class="text-gray-900 font-medium hover:text-gray-600">
                                    {{ $upcomingEvent->title }}
                                </a>
                                <p class="text-gray-500">{{ __(':number participants', ['number' => 100]) }}</p>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button @click="open = !open" id="pinned-project-options-menu-0" aria-haspopup="true" :aria-expanded="open" class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                                    <span class="sr-only">{{ __('Open options') }}</span>
                                    <x-heroicon-s-dots-vertical class="w-5 h-5" />
                                </button>
                                <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="z-10 mx-3 origin-top-right absolute right-10 top-3 w-48 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200" role="menu" aria-orientation="vertical" aria-labelledby="pinned-project-options-menu-0" style="display: none;">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('admin.events.show', $upcomingEvent) }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{ __('Afficher') }}</a>
                                    </div>
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{ __('Partager') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-3 inline-flex items-center text-sm leading-5 text-gray-500">
                <svg class="mr-3 w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M11 12h6v-1l-3-1V2l3-1V0H3v1l3 1v8l-3 1v1h6v7l1 1 1-1v-7z"/>
                </svg>
                {{ __('Aucun evenement a venir.') }}
            </p>
        @endif
    </div>

    <!-- Events table (small breakpoint and up) -->
    <div class="hidden mt-8 sm:block">
        <div class="align-middle inline-block min-w-full border-b border-gray-200">
            <table class="min-w-full">
                <thead>
                    <tr class="border-t border-gray-200">
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            <span class="lg:pl-2">{{ __('Event') }}</span>
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Start Date') }}
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Privacy') }}
                        </th>
                        <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            {{ __('Last updated') }}
                        </th>
                        <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-100" x-max="1">
                    @forelse($events as $event)
                        <tr>
                            <td class="px-6 py-3 text-sm leading-5 font-medium text-gray-900">
                                <div class="flex items-center space-x-3 lg:pl-2">
                                    <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full {{ $event->is_visible ? 'bg-green-600': 'bg-gray-400' }}"></div>
                                    <div class="flex items-center">
                                        @if($event->getFirstMedia())
                                            <img class="h-8 w-8 rounded object-cover object-center" src="{{ $event->getFirstMedia()->getUrl() }}" alt="">
                                        @else
                                            <div class="bg-gray-200 flex items-center justify-center h-8 w-8 rounded">
                                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                </svg>
                                            </div>
                                        @endif
                                        <a href="{{ route('admin.events.show', $event) }}" class="ml-2 truncate hover:text-gray-600">
                                            <span>{{ $event->title }} </span>
                                        </a>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-left capitalize">
                                {{ $event->start_date->formatLocalized('%d %B %Y') }}
                            </td>
                            <td class="px-6 py-3 text-sm text-gray-500 font-medium whitespace-nowrap">
                                <x-privacy-state :value="$event->privacy_formatted" :key="$event->privacy" />
                            </td>
                            <td class="hidden md:table-cell px-6 py-3 whitespace-nowrap text-sm text-gray-500 text-right capitalize">
                                {{ $event->updated_at->formatLocalized('%d %B %Y') }}
                            </td>
                            <td class="pr-6">
                                <div x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false" class="relative flex justify-end items-center">
                                    <button id="project-options-menu-0" aria-haspopup="true" :aria-expanded="open" type="button" @click="open = !open" class="w-8 h-8 bg-white inline-flex items-center justify-center text-gray-400 rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                                        <span class="sr-only">{{ __('Open options') }}</span>
                                        <x-heroicon-s-dots-vertical class="w-5 h-5" />
                                    </button>
                                    <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="mx-3 origin-top-right absolute right-7 top-0 w-48 mt-1 rounded-md shadow-lg z-10 bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200" role="menu" aria-orientation="vertical" aria-labelledby="project-options-menu-0" style="display: none;">
                                        <div class="py-1" role="none">
                                            <a href="{{ route('admin.events.show', $event) }}" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <x-heroicon-s-eye class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                                                {{ __('Afficher') }}
                                            </a>
                                            <a href="{{ route('admin.events.edit', $event) }}" class="group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                                                <x-heroicon-s-pencil-alt class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500" />
                                                {{ __('Editer') }}
                                            </a>
                                        </div>
                                        <div class="py-1" role="none">
                                            <button wire:click="remove({{ $event->id }})" type="button" class="w-full group flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-red-100 hover:text-red-800 focus:outline-none" role="menuitem">
                                                <x-heroicon-s-trash class="mr-3 h-5 w-5 text-gray-400 group-hover:text-red-800" />
                                                {{ __('Supprimer') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-3 whitespace-no-wrap text-sm leading-5 font-medium">
                                <div class="flex justify-center items-center space-x-2">
                                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="font-medium py-8 text-gray-400 text-xl">{{ __('Aucun events') }}...</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
