<nav class="flex-1 space-y-8" aria-label="Sidebar">
    <div class="space-y-1">
        <x-sidebar-link :href="route('cp.dashboard')" :active="request()->routeIs('cp.dashboard')">
            <x-heroicon-o-chart-square-bar class="{{ request()->routeIs('cp.dashboard') ? 'text-primary-500': 'text-secondary-400 group-hover:text-secondary-500' }} mr-3 flex-shrink-0 h-6 w-6" />
            {{ __('Dashboard') }}
        </x-sidebar-link>
        <x-sidebar-link href="#" :active="request()->routeIs('cp.events')">
            <x-heroicon-o-calendar class="{{ request()->routeIs('cp.events') ? 'text-primary-500': 'text-secondary-400 group-hover:text-secondary-500' }} mr-3 flex-shrink-0 h-6 w-6" />
            {{ __('Events') }}
        </x-sidebar-link>
        <x-sidebar-link href="#" :active="request()->routeIs('cp.users')">
            <x-heroicon-o-user-group class="{{ request()->routeIs('cp.users') ? 'text-primary-500': 'text-secondary-400 group-hover:text-secondary-500' }} mr-3 flex-shrink-0 h-6 w-6" />
            {{ __('Users') }}
        </x-sidebar-link>
    </div>

    <div>
        <h4 class="px-3 text-xs font-semibold text-primary-500 uppercase tracking-wider">{{ __('Analytics') }}</h4>
        <div class="mt-1 space-y-1">
            <x-sidebar-link href="#" :active="request()->routeIs('cp.analytics')">
                <x-heroicon-o-chart-bar class="{{ request()->routeIs('cp.analytics') ? 'text-primary-500': 'text-secondary-400 group-hover:text-secondary-500' }} mr-3 flex-shrink-0 h-6 w-6" />
                {{ __('Analytics') }}
            </x-sidebar-link>
        </div>
    </div>

    <div>
        <h4 class="px-3 text-xs font-semibold text-primary-500 uppercase tracking-wider">{{ __('Administration') }}</h4>
        <div class="mt-1 space-y-1">
            <x-sidebar-link href="#" :active="request()->routeIs('cp.settings')">
                <x-heroicon-o-cog class="{{ request()->routeIs('cp.settings') ? 'text-primary-500': 'text-secondary-400 group-hover:text-secondary-500' }} mr-3 flex-shrink-0 h-6 w-6" />
                {{ __('Settings') }}
            </x-sidebar-link>
        </div>
    </div>
</nav>
