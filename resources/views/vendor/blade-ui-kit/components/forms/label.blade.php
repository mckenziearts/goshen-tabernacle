<label for="{{ $for }}" {{ $attributes->merge(['class' => 'block text-sm font-medium leading-5 text-gray-500']) }}>
    {{ $slot->isNotEmpty() ? $slot : $fallback }}
</label>
