@extends('layouts.cp')
@section('title', __('Create Event'))

@section('content')

    <x-page-header>
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ __('Create new event') }}
            </h1>
        </div>
    </x-page-header>
    <!-- Breadcrumb -->
    <x-breadcrumb>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a href="{{ route('admin.events') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Events') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" preserverAspectRatio="none" viewBox="0 0 24 44" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <span aria-current="page" class="ml-4 text-sm font-medium text-gray-500">{{ __('New event') }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <livewire:event::create />

@endsection
