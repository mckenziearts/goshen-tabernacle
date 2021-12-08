@extends('layouts.cp')
@title(__('Detail user ~ :user', ['user' => $user->full_name]))

@section('content')

    <x-breadcrumb>

        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <a href="{{ route('cp.users') }}" class="ml-4 text-sm font-medium text-secondary-500 hover:text-secondary-700">{{ __('Users') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <span aria-current="page" class="ml-4 text-sm font-medium text-secondary-500">{{ $user->full_name }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <livewire:user::show-user :user="$user" />

@endsection
