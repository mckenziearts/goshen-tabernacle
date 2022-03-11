<nav class="flex" aria-label="Breadcrumb">
    <ol role="list" class="flex items-center space-x-4">
        <li>
            <div>
                <a href="{{ route('cp.dashboard') }}" class="text-secondary-400 hover:text-secondary-500">
                    <x-heroicon-s-home class="shrink-0 h-5 w-5" />
                    <span class="sr-only">{{ __('Dashboard') }}</span>
                </a>
            </div>
        </li>

        {{ $slot }}
    </ol>
</nav>

