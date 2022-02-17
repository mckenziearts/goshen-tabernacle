<div @click.away="open = false" class="ml-3 relative" x-data="{ open: false }">
    <div>
        <button @click="open = !open" class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500" id="user-menu" aria-haspopup="true" x-bind:aria-expanded="open">
            <span class="sr-only">{{ __('Open user menu') }}</span>
            <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="User profile">
        </button>
    </div>
    <div x-show="open"
         x-transition:enter="transition ease-out duration-100"
         x-transition:enter-start="transform opacity-0 scale-95"
         x-transition:enter-end="transform opacity-100 scale-100"
         x-transition:leave="transition ease-in duration-75"
         x-transition:leave-start="transform opacity-100 scale-100"
         x-transition:leave-end="transform opacity-0 scale-95"
         class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-secondary-200"
         role="menu" aria-orientation="vertical" aria-labelledby="user-menu" style="display: none;">
        <div class="py-1" role="none">
            <a href="{{ env('APP_URL')  }}" target="_blank" class="flex items-center px-4 py-2 text-sm text-secondary-700 hover:bg-secondary-100 hover:text-secondary-900" role="menuitem">{{ __('Visit Site') }}</a>
            <a href="#" class="block px-4 py-2 text-sm text-secondary-700 hover:bg-secondary-100 hover:text-secondary-900" role="menuitem">{{ __('Account') }}</a>
            <a href="#" class="block px-4 py-2 text-sm text-secondary-700 hover:bg-secondary-100 hover:text-secondary-900" role="menuitem">{{ __('Settings') }}</a>
            <a href="#" class="block px-4 py-2 text-sm text-secondary-700 hover:bg-secondary-100 hover:text-secondary-900" role="menuitem">{{ __('Notifications') }}</a>
        </div>
        <div class="py-1" role="none">
            <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-secondary-700 hover:bg-secondary-100 hover:text-secondary-900" role="menuitem"
               onclick="event.preventDefault(); document.getElementById('logout-mobile').submit();">
                {{ __('Log Out') }}
            </a>
            <form id="logout-mobile" action="{{ route('logout') }}" method="POST" class="hidden">
                @csrf
            </form>
        </div>
    </div>
</div>
