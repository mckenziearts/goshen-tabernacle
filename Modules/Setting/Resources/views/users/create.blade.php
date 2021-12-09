@extends('layouts.cp')
@title(__('Add administrator'))

@section('content')

    <x-breadcrumb>

        <li class="flex">
            <div class="flex items-center">
                <a href="{{ route('cp.settings.users') }}" class="ml-4 text-sm font-medium text-secondary-500 hover:text-secondary-700">{{ __('Admins & Roles') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <span aria-current="page" class="ml-4 text-sm font-medium text-secondary-500">{{ __('New admin') }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <x-page-header class="border-b border-secondary-200 py-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-semibold leading-6 text-secondary-900 sm:truncate sm:text-xl">
                {{ __('Add new administrator') }}
            </h2>
        </div>
    </x-page-header>

    <livewire:setting::create-admin />

@endsection
