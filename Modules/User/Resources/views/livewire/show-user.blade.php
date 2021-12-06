<div>
    <x-page-header class="py-6">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-bold leading-6 text-secondary-900 sm:truncate sm:text-3xl">
                {{ $user->full_name }}
            </h2>
        </div>
    </x-page-header>

    <div class="grid gap-6 sm:grid-cols-5 sm:gap-10">
        <div class="sm:col-span-3 space-y-10">
            <div class="bg-white divide-y divide-secondary-200 rounded-md shadow-md overflow-hidden">
                <div class="flex">
                    <div class="flex items-center justify-center px-3 py-4 bg-secondary-100">
                        <x-heroicon-s-user class="h-6 w-6 text-secondary-300" />
                    </div>
                    <div class="flex-1 px-4 py-2 flex items-center justify-between">
                        <div class="flex-1 flex items-center space-x-2">
                            <span class="text-secondary-900 text-sm">{{ $user->full_name }}</span>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium border border-secondary-200 text-secondary-400">
                                {{ $user->formatted_gender }}
                            </span>
                        </div>
                        <button type="button" class="text-secondary-400 text-sm leading-5 tracking-tight hover:underline hover:text-secondary-500">{{ __('Edit') }}</button>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex items-center justify-center px-3 py-4 bg-secondary-100">
                        <x-heroicon-s-calendar class="h-6 w-6 text-secondary-300" />
                    </div>
                    <div class="flex-1 px-4 py-2 flex items-center justify-between">
                        <div class="flex-1">
                            <span class="text-secondary-900 text-sm">{{ __('Member since :date', ['date' => $user->joinedAt()?->format('M j, Y')]) }}</span>
                        </div>
                        <button type="button" class="text-secondary-400 text-sm leading-5 tracking-tight hover:underline hover:text-secondary-500">{{ __('Edit') }}</button>
                    </div>
                </div>
                <div class="flex">
                    <div class="flex items-center justify-center px-3 py-4 bg-secondary-100">
                        <x-heroicon-s-document class="h-6 w-6 text-secondary-300" />
                    </div>
                    <div class="flex-1 px-4 py-2 flex items-center justify-between">
                        <div class="flex-1">
                            <span class="text-secondary-500 text-sm">{{ __('Notes') }}</span>
                        </div>
                        <button type="button" class="text-secondary-400 text-sm leading-5 tracking-tight hover:underline hover:text-secondary-500">{{ __('Edit') }}</button>
                    </div>
                </div>
            </div>
            <div>
                <h3 class="text-sm leading-5 text-primary-500 font-medium">{{ __('Milestones') }}</h3>
                <div class="mt-2 bg-white divide-y divide-secondary-200 rounded-md shadow-sm overflow-hidden">

                </div>
            </div>
        </div>
        <div class="sm:col-span-2"></div>
    </div>
</div>
