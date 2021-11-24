<div x-show="sidebarOpen" class="lg:hidden" style="display: none;">
    <div class="fixed inset-0 flex z-40">
        <div @click="sidebarOpen = false"
             x-show="sidebarOpen"
             x-transition:enter="transition-opacity ease-linear duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition-opacity ease-linear duration-300"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0" class="fixed inset-0" aria-hidden="true" style="display: none;">
            <div class="absolute inset-0 bg-secondary-600 opacity-75"></div>
        </div>
        <div x-show="sidebarOpen"
             x-transition:enter="transition ease-in-out duration-300 transform"
             x-transition:enter-start="-translate-x-full"
             x-transition:enter-end="translate-x-0"
             x-transition:leave="transition ease-in-out duration-300 transform"
             x-transition:leave-start="translate-x-0"
             x-transition:leave-end="-translate-x-full"
             class="relative flex-1 flex flex-col max-w-xs w-full bg-white" style="display: none;">
            <div class="absolute top-0 right-0 -mr-12 pt-2">
                <button x-show="sidebarOpen" @click="sidebarOpen = false" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" style="display: none;">
                    <span class="sr-only">{{ __('Close sidebar') }}</span>
                    <x-heroicon-s-x class="h-6 w-6 text-white"/>
                </button>
            </div>
            <div class="flex-shrink-0 flex items-center px-4">
                <x-application-logo-large />
            </div>
            <div class="mt-5 flex-1 h-0 overflow-y-auto">
                @include('includes.navigation')
            </div>
        </div>
        <div class="flex-shrink-0 w-14" aria-hidden="true">
            <!-- Dummy element to force sidebar to shrink to fit close icon -->
        </div>
    </div>
</div>
