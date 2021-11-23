@props([
    'label' => false,
    'for' => false,
    'isRequired' => false,
    'error' => false,
    'helpText' => false,
])

<div {{ $attributes }}>
    @if($label)
        <label for="{{ $for }}" class="block text-sm font-medium leading-5 text-secondary-700">
            {{ __($label) }} @if($isRequired) <span class="text-red-500">*</span> @endif
        </label>
    @endif

    <div class="@if($label) mt-1 @endif relative">
        {{ $slot }}
        @if($error)
            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </div>
        @endif
    </div>
    @if ($error)
        <p class="mt-2 text-red-500 text-sm">{{ $error }}</p>
    @endif

    @if ($helpText)
        <p class="mt-2 text-sm text-secondary-500">{{ __($helpText) }}</p>
    @endif
</div>
