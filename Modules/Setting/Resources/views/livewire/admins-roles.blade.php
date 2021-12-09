<div>
    <x-breadcrumb>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <a href="{{ route('cp.settings') }}" class="ml-4 text-sm font-medium text-secondary-500 hover:text-secondary-700">{{ __('Settings') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <span aria-current="page" class="ml-4 text-sm font-medium text-secondary-500">{{ __('Administrators & roles') }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <x-page-header class="py-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-semibold leading-6 text-secondary-900 sm:truncate sm:text-xl">
                {{ __('Administrators & roles') }}
            </h2>
        </div>
    </x-page-header>

    <div class="mt-5 space-y-10">
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md overflow-hidden">
            <div class="flex items-center">
                <h2 class="text-lg leading-6 font-medium text-secondary-900">{{ __('Administrator roles available') }}</h2>
                <button wire:click="launchCreateModal" type="button" class="ml-3 inline-flex items-center px-2.5 py-1.5 border border-transparent text-xs leading-4 font-medium rounded text-primary-700 bg-primary-100 hover:bg-primary-50 focus:outline-none focus:border-primary-300 focus:shadow-outline-purple active:bg-primary-200 transition ease-in-out duration-150">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    {{ __('Add new role') }}
                </button>
            </div>
            <p class="mt-3 text-secondary-500 leading-6 text-base">
                {{ __('A role provides access to predefined menus and features so that depending on the assigned role and permissions an administrator can have access to what he needs.') }}
            </p>
            <div class="mt-8 grid gap-4 sm:grid-cols-2 sm:gap-6 md:grid-cols-3 md:gap-8">
                @foreach($roles as $role)
                    <a href="#" class="group flex flex-col justify-between p-4 border border-secondary-200 hover:bg-secondary-50 rounded-md overflow-hidden focus:border-secondary-300 focus:outline-none transition duration-200 ease-in-out">
                        <div class="flex items-center justify-between">
                            <span class="text-xs leading-4 text-secondary-400 font-semibold uppercase tracking-wider">{{ $role->users->count() }} {{ \Illuminate\Support\Str::plural(__('Account'), $role->users->count()) }}</span>
                            <div class="flex overflow-hidden ml-4">
                                @foreach($role->users as $admin)
                                    <img class="{{ $loop->first ? '' : '-ml-1' }} inline-block h-6 w-6 rounded-full text-white shadow-solid" src="{{ $admin->profile_photo_url }}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <h3 class="mt-4 text-secondary-900 text-lg leading-6 font-medium">{{ $role->display_name }}</h3>
                            <p class="mt-1 flex items-center text-sm text-primary-600 group-hover:text-primary-500 transition duration-200 ease-in-out">
                                {{ __('View details') }}
                                <span class="ml-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </span>
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <div class="bg-white p-4 sm:p-6 rounded-lg shadow-md overflow-hidden">
            <div class="pb-6 space-y-3 sm:flex sm:items-center sm:justify-between sm:space-x-4 sm:space-y-0">
                <div class="flex-1 min-w-0 max-w-2xl">
                    <h2 class="text-lg leading-6 font-medium text-gray-900">{{ __('Administrators accounts') }}</h2>
                    <p class="mt-3 text-gray-500 leading-6 text-base">
                        {{ __('These are the members who are already in your store with their associated roles. You can assign new roles to existing member here.') }}
                    </p>
                </div>
                <div>
                    <a href="{{ route('cp.settings.users.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                        <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                        {{ __('Add administrator') }}
                    </a>
                </div>
            </div>
            <div class="mt-6 rounded-md border border-gray-200">
                <div class="overflow-x-auto">
                    <div class="align-middle inline-block min-w-full">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider rounded-t-md">
                                        <span class="lg:pl-2">{{ __('Name') }}</span>
                                    </th>
                                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Email Address') }}
                                    </th>
                                    <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Role') }}
                                    </th>
                                    <th class="hidden md:table-cell px-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        {{ __('Access') }}
                                    </th>
                                    <th class="pr-6 py-3 border-b border-gray-200 bg-gray-50 text-right text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider rounded-t-md"></th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-100" x-max="1">
                                @foreach($users as $user)
                                    <tr>
                                        <td class="px-6 py-3 whitespace-no-wrap text-sm leading-5 font-medium text-gray-900">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        {{ $user->full_name }}
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500 font-normal">
                                                        {{ __('Registered on') }} <time datetime="{{ $user->created_at->format('Y-m-d') }}" class="capitalize">{{ $user->created_at->formatLocalized('%d %B %Y') }}</time>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-3 text-sm leading-5 text-gray-500">
                                            <div class="flex items-center">
                                                @if($user->email_verified_at)
                                                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                                    </svg>
                                                @else
                                                    <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M10 1.944A11.954 11.954 0 012.166 5C2.056 5.649 2 6.319 2 7c0 5.225 3.34 9.67 8 11.317C14.66 16.67 18 12.225 18 7c0-.682-.057-1.35-.166-2.001A11.954 11.954 0 0110 1.944zM11 14a1 1 0 11-2 0 1 1 0 012 0zm0-7a1 1 0 10-2 0v3a1 1 0 102 0V7z" clip-rule="evenodd" />
                                                    </svg>
                                                @endif
                                                <span class="ml-1.5">{{ $user->email }}</span>
                                            </div>
                                        </td>
                                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-gray-500 text-right">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800">
                                                {{ $user->roles_label }}
                                            </span>
                                        </td>
                                        <td class="hidden md:table-cell px-6 py-3 whitespace-no-wrap text-sm leading-5 text-gray-500 text-right">
                                            {{ $user->hasRole(config('starterkit.core.config.users.admin_role')) ? __('Full') : __('Limited') }}
                                        </td>
                                        <td class="pr-6 text-right">
                                            @if($user->id === auth()->id())
                                                <span class="flex items-center text-sm text-gray-500 leading-5 text-right">
                                                    <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                    </svg>
                                                    {{ __('Me') }}
                                                </span>
                                            @endif

                                            @if(auth()->user()->isAdmin() && ! $user->isAdmin())
                                                <div x-data="{ open: false }"
                                                     x-on:user-removed.window="open = false"
                                                     @keydown.escape="open = false"
                                                     @click.away="open = false"
                                                     class="relative flex justify-end items-center"
                                                >
                                                    <button aria-has-popup="true"
                                                            :aria-expanded="open"
                                                            type="button"
                                                            @click="open = ! open"
                                                            class="w-8 h-8 inline-flex items-center justify-center text-gray-400 rounded-full bg-transparent hover:text-gray-500 focus:outline-none focus:text-gray-500 focus:bg-gray-100 transition ease-in-out duration-150"
                                                    >
                                                        <x-heroicon-o-dots-vertical class="w-5 h-5"/>
                                                    </button>
                                                    <div x-show="open"
                                                         x-transition:enter="transition ease-out duration-100"
                                                         x-transition:enter-start="transform opacity-0 scale-95"
                                                         x-transition:enter-end="transform opacity-100 scale-100"
                                                         x-transition:leave="transition ease-in duration-75"
                                                         x-transition:leave-start="transform opacity-100 scale-100"
                                                         x-transition:leave-end="transform opacity-0 scale-95"
                                                         class="mx-3 origin-top-right absolute right-7 top-0 w-48 mt-1 rounded-md shadow-lg" style="display: none;"
                                                    >
                                                        <div class="z-10 rounded-md bg-white shadow-xs" role="menu" aria-orientation="vertical" aria-labelledby="project-options-menu-0">
                                                            <div class="py-1">
                                                                <button type="button" class="group w-full flex items-center px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus:bg-gray-100 focus:text-gray-900" role="menuitem">
                                                                    <x-heroicon-s-trash class="mr-3 h-5 w-5 text-gray-400 group-hover:text-gray-500 group-focus:text-gray-500"/>
                                                                    {{ __('Delete') }}
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="rounded-b-md bg-white px-4 py-3 flex items-center justify-between sm:px-6 border-t border-gray-200">
                        {{ $users->links() }}
                        <div class="flex-1 flex justify-between sm:hidden">
                            {{ $users->links('components.wire-mobile-pagination-links') }}
                        </div>
                        <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm leading-5 text-gray-700">
                                    {{ __('Showing') }}
                                    <span class="font-medium">{{ ($users->currentPage() - 1) * $users->perPage() + 1 }}</span>
                                    {{ __('to') }}
                                    <span class="font-medium">{{ ($users->currentPage() - 1) * $users->perPage() + count($users->items()) }}</span>
                                    {{ __('of') }}
                                    <span class="font-medium"> {!! $users->total() !!}</span>
                                    {{ __('results') }}
                                </p>
                            </div>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
