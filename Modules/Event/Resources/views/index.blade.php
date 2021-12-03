@extends('layouts.cp')
@title(__('Listings Events'))

@section('content')

    <x-page-header class="pb-5 border-b border-secondary-200">
        <div class="flex-1 min-w-0">
            <h1 class="text-2xl font-semibold leading-6 text-secondary-900 sm:truncate sm:text-3xl">
                {{ __('Events') }}
            </h1>
        </div>
        <div class="mt-4 flex sm:mt-0">
            <a href="{{ route('cp.events.new') }}" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                {{ __('Create') }}
            </a>
        </div>
    </x-page-header>

    <livewire:event::browse />

@endsection
