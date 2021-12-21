<header class="relative bg-white backdrop-filter backdrop-blur z-20">
    <div class="h-10 bg-gradient-to-r from-violet-500 via-purple-600 to-purple-800">
        <div class="max-w-8xl relative mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between h-10">
                <div class="flex items-center space-x-2 text-sm text-white">
                    <a href="#" class="hover:underline hover:text-purple-100">{{ __('Faire un don') }}</a>
                    <span aria-hidden="true">·</span>
                    <a href="#" class="hover:underline hover:text-purple-100">{{ __('Contact') }}</a>
                    <div class="animate-fade pl-4">
                        <span class="inline-flex items-center px-3 py-0.5 rounded-md text-sm font-medium bg-white text-gray-900">
                            <svg class="-ml-0.5 mr-1.5 h-2 w-2 text-red-600" fill="currentColor" viewBox="0 0 8 8">
                                <circle cx="4" cy="4" r="3" />
                            </svg>
                            {{ __('Nous sommes en Live') }}
                        </span>
                    </div>
                </div>
                <div class="flex items-center space-x-5">
                    <a href="{{ route('facebook') }}" class="text-sm font-medium text-white hover:text-purple-300">
                        <span class="sr-only">Facebook</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="{{ route('instagram') }}" class="text-sm font-medium text-white hover:text-purple-300">
                        <span class="sr-only">Instagram</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a href="{{ route('pinterest') }}" class="text-sm font-medium text-white hover:text-purple-300">
                        <span class="sr-only">Pinterest</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 511 511" aria-hidden="true">
                            <path d="M405.017 52.467C369.774 18.634 321.001 0 267.684 0 186.24 0 136.148 33.385 108.468 61.39c-34.114 34.513-53.675 80.34-53.675 125.732 0 56.993 23.839 100.737 63.76 117.011 2.68 1.098 5.377 1.651 8.021 1.651 8.422 0 15.095-5.511 17.407-14.35 1.348-5.071 4.47-17.582 5.828-23.013 2.906-10.725.558-15.884-5.78-23.353-11.546-13.662-16.923-29.817-16.923-50.842 0-62.451 46.502-128.823 132.689-128.823 68.386 0 110.866 38.868 110.866 101.434 0 39.482-8.504 76.046-23.951 102.961-10.734 18.702-29.609 40.995-58.585 40.995-12.53 0-23.786-5.147-30.888-14.121-6.709-8.483-8.921-19.441-6.222-30.862 3.048-12.904 7.205-26.364 11.228-39.376 7.337-23.766 14.273-46.213 14.273-64.122 0-30.632-18.832-51.215-46.857-51.215-35.616 0-63.519 36.174-63.519 82.354 0 22.648 6.019 39.588 8.744 46.092-4.487 19.01-31.153 132.03-36.211 153.342-2.925 12.441-20.543 110.705 8.618 118.54 32.764 8.803 62.051-86.899 65.032-97.713 2.416-8.795 10.869-42.052 16.049-62.495 15.817 15.235 41.284 25.535 66.064 25.535 46.715 0 88.727-21.022 118.298-59.189 28.679-37.02 44.474-88.618 44.474-145.282-.002-44.298-19.026-87.97-52.191-119.814z"/>
                        </svg>
                    </a>
                    <a href="{{ route('youtube') }}" class="text-sm font-medium text-white hover:text-purple-300">
                        <span class="sr-only">Youtube</span>
                        <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 461 461" aria-hidden="true">
                          <path d="M365.257 67.393H95.744C42.866 67.393 0 110.259 0 163.137v134.728c0 52.878 42.866 95.744 95.744 95.744h269.513c52.878 0 95.744-42.866 95.744-95.744V163.137c0-52.878-42.866-95.744-95.744-95.744zm-64.751 169.663-126.06 60.123c-3.359 1.602-7.239-.847-7.239-4.568V168.607c0-3.774 3.982-6.22 7.348-4.514l126.06 63.881c3.748 1.899 3.683 7.274-.109 9.082z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <nav class="max-w-8xl relative mx-auto px-4 sm:px-6">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('home') }}" class="flex">
                    <span class="sr-only">Goshen Tabernacle</span>
                    <x-application-logo-large class="w-auto h-20 text-purple-600" />
                </a>
            </div>
            <div class="hidden space-x-8 lg:flex lg:items-center lg:flex-end lg:ml-10">
                <div class="relative" x-data="{ open: false }" @keydown.escape="open = false">
                    <button type="button"
                            class="inline-flex items-center font-medium text-gray-600 hover:text-gray-900 focus:outline-none"
                            :class="{ 'text-gray-900': open, 'text-gray-600': !(open) }"
                            aria-expanded="true"
                            @click="open = !open"
                            @mousedown="if (open) $event.preventDefault()"
                            :aria-expanded="open.toString()"
                    >
                        <span>{{ __("L'église") }}</span>
                        <svg x-state:on="Item active" x-state:off="Item inactive" class="ml-2 h-5 w-5 group-hover:text-gray-500 text-gray-600" :class="{ 'text-gray-600': open, 'text-gray-400': !(open) }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-xs sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
                         x-ref="panel"
                         x-cloak
                         @click.away="open = false"
                    >
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-6">

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <svg class="flex-shrink-0 h-6 w-6 text-purple-600" x-description="Heroicon name: outline/chart-bar" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            {{ __('A propos') }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ __('Get a better understanding of where your traffic is coming from.') }}
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <svg class="flex-shrink-0 h-6 w-6 text-purple-600" x-description="Heroicon name: outline/cursor-click" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            {{ __('Construction') }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ __('Speak directly to your customers in a more meaningful way.') }}
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <svg class="flex-shrink-0 h-6 w-6 text-purple-600" x-description="Heroicon name: outline/shield-check" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            {{ __('Événements') }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ __("Your customers' data will be safe and secure.") }}
                                        </p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative" x-data="{ open: false }" @keydown.escape="open = false">
                    <button type="button"
                            class="inline-flex items-center font-medium text-gray-600 hover:text-gray-900 focus:outline-none"
                            :class="{ 'text-gray-900': open, 'text-gray-500': !(open) }"
                            aria-expanded="true"
                            @click="open = !open"
                            @mousedown="if (open) $event.preventDefault()"
                            :aria-expanded="open.toString()"
                    >
                        <span>W.M. Brahnam</span>
                        <svg x-state:on="Item active" x-state:off="Item inactive" class="ml-2 h-5 w-5 group-hover:text-gray-500 text-gray-600" :class="{ 'text-gray-600': open, 'text-gray-400': !(open) }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-md sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
                         x-ref="panel"
                         x-cloak
                         @click.away="open = false"
                    >
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-6">

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <svg class="flex-shrink-0 h-6 w-6 text-purple-600" x-description="Heroicon name: outline/cursor-click" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            {{ __('Qui est William Marrion Brahnam ?') }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ __('Speak directly to your customers in a more meaningful way.') }}
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <svg class="flex-shrink-0 h-6 w-6 text-purple-600" x-description="Heroicon name: outline/shield-check" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            {{ __('Brochures') }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ __("Your customers' data will be safe and secure.") }}
                                        </p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="font-medium text-gray-600 hover:text-gray-900">{{ __('Conventions') }}</a>
                <a href="#" class="font-medium text-gray-600 hover:text-gray-900">{{ __('Galerie') }}</a>
                <div class="relative" x-data="{ open: false }" @keydown.escape="open = false">
                    <button type="button"
                            class="inline-flex items-center font-medium text-gray-600 hover:text-gray-900 focus:outline-none"
                            :class="{ 'text-gray-900': open, 'text-gray-600': !(open) }"
                            aria-expanded="true"
                            @click="open = !open"
                            @mousedown="if (open) $event.preventDefault()"
                            :aria-expanded="open.toString()"
                    >
                        <span>{{ __('Prédications') }}</span>
                        <svg x-state:on="Item active" x-state:off="Item inactive" class="ml-2 h-5 w-5 group-hover:text-gray-500 text-gray-600" :class="{ 'text-gray-600': open, 'text-gray-400': !(open) }" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 translate-y-1"
                         x-transition:enter-end="opacity-100 translate-y-0"
                         x-transition:leave="transition ease-in duration-150"
                         x-transition:leave-start="opacity-100 translate-y-0"
                         x-transition:leave-end="opacity-0 translate-y-1"
                         class="absolute z-10 -ml-4 mt-3 transform px-2 w-screen max-w-xs sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2"
                         x-ref="panel"
                         x-cloak
                         @click.away="open = false"
                    >
                        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                            <div class="relative grid gap-6 bg-white px-5 py-6 sm:gap-8 sm:p-6">

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <svg class="flex-shrink-0 h-6 w-6 text-purple-600" x-description="Heroicon name: outline/cursor-click" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122"></path>
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            {{ __('Cultes') }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ __('Speak directly to your customers in a more meaningful way.') }}
                                        </p>
                                    </div>
                                </a>

                                <a href="#" class="-m-3 p-3 flex items-start rounded-lg hover:bg-gray-50">
                                    <svg class="flex-shrink-0 h-6 w-6 text-purple-600" x-description="Heroicon name: outline/shield-check" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                    </svg>
                                    <div class="ml-4">
                                        <p class="text-base font-medium text-gray-900">
                                            {{ __('Podcasts') }}
                                        </p>
                                        <p class="mt-1 text-sm text-gray-500">
                                            {{ __("Your customers' data will be safe and secure.") }}
                                        </p>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </div>
                <a href="#" class="font-medium text-gray-600 hover:text-gray-900">{{ __('Actualités') }}</a>
                <a href="#" class="hidden bg-red-600 px-3 py-1.5 text-sm leading-5 rounded-full inline-flex items-center font-medium text-white hover:bg-red-500 xl:block">
                    {{ __('Live Stream') }}
                </a>
            </div>
        </div>
    </nav>
</header>
