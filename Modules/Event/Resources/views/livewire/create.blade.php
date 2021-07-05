@push('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endpush

<div>
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

    <x-page-header class="bg-gray-50">
        <div class="flex-1 min-w-0">
            <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">
                {{ __('Create new event') }}
            </h1>
        </div>
    </x-page-header>

    <main class="max-w-2xl mx-auto px-4 lg:pb-16 divide-y divide-gray-200">
        <div class="p-4 sm:px-6 sm:py-10">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2 2v3h1V3h5v10H6v1h5v-1H9V3h5v2h1V2H2z" />
                        <g fill-rule="evenodd" clip-rule="evenodd">
                            <path d="M15 9h7v1h-7zM15 13h7v1h-7zM6 17h16v1H6zM6 21h16v1H6z" />
                        </g>
                    </svg>
                </div>
                <div class="ml-6">
                    <div>
                        <dt class="text-xl leading-7 font-semibold text-gray-900">
                            {{ __('Basic Info') }}
                        </dt>
                        <dd class="max-w-lg mt-2 text-sm leading-5 text-gray-500">
                            {{ __('Name your event and tell event-goers why they should come. Add details that highlight what makes it unique.') }}
                        </dd>
                    </div>
                    <div class="mt-6 grid gap-4 sm:grid-cols-2 sm:gap-5">
                        <x-forms.group class="sm:col-span-2" label="Event Title" for="title" :error="$errors->first('title')">
                            <x-forms.input type="text" wire:model.defer="title" id="title" />
                        </x-forms.group>
                        <x-forms.group wire:ignore class="sm:col-span-2" label="Event Description" for="description" :error="$errors->first('description')">
                            <x-trix name="description" wire:model="description" styling="block w-full rounded-md shadow-sm border-gray-300 focus:border-purple-300 focus:ring focus:ring-purple-200 focus:ring-opacity-50 sm:text-sm" />
                        </x-forms.group>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 sm:px-6 sm:py-10">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-gray-400" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M12 19a1 1 0 1 0-1-1 1 1 0 0 0 1 1zm5 0a1 1 0 1 0-1-1 1 1 0 0 0 1 1zm0-4a1 1 0 1 0-1-1 1 1 0 0 0 1 1zm-5 0a1 1 0 1 0-1-1 1 1 0 0 0 1 1zm7-12h-1V2a1 1 0 0 0-2 0v1H8V2a1 1 0 0 0-2 0v1H5a3 3 0 0 0-3 3v14a3 3 0 0 0 3 3h14a3 3 0 0 0 3-3V6a3 3 0 0 0-3-3zm1 17a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-9h16zm0-11H4V6a1 1 0 0 1 1-1h1v1a1 1 0 0 0 2 0V5h8v1a1 1 0 0 0 2 0V5h1a1 1 0 0 1 1 1zM7 15a1 1 0 1 0-1-1 1 1 0 0 0 1 1zm0 4a1 1 0 1 0-1-1 1 1 0 0 0 1 1z"/>
                    </svg>
                </div>
                <div class="ml-6">
                    <div>
                        <dt class="text-xl leading-7 font-semibold text-gray-900">
                            {{ __('Date') }}
                        </dt>
                        <dd class="max-w-lg mt-2 text-sm leading-5 text-gray-500">
                            {{ __('Tell event-goers when your event starts and ends so they can make plans to attend.') }}
                        </dd>
                    </div>
                    <div
                        x-data
                        x-init="
                            flatpickr('.date', { minDate: 'today', dateFormat: 'Y-m-d' });
                            flatpickr($refs.datepicker, { minDate: 'today', dateFormat: 'Y-m-d' });
                        "
                        class="mt-6 grid gap-4 sm:grid-cols-2 sm:gap-5"
                    >
                        <x-forms.group class="sm:col-span-1" label="Event Start" for="start_date" :error="$errors->first('start_date')">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <x-forms.input type="text" wire:model.defer="start_date" id="start_date" class="pl-10 date" readOnly />
                        </x-forms.group>

                        <x-forms.group class="sm:col-span-1" label="Event End" for="end_date" :error="$errors->first('end_date')">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <x-forms.input type="text" wire:model.defer="end_date" x-ref="datepicker" id="end_date" class="pl-10" readOnly />
                        </x-forms.group>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 sm:px-6 sm:py-10">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <div x-data="{ on: @entangle('is_visible') }" class="ml-6 flex-grow">
                    <div class="flex-grow flex items-center justify-between">
                        <div>
                            <dt class="text-xl leading-7 font-semibold text-gray-900">
                                {{ __('Visibility') }}
                            </dt>
                            <dd class="max-w-sm mt-1 text-sm leading-5 text-gray-500">
                                {{ __('Enter the visibility of this event to make it available or not for users.') }}
                            </dd>
                        </div>
                        <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 bg-gray-200" aria-pressed="false" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-purple-600': on, 'bg-gray-200': !(on) }" aria-labelledby="availability-label" :aria-pressed="on.toString()" @click="on = !on">
                            <span class="sr-only">{{ __('Use setting') }}</span>
                            <span aria-hidden="true" class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
                        </button>
                    </div>
                    <div class="mt-6">
                        <fieldset x-data="radioGroup()">
                            <legend class="text-sm font-medium text-gray-900">
                                {{ __('Privacy') }}
                            </legend>

                            <div class="mt-1 bg-white rounded-md shadow-sm -space-y-px" x-ref="radiogroup">

                                <div :class="{ 'border-gray-200': !(active === 0), 'bg-purple-50 border-purple-200 z-10': active === 0 }" class="relative border rounded-tl-md rounded-tr-md p-4 flex bg-purple-50 border-purple-200 z-10">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="privacy" id="settings-option-0" name="privacy_setting" type="radio" @click="select(0)" @keydown.space="select(0)" @keydown.arrow-up="onArrowUp(0)" @keydown.arrow-down="onArrowDown(0)" class="h-4 w-4 text-purple-600 cursor-pointer focus:ring-purple-500 border-gray-300" value="public">
                                    </div>
                                    <label for="settings-option-0" class="ml-3 flex flex-col cursor-pointer">
                                        <span :class="{ 'text-purple-900': active === 0, 'text-gray-900': !(active === 0) }" class="block text-sm font-medium text-purple-900">
                                            {{ __('Public access') }}
                                        </span>
                                        <span :class="{ 'text-purple-700': active === 0, 'text-gray-500': !(active === 0) }" class="block text-sm text-purple-700">
                                            {{ __('This event would be available to anyone who has need to come') }}
                                        </span>
                                    </label>
                                </div>

                                <div :class="{ 'border-gray-200': !(active === 1), 'bg-purple-50 border-purple-200 z-10': active === 1 }" class="relative border p-4 flex border-gray-200">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="privacy" id="settings-option-1" name="privacy_setting" type="radio" @click="select(1)" @keydown.space="select(1)" @keydown.arrow-up="onArrowUp(1)" @keydown.arrow-down="onArrowDown(1)" class="h-4 w-4 text-purple-600 cursor-pointer focus:ring-purple-500 border-gray-300" value="private">
                                    </div>
                                    <label for="settings-option-1" class="ml-3 flex flex-col cursor-pointer">
                                        <span :class="{ 'text-purple-900': active === 1, 'text-gray-900': !(active === 1) }" class="block text-sm font-medium text-gray-900">
                                            {{ __('Private to Church Members') }}
                                        </span>
                                        <span :class="{ 'text-purple-700': active === 1, 'text-gray-500': !(active === 1) }" class="block text-sm text-gray-500">
                                            {{ __('Only members of the church would be able to access') }}
                                        </span>
                                    </label>
                                </div>

                                <div :class="{ 'border-gray-200': !(active === 2), 'bg-purple-50 border-purple-200 z-10': active === 2 }" class="relative border rounded-bl-md rounded-br-md p-4 flex border-gray-200">
                                    <div class="flex items-center h-5">
                                        <input wire:model.defer="privacy" id="settings-option-2" name="privacy_setting" type="radio" @click="select(2)" @keydown.space="select(2)" @keydown.arrow-up="onArrowUp(2)" @keydown.arrow-down="onArrowDown(2)" class="h-4 w-4 text-purple-600 cursor-pointer focus:ring-purple-500 border-gray-300" value="invitation">
                                    </div>
                                    <label for="settings-option-2" class="ml-3 flex flex-col cursor-pointer">
                                        <span :class="{ 'text-purple-900': active === 2, 'text-gray-900': !(active === 2) }" class="block text-sm font-medium text-gray-900">
                                            {{ __('By invitation') }}
                                        </span>
                                        <span :class="{ 'text-purple-700': active === 2, 'text-gray-500': !(active === 2) }" class="block text-sm text-gray-500">
                                            {{ __('Only people who have received an invitation could attend this event') }}
                                        </span>
                                    </label>
                                </div>

                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-4 sm:px-6 sm:py-10">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-6">
                    <div>
                        <dt class="text-xl leading-7 font-semibold text-gray-900">
                            {{ __('Cover Image') }}
                        </dt>
                        <dd class="max-w-lg mt-2 text-sm leading-5 text-gray-500">
                            {{ __('Add a cover image to your event.') }}
                        </dd>
                    </div>
                    <div class="mt-6 w-full">
                        <x-media-library-attachment name="cover" rules="mimes:jpeg,png" />
                    </div>
                </div>
            </div>
        </div>

        <div class="py-6 sm:py-10">
            <div class="flex justify-end">
                <x-cancel-button type="link" href="{{ route('admin.events') }}">
                    {{ __('Cancel') }}
                </x-cancel-button>
                <x-button wire:click="store" type="button" class="ml-3">
                    <x-loader wire:target="store" />
                    {{ __('Create Event') }}
                </x-button>
            </div>
        </div>
    </main>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        function radioGroup() {
            return {
                active: 0,
                onArrowUp(index) {
                    this.select(this.active - 1 < 0 ? this.$refs.radiogroup.children.length - 1 : this.active - 1);
                },
                onArrowDown(index) {
                    this.select(this.active + 1 > this.$refs.radiogroup.children.length - 1 ? 0 : this.active + 1);
                },
                select(index) {
                    this.active = index;
                },
            };
        }
    </script>
@endpush
