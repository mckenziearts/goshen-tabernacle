@extends('layouts.cp')
@section('title', __('Settings'))

@section('content')

    <x-page-header>
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ __('Setting') }}
            </h1>
        </div>
    </x-page-header>

    <div class="px-4 mt-6 sm:px-6 lg:px-8">
        <div class="z-20 relative grid gap-4 sm:gap-x-6 sm:gap-y-4 sm:grid-cols-3">
            <a href="#" class="p-3 -mx-3 flex items-start space-x-4 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-purple-600 text-white sm:h-12 sm:w-12 ">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                        <path d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <p class="text-base leading-6 font-medium text-gray-900">
                        {{ __("General") }}
                    </p>
                    <p class="text-sm leading-5 text-gray-500">
                        {{ __("View and update your store informations.") }}
                    </p>
                </div>
            </a>
            <a href="{{ route('admin.settings.users') }}" class="p-3 -mx-3 flex items-start space-x-4 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-purple-600 text-white sm:h-12 sm:w-12 ">
                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                        <path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <p class="text-base leading-6 font-medium text-gray-900">
                        {{ __("Staff & permissions") }}
                    </p>
                    <p class="text-sm leading-5 text-gray-500">
                        {{ __("View and manage what staff can see or do in your store.") }}
                    </p>
                </div>
            </a>
            <a href="#" class="p-3 -mx-3 flex items-start space-x-4 rounded-lg hover:bg-gray-50 transition ease-in-out duration-150">
                <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-purple-600 text-white sm:h-12 sm:w-12 ">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                    </svg>
                </div>
                <div class="space-y-1">
                    <p class="inline-flex items-center text-base leading-6 font-medium text-gray-900">
                        <span>{{ __('Analytics') }}</span>
                    </p>
                    <p class="text-sm leading-5 text-gray-500">
                        {{ __("Get a better understanding of where your traffic is coming from.") }}
                    </p>
                </div>
            </a>
        </div>
    </div>

@endsection
