<div
    wire:ignore
    x-data
    @trix-change="$dispatch('change', @this.set('value', $event.target.value))"
>
    <input id="{{ $trixId }}" value="{{ $value }}" type="hidden" class="sr-only">
    <trix-editor input="{{ $trixId }}" class="block w-full rounded-md bg-white shadow-sm border-gray-300 focus:border-green-300 focus:ring focus:ring-green-200 sm:text-sm min-h-[200px] max-h-96 overflow-y-scroll"></trix-editor>
</div>

