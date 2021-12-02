<div>
    <div class="mt-10">
        <h2 class="text-secondary-500 text-xs font-medium uppercase tracking-wide">{{ __('Upcoming events') }}</h2>
        @if($upcomingEvents->isNotEmpty())
            <ul class="grid grid-cols-1 gap-4 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4 mt-3" x-max="1">
                @foreach($upcomingEvents as $upcomingEvent)
                    <li x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false" x-on:notify.window="open = false" class="relative col-span-1 flex shadow-sm rounded-md">
                        <div class="flex-shrink-0 flex items-center justify-center w-16 bg-purple-600 text-white text-sm font-medium rounded-l-md uppercase">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <div class="flex-1 flex items-center justify-between border-t border-r border-b border-secondary-200 bg-white rounded-r-md truncate">
                            <div class="flex-1 px-4 py-2 text-sm truncate">
                                <a href="{{ route('cp.events.show', $upcomingEvent) }}" class="text-secondary-900 font-medium hover:text-secondary-600">
                                    {{ $upcomingEvent->title }}
                                </a>
                                <p class="text-secondary-500">{{ __(':number participants', ['number' => 100]) }}</p>
                            </div>
                            <div class="flex-shrink-0 pr-2">
                                <button @click="open = !open" id="pinned-project-options-menu-0" aria-haspopup="true" :aria-expanded="open" class="w-8 h-8 bg-white inline-flex items-center justify-center text-secondary-400 rounded-full hover:text-secondary-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-rose-500">
                                    <span class="sr-only">{{ __('Open options') }}</span>
                                    <x-heroicon-s-dots-vertical class="w-5 h-5" />
                                </button>
                                <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="z-10 mx-3 origin-top-right absolute right-10 top-3 w-48 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-secondary-200" role="menu" aria-orientation="vertical" aria-labelledby="pinned-project-options-menu-0" style="display: none;">
                                    <div class="py-1" role="none">
                                        <a href="{{ route('cp.events.show', $upcomingEvent) }}" class="block px-4 py-2 text-sm text-secondary-700 hover:bg-secondary-100 hover:text-secondary-900" role="menuitem">{{ __('Afficher') }}</a>
                                    </div>
                                    <div class="py-1" role="none">
                                        <a href="#" class="block px-4 py-2 text-sm text-secondary-700 hover:bg-secondary-100 hover:text-secondary-900" role="menuitem">{{ __('Partager') }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <p class="mt-3 inline-flex items-center text-sm leading-5 text-secondary-500">
                <svg class="mr-3 w-4 h-4" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M11 12h6v-1l-3-1V2l3-1V0H3v1l3 1v8l-3 1v1h6v7l1 1 1-1v-7z"/>
                </svg>
                {{ __('No upcoming events.') }}
            </p>
        @endif
    </div>

    <div class="hidden mt-8 sm:block">
        <div class="overflow-x-auto hide-scrollbar">
            <div class="p-2 align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full">
                        <thead>
                            <tr class="border-t border-secondary-200">
                                <th class="px-6 py-3 border-b border-secondary-200 bg-secondary-50 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                    <span class="lg:pl-2">{{ __('Event') }}</span>
                                </th>
                                <th class="px-6 py-3 border-b border-secondary-200 bg-secondary-50 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                    {{ __('Start Date') }}
                                </th>
                                <th class="px-6 py-3 border-b border-secondary-200 bg-secondary-50 text-left text-xs font-medium text-secondary-500 uppercase tracking-wider">
                                    {{ __('Privacy') }}
                                </th>
                                <th class="pr-6 py-3 border-b border-secondary-200 bg-secondary-50 text-right text-xs font-medium text-secondary-500 uppercase tracking-wider"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-secondary-100" x-max="1">
                            @forelse($events as $event)
                                <tr>
                                    <td class="px-6 py-3 text-sm leading-5 font-medium text-secondary-900">
                                        <div class="flex items-center space-x-3 lg:pl-2">
                                            <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full {{ $event->is_visible ? 'bg-green-600': 'bg-secondary-400' }}"></div>
                                            <div class="flex items-center">
                                                @if($event->getFirstMedia('cover'))
                                                    <img class="h-8 w-8 rounded object-cover object-center" src="{{ $event->getFirstMedia('cover')->getFullUrl() }}" alt="">
                                                @else
                                                    <div class="bg-secondary-200 flex items-center justify-center h-8 w-8 rounded">
                                                        <x-heroicon-o-photograph class="w-5 h-5 text-secondary-400"/>
                                                    </div>
                                                @endif
                                                <a href="{{ route('cp.events.show', $event) }}" class="ml-2 truncate hover:text-secondary-600">
                                                    <span>{{ $event->title }} </span>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-3 whitespace-nowrap text-sm text-secondary-500 text-left capitalize">
                                        {{ $event->start_date->formatLocalized('%d %B %Y') }}
                                    </td>
                                    <td class="px-6 py-3 text-sm text-secondary-500 font-medium whitespace-nowrap">
                                        <x-privacy-state :value="$event->privacy_formatted" :key="$event->privacy" />
                                    </td>
                                    <td class="p-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('cp.events.edit', $event) }}" class="text-primary-600 hover:text-primary-900">{{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-3 whitespace-no-wrap text-sm leading-5 font-medium">
                                        <div class="flex justify-center items-center space-x-2">
                                            <svg class="h-8 w-8 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                            </svg>
                                            <span class="font-medium py-8 text-secondary-400 text-xl">{{ __('Aucun events') }}...</span>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
