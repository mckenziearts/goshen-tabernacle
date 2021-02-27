@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md transition duration-150 ease-in-out'
            : 'text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
