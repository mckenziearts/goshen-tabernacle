@once
    @push('styles')
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    @endpush
@endonce

<div
    wire:ignore
    x-data
    @trix-change="$dispatch('change', @this.set('value', $event.target.value))"
>
    <input id="{{ $trixId }}" value="{{ $value }}" type="hidden" class="sr-only">
    <trix-editor input="{{ $trixId }}" class="editor block w-full rounded-md bg-white shadow-sm border-secondary-300 focus:border-primary-300 focus:ring focus:ring-primary-200 sm:text-sm min-h-[200px] max-h-96 overflow-y-scroll"></trix-editor>
</div>

@once
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    @endpush
@endonce
