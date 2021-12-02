@props(['link' => null])

@if($link)
    <a href="{{ $link }}" {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-secondary-300 shadow-sm font-semibold text-xs uppercase tracking-widest rounded-md text-secondary-700 bg-white hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 border border-secondary-300 shadow-sm font-semibold text-xs uppercase tracking-widest rounded-md text-secondary-700 bg-white hover:bg-secondary-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-500 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@endif
