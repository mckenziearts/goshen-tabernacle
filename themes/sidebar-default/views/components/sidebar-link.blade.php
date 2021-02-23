@props(['active'])

@php
$classes = ($active ?? false)
            ? 'bg-gray-200 text-gray-900 group flex items-center p-2 text-sm font-medium rounded-md transition duration-150 ease-in-out'
            : 'text-gray-700 hover:text-gray-900 hover:bg-gray-50 group flex items-center p-2 text-sm font-medium rounded-md focus:outline-none transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
