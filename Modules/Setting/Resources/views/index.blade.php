@extends('layouts.cp')

@section('content')

    <x-page-header class="mb-10">
        <div class="flex-1 min-w-0">
            <h1 class="text-2xl font-semibold leading-6 text-secondary-900 sm:truncate sm:text-3xl">
                {{ __('Settings') }}
            </h1>
        </div>
    </x-page-header>

    <div class="relative grid gap-6 sm:gap-x-8 sm:grid-cols-3 -mx-4">
        <a href="#" class="p-3 -mx-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-100 transition ease-in-out duration-150">
            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                <x-heroicon-o-cog class="h-6 w-6"/>
            </div>
            <div class="space-y-1">
                <p class="text-base leading-6 font-medium text-secondary-900">
                    {{ __('General') }}
                </p>
                <p class="text-sm leading-5 text-secondary-500">
                    {{ __('View and update your store informations.') }}
                </p>
            </div>
        </a>
        <a href="{{ route('cp.settings.users') }}" class="p-3 -mx-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-100 transition ease-in-out duration-150">
            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                <x-heroicon-o-users class="h-6 w-6"/>
            </div>
            <div class="space-y-1">
                <p class="text-base leading-6 font-medium text-secondary-900">
                    {{ __('Staff & permissions') }}
                </p>
                <p class="text-sm leading-5 text-secondary-500">
                    {{ __('View and manage what staff can see or do in your store.') }}
                </p>
            </div>
        </a>
        <a href="#" class="p-3 -mx-3 flex items-start space-x-4 rounded-lg hover:bg-secondary-100 transition ease-in-out duration-150">
            <div class="flex-shrink-0 flex items-center justify-center h-10 w-10 rounded-md bg-primary-600 text-white sm:h-12 sm:w-12 ">
                <x-heroicon-o-chart-bar class="h-6 w-6" />
            </div>
            <div class="space-y-1">
                <p class="inline-flex items-center text-base leading-6 font-medium text-secondary-900">
                    <span>{{ __('Analytics') }}</span>
                </p>
                <p class="text-sm leading-5 text-secondary-500">
                    {{ __('Get a better understanding of where your traffic is coming from.') }}
                </p>
            </div>
        </a>
    </div>

@endsection
