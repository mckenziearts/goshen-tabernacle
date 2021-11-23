@props(['active'])

@php
$classes = ($active ?? false)
            ? 'border-primary-600 text-secondary-900 group flex items-center px-3 py-2 text-sm font-medium border-r-4'
            : 'border-transparent text-secondary-600 hover:bg-secondary-50 hover:text-secondary-900 group flex items-center px-3 py-2 text-sm font-medium border-r-4';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
