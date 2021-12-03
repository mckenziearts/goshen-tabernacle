@extends('layouts.cp')
@title(__('Create new user'))

@push('styles')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.6.0/mapbox-gl.css' rel='stylesheet' />
@endpush

@section('content')

    <x-breadcrumb>

        <li class="flex">
            <div class="flex items-center">
                <a href="{{ route('cp.users') }}" class="ml-4 text-sm font-medium text-secondary-500 hover:text-secondary-700">{{ __('Users') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 h-5 w-5 text-secondary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                    <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                </svg>
                <span aria-current="page" class="ml-4 text-sm font-medium text-secondary-500">{{ __('New user') }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <x-page-header class="border-b border-secondary-200 py-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-semibold leading-6 text-secondary-900 sm:truncate sm:text-xl">
                {{ __('Create new member') }}
            </h2>
        </div>
    </x-page-header>

    <form class="mt-6 space-y-8 divide-y divide-secondary-200" method="POST" action="{{ route('cp.users.store') }}">
        <div class="space-y-8 divide-y divide-secondary-200 sm:space-y-5">
            <div>
                @csrf
                <div>
                    <h3 class="text-lg leading-6 font-medium text-secondary-900">
                        {{ __('Profile') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-secondary-500">
                        {{ __('This information will be displayed publicly so be careful what you share.') }}
                    </p>
                </div>

                <div class="mt-6 sm:mt-5 space-y-6 sm:space-y-5">

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="first_name" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('First name') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="text" name="first_name" id="first_name" autocomplete="given-name" class="max-w-lg" required />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="last_name" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Last name') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="text" name="last_name" id="last_name" autocomplete="family-name" class="max-w-lg" required />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="photo" class="block text-sm font-medium text-secondary-700">
                            {{ __('Photo') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2 max-w-lg">
                            <x-media-library-attachment name="avatar" rules="mimes:jpeg,png" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="last_name" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Profession') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="text" name="profession" id="profession" class="max-w-lg" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <label for="gender" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Gender') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.select id="gender" name="gender" autocomplete="gender-name" class="max-w-xs">
                                <option value="male">{{ __('Male') }}</option>
                                <option value="female">{{ __('Female') }}</option>
                            </x-forms.select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-secondary-900">
                        {{ __('Personal Information') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-secondary-500">
                        {{ __('Use a permanent address where you can receive mail.') }}
                    </p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="email" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Email address') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="email" name="email" id="email" autocomplete="email" class="max-w-lg" required />
                        </div>
                    </div>

                    <div x-data="internationalNumber('#phone_number')" class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="phone_number" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Phone number') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="tel" name="phone_number" id="phone_number" class="max-w-lg" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="city" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Location') }}
                        </label>
                        <div class="mt-1 space-y-5 sm:mt-0 sm:col-span-2" x-data="mapBox($refs.mapbox, '{{ env('MAPBOX_PUBLIC_TOKEN') }}')">
                            <div class="sm:col-span-2">
                                <div x-ref="mapbox" class="bg-secondary-100 rounded-md h-[350px] overflow-hidden outline-none"></div>
                            </div>

                            <div class="max-w-sm grid gap-4 sm:grid-cols-2 sm:gap-5">
                                <div class="relative">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <x-heroicon-o-location-marker class="h-5 w-5 text-secondary-400"/>
                                    </div>
                                    <x-forms.input type="text" class="pr-10" name="latitude" x-model="lat" placeholder="4.68985" readonly/>
                                </div>

                                <div class="relative">
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <x-heroicon-o-location-marker class="h-5 w-5 text-secondary-400"/>
                                    </div>
                                    <x-forms.input type="text" class="pr-10" name="longitude" x-model="lng" placeholder="9.65874" readonly/>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="city" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('City') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="text" name="city" id="city" class="max-w-lg" autocomplete="city-name" placeholder="Douala" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="address" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Neighborhood') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="text" name="address" id="address" class="max-w-lg" autocomplete="street-name" placeholder="Akwa, Mboppi" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="divide-y divide-secondary-200 pt-8 space-y-6 sm:pt-10 sm:space-y-5">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-secondary-900">
                        {{ __('Additional Information') }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm text-secondary-500">
                        {{ __('Information that is not dependent and mostly related to the user.') }}
                    </p>
                </div>
                <div class="space-y-6 sm:space-y-5">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="birth_date" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Birth date') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="date" name="birth_date" id="birth_date" class="max-w-xs" />
                        </div>
                    </div>

                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-secondary-200 sm:pt-5">
                        <label for="joined_at" class="block text-sm font-medium text-secondary-700 sm:mt-px sm:pt-2">
                            {{ __('Joined date') }}
                        </label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <x-forms.input type="date" name="joined_at" id="joined_at" class="max-w-xs" />
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <x-default-button :link="route('cp.users')">
                    {{ __('Cancel') }}
                </x-default-button>
                <x-button type="submit" class="ml-3">
                    {{ __('Save') }}
                </x-button>
            </div>
        </div>
    </form>


@endsection
