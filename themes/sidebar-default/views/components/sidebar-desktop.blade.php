<div class="hidden lg:flex lg:flex-shrink-0">
    <div class="flex flex-col w-64 border-r border-gray-200 pt-5 pb-4 bg-gray-100">
        <div class="flex items-center flex-shrink-0 px-6">
            <x-application-logo-large class="h-12 w-auto text-purple-600" />
        </div>
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="h-0 flex-1 flex flex-col overflow-y-auto">
            <!-- User account dropdown -->
            <div x-data="{ open: false }" @keydown.escape="open = false" @click.away="open = false" class="px-3 mt-6 relative inline-block text-left">
                <div x-description="Dropdown menu toggle, controlling the show/hide state of dropdown menu.">
                    <button @click="open = !open" type="button" class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-rose-500" id="options-menu" aria-haspopup="true" x-bind:aria-expanded="open">
                        <span class="flex w-full justify-between items-center">
                            <span class="flex min-w-0 items-center justify-between space-x-3">
                                <img class="w-10 h-10 bg-gray-300 rounded-full flex-shrink-0" src="{{ auth()->user()->picture }}" alt="User profile" />
                                <span class="flex-1 min-w-0 flex flex-col text-left truncate">
                                    <span class="inline-flex text-gray-900 text-sm font-medium truncate">{{ auth()->user()->full_name }}</span>
                                    <span class="inline-flex text-gray-500 text-xs leading-4 truncate">{{ auth()->user()->email }}</span>
                                </span>
                            </span>
                            <svg class="flex-shrink-0 h-5 w-5 text-gray-400 group-hover:text-gray-500" x-description="Heroicon name: selector" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                        </span>
                    </button>
                </div>
                <div x-show="open" x-description="Dropdown panel, show/hide based on dropdown state." x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="z-10 mx-3 origin-top absolute right-0 left-0 mt-1 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-200" role="menu" aria-orientation="vertical" aria-labelledby="options-menu" style="display: none;">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{ __('Account profile') }}</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{ __('Settings') }}</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">{{ __('Notifications') }}</a>
                    </div>
                    <div class="py-1">
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <!-- Navigation -->
            <x-navigation class="px-3 mt-6 space-y-8" />
        </div>
    </div>
</div>
