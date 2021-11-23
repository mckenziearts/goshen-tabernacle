<div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-[270px] border-r border-secondary-200 bg-white">
        <div class="flex items-center flex-shrink-0 px-6 pt-3">
            <x-application-logo-large />
        </div>
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
            <!-- User account dropdown -->
            <div x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false" class="px-2 mb-4 relative inline-block text-left">
                <div>
                    <button @click="open = !open" type="button" class="group w-full bg-transparent rounded-md px-3.5 py-2 text-sm font-medium text-secondary-700 hover:bg-secondary-50 focus:outline-none" id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                        <span class="flex w-full justify-between items-center">
                            <span class="flex min-w-0 items-center justify-between space-x-3">
                                <img class="w-10 h-10 bg-secondary-300 rounded-full flex-shrink-0" src="{{ auth()->user()->profile_photo_url }}" alt="User profile" />
                                <span class="flex-1 min-w-0 flex flex-col text-left truncate">
                                    <span class="inline-flex text-secondary-700 text-sm font-medium truncate">{{ auth()->user()->full_name }}</span>
                                    <span class="inline-flex text-secondary-500 text-xs leading-4 truncate">{{ auth()->user()->email }}</span>
                                </span>
                            </span>
                            <x-heroicon-s-selector class="flex-shrink-0 h-5 w-5 text-secondary-400 group-hover:text-secondary-500" />
                        </span>
                    </button>
                </div>
                <div x-show="open"
                     x-transition:enter="transition ease-out duration-100"
                     x-transition:enter-start="transform opacity-0 scale-95"
                     x-transition:enter-end="transform opacity-100 scale-100"
                     x-transition:leave="transition ease-in duration-75"
                     x-transition:leave-start="transform opacity-100 scale-100"
                     x-transition:leave-end="transform opacity-0 scale-95"
                     class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-secondary-50 ring-1 ring-black ring-opacity-5 divide-y divide-secondary-200" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" style="display: none;">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-secondary-500 hover:text-secondary-700" role="menuitem">{{ __('Account') }}</a>
                        <a href="#" class="block px-4 py-2 text-sm text-secondary-500 hover:text-secondary-700" role="menuitem">{{ __('Settings') }}</a>
                        <a href="#" class="block px-4 py-2 text-sm text-secondary-500 hover:text-secondary-700" role="menuitem">{{ __('Notifications') }}</a>
                    </div>
                    <div class="py-1">
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-secondary-500 hover:text-secondary-700" role="menuitem"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <div class="border-t border-secondary-200 pt-5 space-y-8">
                @include('includes.navigation')
            </div>
        </div>
    </div>
</div>
