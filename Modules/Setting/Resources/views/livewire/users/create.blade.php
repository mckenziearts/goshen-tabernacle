@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/intl-tel-input@17.0.3/build/css/intlTelInput.min.css">
@endpush

<div>
    <!-- Breadcrumb -->
    <x-breadcrumb>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a href="{{ route('admin.settings.index') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Settings') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <a href="{{ route('admin.settings.users') }}" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">{{ __('Administrators & roles') }}</a>
            </div>
        </li>
        <li class="flex">
            <div class="flex items-center">
                <svg class="flex-shrink-0 w-6 h-full text-gray-200" preserverAspectRatio="none" viewBox="0 0 24 44" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
                </svg>
                <span aria-current="page" class="ml-4 text-sm font-medium text-gray-500">{{ __('Create new') }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <x-page-header class="bg-gray-50">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ __('Add administrator') }}
            </h1>
        </div>
    </x-page-header>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="space-y-8 divide-y divide-gray-200">
            <div>
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ __("Login information") }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        {{ __("This information will be useful for the administrator to connect to the administration of Goshen.") }}
                    </p>
                </div>

                <div class="mt-6">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                        <x-forms.label for="email" class="sm:mt-px sm:pt-2">
                            {{ __("Email address") }} <span class="text-red-500">*</span>
                        </x-forms.label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg relative rounded-md shadow-sm">
                                <x-forms.input wire:model="email" id="email" type="email" autocomplete="off" />
                            </div>
                            @error('email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-forms.label for="password" class="sm:mt-px sm:pt-2">
                            {{ __("Password") }} <span class="text-red-500">*</span>
                        </x-forms.label>
                        <div x-data="{ show: false }" class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="flex items-center justify-between max-w-lg">
                                <button wire:click="generate" type="button" class="text-brand-500 text-sm font-medium leading-5 hover:text-brand-400 transition ease-in-out duration-150">
                                    {{ __("Generate") }}
                                </button>
                                <button
                                    @click="show = !show"
                                    x-text="show ? '{{ __("Hide") }}' : '{{ __("Show") }}'"
                                    type="button"
                                    class="text-sm text-leading-5 text-blue-600 hover:text-blue-500 focus:outline-none focus:text-blue-700 hover:underline">
                                </button>
                            </div>
                            <div class="mt-2 max-w-lg relative rounded-md shadow-sm">
                                <input wire:model="password" id="password" :type="show ? 'text' : 'password'" autocomplete="off" class="block w-full rounded-md shadow-sm border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 sm:text-sm @error('password') pr-10 border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red @enderror" />
                                @error('password')
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                @enderror
                            </div>
                            @error('password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-forms.label for="about" class="sm:mt-px sm:pt-2">
                            {{ __("Invitation") }}
                        </x-forms.label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                            <span wire:model="send_mail" role="checkbox" tabindex="0" x-on:click="$dispatch('input', !on); on = !on" @keydown.space.prevent="on = !on" :aria-checked="on.toString()" aria-checked="false" x-data="{ on: @entangle('send_mail') }" x-bind:class="{ 'bg-gray-200': !on, 'bg-purple-600': on }" class="bg-gray-200 relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                <input type="hidden" x-ref="input" aria-label="Visible" x-model="on" />
                                <span aria-hidden="true" x-bind:class="{ 'translate-x-5': on, 'translate-x-0': !on }" class="translate-x-0 pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                            </span>
                                </div>
                                <div class="ml-3 text-sm leading-5">
                                    <label for="send_mail" class="font-medium text-gray-700">{{ __("Send Invite") }}</label>
                                    <p class="text-sm text-gray-500 max-w-lg">{{ __("Send an invitation to this administrator by email with his login information.") }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 sm:pt-10">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ __("Personal Information") }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        {{ __("Information related to the admin profile.") }}
                    </p>
                </div>

                <div class="mt-6">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start">
                        <x-forms.label for="first_name" class="sm:mt-px sm:pt-2">
                            {{ __("First name") }} <span class="text-red-500">*</span>
                        </x-forms.label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <x-forms.input type="text" wire:model="first_name" id="first_name" autocomplete="off" />
                            </div>
                            @error('first_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-forms.label for="last_name" class="sm:mt-px sm:pt-2">
                            {{ __("Last name") }} <span class="text-red-500">*</span>
                        </x-forms.label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <x-forms.input type="text" wire:model="last_name" id="last_name" autocomplete="off" />
                            </div>
                            @error('last_name')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        <x-forms.label for="gender" class="sm:mt-px sm:pt-2">
                            {{ __("Gender") }}
                        </x-forms.label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <x-forms.select wire:model="gender" id="gender">
                                    <option value="male">{{ __("Male") }}</option>
                                    <option value="female">{{ __("Female") }}</option>
                                </x-forms.select>
                            </div>
                        </div>
                    </div>

                    <div
                        x-data
                        wire:ignore
                        x-init="
                            phoneNumber = document.querySelector('#phone_number');
                            iti = intlTelInput(document.querySelector('#phone_number'), {
                                nationalMode: true,
                                initialCountry: 'auto',
                                geoIpLookup: function(success, failure) {
                                    $.get('https://ipinfo.io', function() {}, 'jsonp').always(function(resp) {
                                        var countryCode = (resp && resp.country) ? resp.country : '';
                                        success(countryCode);
                                    });
                                },
                                utilsScript: 'https://unpkg.com/intl-tel-input@17.0.3/build/js/utils.js'
                            });
                            var handleChange = () => {
                                if (iti.isValidNumber()) {
                                    phoneNumber.value = iti.getNumber();
                                }
                            };
                            phoneNumber.addEventListener('change', handleChange);
                            phoneNumber.addEventListener('keyup', handleChange);
                       "
                        class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5"
                    >
                        <x-forms.label for="phone_number" class="sm:mt-px sm:pt-2">
                            {{ __("Phone number") }}
                        </x-forms.label>
                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg rounded-md shadow-sm">
                                <x-forms.input type="tel" wire:model="phone_number" id="phone_number" />
                                @error('phone_number')
                                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                        <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                @enderror
                            </div>
                            @error('phone_number')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 sm:pt-10">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                        {{ __("Role Information") }}
                    </h3>
                    <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                        {{ __("Assign roles to this administrator who will limit the actions he can do.") }}
                    </p>
                </div>

                <div class="mt-6">
                    <div>
                        <div role="group" aria-labelledby="label-notifications">
                            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                                <div>
                                    <div class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700" id="label-notifications">
                                        {{ __('Roles') }}
                                    </div>
                                </div>
                                <div class="sm:col-span-2">
                                    <div class="max-w-lg">
                                        <p class="text-sm leading-5 text-gray-500">{{ __("Choose a role for this admin") }}</p>
                                        <div class="mt-4 flex items-center space-x-4">
                                            @foreach($roles as $role)
                                                <div class="flex items-center">
                                                    <input wire:model="role_id" id="role_{{ $role->id }}" name="role_id" type="radio" class="focus:ring-purple-500 h-4 w-4 text-purple-600 border-gray-300 transition duration-150 ease-in-out" value="{{ $role->id }}">
                                                    <label for="role_{{ $role->id }}" class="ml-3 cursor-pointer">
                                                        <span class="block text-sm leading-5 font-medium text-gray-700">{{ $role->display_name ?? $role->name }}</span>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('role_id')
                                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror

                                        @if($is_admin)
                                            <div class="rounded-md bg-yellow-50 p-4 mt-6">
                                                <div class="flex">
                                                    <div class="flex-shrink-0">
                                                        <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                    </div>
                                                    <div class="ml-3">
                                                        <h3 class="text-sm leading-5 font-medium text-yellow-800">
                                                            {{ __("Attention needed") }}
                                                        </h3>
                                                        <div class="mt-2 text-sm leading-5 text-yellow-700">
                                                            <p>
                                                                {{ __("This role gives this administrator the same rights and permissions as you.") }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-8 border-t border-gray-200 pt-5">
                <div class="flex justify-end">
                    <span class="inline-flex rounded-md shadow-sm">
                        <x-cancel-button type="link" href="{{ route('admin.settings.users') }}">
                            {{ __("Cancel") }}
                        </x-cancel-button>
                    </span>
                    <span class="ml-3 inline-flex rounded-md shadow-sm">
                        <x-button wire:click="store" type="button" wire:loading.attr="disabled">
                            <x-loader wire:target="store" />
                            {{ __("Save") }}
                        </x-button>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://unpkg.com/intl-tel-input@17.0.3/build/js/intlTelInput.min.js"></script>
@endpush
