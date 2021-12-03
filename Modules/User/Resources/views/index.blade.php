@extends('layouts.cp')
@title(__('All users'))

@section('content')

    <x-page-header>
        <div class="flex-1 min-w-0">
            <h1 class="text-2xl font-semibold leading-6 text-secondary-900 sm:truncate sm:text-3xl">
                {{ __('Users') }}
            </h1>
            <p class="mt-1 max-w-2xl text-sm text-secondary-500">{{ __('All available users') }}</p>
        </div>
        <div class="mt-4 flex sm:mt-0">
            <a href="{{ route('cp.users.create') }}" class="order-0 inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">
                {{ __('Create') }}
            </a>
        </div>
    </x-page-header>



@endsection
