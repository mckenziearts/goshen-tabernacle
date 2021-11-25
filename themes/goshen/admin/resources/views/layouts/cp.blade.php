<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('includes.favicons')

    <title>
        {{ isset($title) ? $title . ' | ' : '' }}
        {{ config('app.name') }}
        {{ is_active('cp.dashboard') ? '- Laravel Starter Kit' : '' }}
    </title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link href="{{ asset('css/media-library-pro.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    @stack('styles')

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode(['csrfToken' => csrf_token()]) !!};
    </script>

    @livewireScripts
    <wireui:scripts />
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body class="antialiased font-sans">

    <div class="h-screen flex overflow-hidden bg-secondary-50" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
        @include('includes.sidebar-mobile')

        <!-- Static sidebar for desktop -->
        @include('includes.sidebar-desktop')

        <!-- Main column -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- Search header -->
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-secondary-200 lg:hidden">
                <button @click.stop="sidebarOpen = true" class="px-4 border-r border-secondary-200 text-secondary-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary-500 lg:hidden">
                    <span class="sr-only">{{ __('Open sidebar') }}</span>
                    <x-heroicon-o-menu-alt-1 class="h-6 w-6" />
                </button>
                <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search_field" class="sr-only">{{ __('Search') }}</label>
                            <div class="relative w-full text-secondary-400 focus-within:text-secondary-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <x-heroicon-s-search class="h-5 w-5" />
                                </div>
                                <input id="search_field" name="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-secondary-900 placeholder-secondary-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-secondary-400 sm:text-sm" placeholder="Search" type="search"/>
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <!-- Profile dropdown -->
                        <x-profile-dropdown />
                    </div>
                </div>
            </div>
            <main class="flex-1 relative z-0 overflow-y-auto max-w-7xl px-4 sm:px-6 md:px-8 py-6">
                @yield('content')
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html>

