@extends('layouts.cp')
@title(__('Detail event ~ :name', ['name' => $event->title]))

@section('content')

    <x-breadcrumb>

        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <a href="{{ route('cp.events') }}" class="ml-4 text-sm font-medium text-secondary-500 hover:text-secondary-700">{{ __('Events') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <span aria-current="page" class="ml-4 text-sm font-medium text-secondary-500">{{ $event->title }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <x-page-header class="border-b border-secondary-200 pt-4">
        <div class="flex-1">
            <div class="flex items-center justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-lg font-bold leading-7 text-secondary-900 sm:text-xl sm:truncate">
                        {{ $event->title }}
                    </h2>
                </div>
                <div class="mt-4 flex md:mt-0 md:ml-4">
                    <x-default-button :link="route('cp.events.edit', $event)">
                        {{ __('Edit') }}
                    </x-default-button>
                    <x-danger-button type="button" class="ml-3">
                        {{ __('Delete') }}
                    </x-danger-button>
                </div>
            </div>

            <div x-data="{
                    activeTab: 'brief',
                    tabs: ['brief', 'invites', 'pictures']
                }"
                 class="mt-4"
            >
                <div class="sm:hidden">
                    <label for="tabs" class="sr-only">{{ __('Select a tab') }}</label>
                    <x-forms.select x-model="activeTab" aria-label="Selected tab" class="block w-full pl-3 pr-10 py-2">
                        <template x-for="tab in tabs" :key="tab">
                            <option
                                x-bind:value="tab"
                                x-text="capitalize(tab)"
                                x-bind:selected="tab === activeTab"
                            ></option>
                        </template>
                    </x-forms.select>
                </div>
                <div class="hidden sm:block">
                    <nav class="flex -mb-px space-x-4" aria-label="Tabs">
                        <template x-for="tab in tabs" :key="tab">
                            <button
                                type="button"
                                @click="activeTab = tab"
                                class="text-secondary-500 hover:text-secondary-700 px-3 py-2 font-medium text-sm rounded-md focus:outline-none"
                                :class="{ 'bg-gray-100 text-secondary-700': activeTab === tab}"
                                x-text="capitalize(tab)"
                            ></button>
                        </template>
                    </nav>
                </div>
            </div>
        </div>
    </x-page-header>

@endsection
