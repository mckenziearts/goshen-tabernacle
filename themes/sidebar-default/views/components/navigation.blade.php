<nav {{ $attributes }}>
    <div>
        <div class="mt-3 space-y-1">
            <x-sidebar-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                <svg class="{{ request()->routeIs('admin.dashboard') ? 'text-gray-500': 'text-gray-400 group-hover:text-gray-500' }} mr-3 h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                {{ __('Dashboard') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('admin.events')" :active="request()->routeIs('admin.events*')">
                <svg class="{{ request()->routeIs('admin.events') ? 'text-gray-500': 'text-gray-400 group-hover:text-gray-500' }} mr-3 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ __('Events') }}
            </x-sidebar-link>
        </div>
    </div>

    <div>
        <!-- Secondary navigation -->
        <h3 class="px-3 text-xs font-semibold text-gray-500 uppercase tracking-wider" id="teams-headline">
            {{ __('Configuration') }}
        </h3>
        <div class="mt-3 space-y-1" role="group" aria-labelledby="teams-headline">

            <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                    {{ __('Audits') }}
                </span>
            </a>

            <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                    {{ __('Bugs Reports') }}
                </span>
            </a>

            <a href="#" class="group flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50">
                <span class="truncate">
                    {{ __('Database') }}
                </span>
            </a>

        </div>
    </div>
</nav>
