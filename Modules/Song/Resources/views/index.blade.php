@extends('layouts.cp')
@title(__('Cantiques'))
@once
    @push('styles')
        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    @endpush
@endonce

@section('content')

    <div class="flex h-full">
        <div class="flex-1 min-w-0">
            <div class="pr-5 space-y-6 sm:space-y-10 pb-20">
                <livewire:song::books.lists />

                <livewire:song::cantiques.lists />
            </div>
        </div>
        <div class="border-l border-secondary-200 pl-5 pb-4 max-w-xs w-full">
            <livewire:song::authors.lists />
        </div>
    </div>

@endsection

@once
    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
        <!-- Swiper JS -->
        <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper('.mySwiper', {
                scrollbar: {
                    el: '.swiper-scrollbar',
                    hide: false,
                },
            });
        </script>
    @endpush
@endonce
