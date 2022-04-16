<div>
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
                <span aria-current="page" class="ml-4 text-sm font-medium text-secondary-500">{{ __('New event') }}</span>
            </div>
        </li>
    </x-breadcrumb>

    <x-page-header class="border-b border-secondary-200 py-4">
        <div class="flex-1 min-w-0">
            <h2 class="text-lg font-semibold leading-6 text-secondary-900 sm:truncate sm:text-xl">
                {{ __('Create new event') }}
            </h2>
        </div>
    </x-page-header>

    <form method="POST" wire:submit.prevent="store">
        <main class="max-w-4xl mx-auto px-4 lg:pb-16 divide-y divide-secondary-200">
            <div class="p-4 sm:px-6 sm:py-10">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <x-icons.text class="h-8 w-8 text-secondary-400" />
                    </div>
                    <div class="ml-6">
                        <div>
                            <dt class="text-xl leading-7 font-semibold text-secondary-900">
                                {{ __('Basic Info') }}
                            </dt>
                            <dd class="max-w-lg mt-2 text-sm leading-5 text-secondary-500">
                                {{ __('Name your event and tell event-goers why they should come. Add details that highlight what makes it unique.') }}
                            </dd>
                        </div>
                        <div class="mt-6 grid gap-4 sm:grid-cols-2 sm:gap-5">
                            <x-forms.group class="sm:col-span-2" label="Event Title" for="title" :error="$errors->first('title')">
                                <x-forms.input type="text" wire:model.defer="title" id="title" />
                            </x-forms.group>
                            <x-forms.group class="sm:col-span-2" label="Event Description" for="description" :error="$errors->first('description')">
                                <livewire:dashboard::forms.trix />
                            </x-forms.group>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:px-6 sm:py-10">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <x-icons.calendar class="h-8 w-8 text-secondary-400"/>
                    </div>
                    <div class="ml-6 flex-1">
                        <div>
                            <dt class="text-xl leading-7 font-semibold text-secondary-900">
                                {{ __('Date') }}
                            </dt>
                            <dd class="max-w-lg mt-2 text-sm leading-5 text-secondary-500">
                                {{ __('Tell event-goers when your event starts and ends so they can make plans to attend.') }}
                            </dd>
                        </div>
                        <div class="mt-6 grid gap-4 sm:grid-cols-2 sm:gap-5 max-w-2xl">
                            <div class="sm:col-span-1">
                                <x-datetime-picker
                                    :label="__('Event Start')"
                                    wire:model.defer="start_date"
                                    parse-format="YYYY-MM-DD HH:mm"
                                    time-format="24"
                                    without-timezone
                                />
                            </div>

                            <div class="sm:col-span-1">
                                <x-datetime-picker
                                    :label="__('Event End')"
                                    wire:model.defer="end_date"
                                    parse-format="YYYY-MM-DD HH:mm"
                                    time-format="24"
                                    without-timezone
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="p-4 sm:px-6 sm:py-10">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <div x-data="{ on: @entangle('is_visible') }" class="ml-6 flex-grow">
                        <div class="flex-grow flex items-center justify-between">
                            <div>
                                <dt class="text-xl leading-7 font-semibold text-secondary-900">
                                    {{ __('Visibility') }}
                                </dt>
                                <dd class="max-w-sm mt-1 text-sm leading-5 text-secondary-500">
                                    {{ __('Enter the visibility of this event to make it available or not for users.') }}
                                </dd>
                            </div>
                            <button type="button" class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 bg-secondary-200" aria-pressed="false" x-ref="switch" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'bg-primary-600': on, 'bg-secondary-200': !(on) }" aria-labelledby="availability-label" :aria-pressed="on.toString()" @click="on = !on">
                                <span class="sr-only">{{ __('Use setting') }}</span>
                                <span aria-hidden="true" class="pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200 translate-x-0" x-state:on="Enabled" x-state:off="Not Enabled" :class="{ 'translate-x-5': on, 'translate-x-0': !(on) }"></span>
                            </button>
                        </div>
                        <div class="mt-6">
                            <fieldset x-data="radioGroup()">
                                <legend class="text-sm font-medium text-secondary-900">
                                    {{ __('Privacy') }}
                                </legend>

                                <div class="mt-1 bg-white rounded-md shadow-sm -space-y-px" x-ref="radiogroup">
                                    <div :class="{ 'border-secondary-200': !(active === 0), 'bg-primary-50 border-primary-200 z-10': active === 0 }" class="relative border rounded-tl-md rounded-tr-md p-4 flex bg-primary-50 border-primary-200 z-10">
                                        <div class="flex items-center h-5">
                                            <input wire:model.defer="privacy" id="settings-option-0" name="privacy_setting" type="radio" @click="select(0)" @keydown.space="select(0)" @keydown.arrow-up="onArrowUp(0)" @keydown.arrow-down="onArrowDown(0)" class="h-4 w-4 text-primary-600 cursor-pointer focus:ring-primary-500 border-secondary-300" value="public">
                                        </div>
                                        <label for="settings-option-0" class="ml-3 flex flex-col cursor-pointer">
                                            <span :class="{ 'text-primary-900': active === 0, 'text-secondary-900': !(active === 0) }" class="block text-sm font-medium text-primary-900">
                                                {{ __('Public access') }}
                                            </span>
                                            <span :class="{ 'text-primary-700': active === 0, 'text-secondary-500': !(active === 0) }" class="block text-sm text-primary-700">
                                                {{ __('This event would be available to anyone who has need to come') }}
                                            </span>
                                        </label>
                                    </div>

                                    <div :class="{ 'border-secondary-200': !(active === 1), 'bg-primary-50 border-primary-200 z-10': active === 1 }" class="relative border p-4 flex border-secondary-200">
                                        <div class="flex items-center h-5">
                                            <input wire:model.defer="privacy" id="settings-option-1" name="privacy_setting" type="radio" @click="select(1)" @keydown.space="select(1)" @keydown.arrow-up="onArrowUp(1)" @keydown.arrow-down="onArrowDown(1)" class="h-4 w-4 text-primary-600 cursor-pointer focus:ring-primary-500 border-secondary-300" value="private">
                                        </div>
                                        <label for="settings-option-1" class="ml-3 flex flex-col cursor-pointer">
                                            <span :class="{ 'text-primary-900': active === 1, 'text-secondary-900': !(active === 1) }" class="block text-sm font-medium text-secondary-900">
                                                {{ __('Private to Church Members') }}
                                            </span>
                                            <span :class="{ 'text-primary-700': active === 1, 'text-secondary-500': !(active === 1) }" class="block text-sm text-secondary-500">
                                                {{ __('Only members of the church would be able to access') }}
                                            </span>
                                        </label>
                                    </div>

                                    <div :class="{ 'border-secondary-200': !(active === 2), 'bg-primary-50 border-primary-200 z-10': active === 2 }" class="relative border rounded-bl-md rounded-br-md p-4 flex border-secondary-200">
                                        <div class="flex items-center h-5">
                                            <input wire:model.defer="privacy" id="settings-option-2" name="privacy_setting" type="radio" @click="select(2)" @keydown.space="select(2)" @keydown.arrow-up="onArrowUp(2)" @keydown.arrow-down="onArrowDown(2)" class="h-4 w-4 text-primary-600 cursor-pointer focus:ring-primary-500 border-secondary-300" value="invitation">
                                        </div>
                                        <label for="settings-option-2" class="ml-3 flex flex-col cursor-pointer">
                                            <span :class="{ 'text-primary-900': active === 2, 'text-secondary-900': !(active === 2) }" class="block text-sm font-medium text-secondary-900">
                                                {{ __('By invitation') }}
                                            </span>
                                            <span :class="{ 'text-primary-700': active === 2, 'text-secondary-500': !(active === 2) }" class="block text-sm text-secondary-500">
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
            {{--<div class="p-4 sm:px-6 sm:py-10">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-8 w-8 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <div class="ml-6 w-full flex-1">
                        <div>
                            <dt class="text-xl leading-7 font-semibold text-secondary-900">
                                {{ __('Cover Image') }}
                            </dt>
                            <dd class="max-w-lg mt-2 text-sm leading-5 text-secondary-500">
                                {{ __('Add a cover image to your event.') }}
                            </dd>
                        </div>
                        <div class="mt-6 w-full">
                            <x-media-library-attachment name="cover" rules="mimes:jpeg,png" />
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="py-6 sm:py-10">
                <div class="flex justify-end">
                    <x-default-button :link="route('cp.events')">
                        {{ __('Cancel') }}
                    </x-default-button>
                    <x-button primary type="submit" class="ml-3" wire:loading.attr="disabled">
                        <x-loader class="text-white" wire:target="store" />
                        {{ __('Create Event') }}
                    </x-button>
                </div>
            </div>
        </main>
    </form>
</div>

@push('scripts')
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
