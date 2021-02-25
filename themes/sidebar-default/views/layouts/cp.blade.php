<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - CPanel</title>
    <meta name="apple-mobile-web-app-title" content="{{ app_name() }}">
    <meta name="application-name" content="{{ app_name()  }}">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    <link href="{{ asset('css/media-library-pro.css') }}" rel="stylesheet">
    <link href="{{ mix('css/app.css', 'themes/sidebar-default') }}" rel="stylesheet">
    @stack('styles')
    @bukStyles(true)
    @livewireStyles
</head>
<body class="antialiased font-sans bg-gray-200">

    <div class="h-screen flex overflow-hidden bg-white" x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
        <x-sidebar-mobile />

        <!-- Static sidebar for desktop -->
        <x-sidebar-desktop />

        <!-- Main column -->
        <div class="flex flex-col w-0 flex-1 overflow-hidden">
            <!-- Search header -->
            <div class="relative z-10 flex-shrink-0 flex h-16 bg-white border-b border-gray-200 lg:hidden">
                <button x-description="Sidebar toggle, controls the 'sidebarOpen' sidebar state." @click.stop="sidebarOpen = true" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
                    <span class="sr-only">{{ __('Open sidebar') }}</span>
                    <svg class="h-6 w-6" x-description="Heroicon name: menu-alt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16"></path>
                    </svg>
                </button>
                <div class="flex-1 flex justify-between px-4 sm:px-6 lg:px-8">
                    <div class="flex-1 flex">
                        <form class="w-full flex md:ml-0" action="#" method="GET">
                            <label for="search_field" class="sr-only">{{ __('Search') }}</label>
                            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
                                <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5" x-description="Heroicon name: search" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input id="search_field" name="search_field" class="block w-full h-full pl-8 pr-3 py-2 border-transparent text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">
                            </div>
                        </form>
                    </div>
                    <div class="flex items-center">
                        <!-- Profile dropdown -->
                        <x-profile-dropdown />
                    </div>
                </div>
            </div>
            <main class="flex-1 relative z-0 overflow-y-auto focus:outline-none" tabindex="0" x-data="" x-init="$el.focus()">
                @yield('content')
            </main>
        </div>
    </div>

    <x-notify />

    @livewireScripts
    <script src="{{ mix('js/app.js', 'themes/sidebar-default') }}" defer></script>
    @bukScripts(true)
    @stack('scripts')
</body>
</html>

