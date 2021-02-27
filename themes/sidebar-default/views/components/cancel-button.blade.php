@props(['type' => 'button'])

@if($type === 'button')
    <button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest focus:outline-none focus:border-purple-900 focus:ring ring-purple-300 hover:bg-gray-50 active:bg-gray-100 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </button>
@else
    <a {{ $attributes->merge(['class' => 'inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest focus:outline-none focus:border-purple-900 focus:ring ring-purple-300 hover:bg-gray-50 active:bg-gray-100 transition ease-in-out duration-150']) }}>
        {{ $slot }}
    </a>
@endif
