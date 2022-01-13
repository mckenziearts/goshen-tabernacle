@extends('layouts.site')
@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
@endpush

@section('body')

    <div class="h-[300px] md:h-[705px] w-full swiper mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img class="h-full w-full object-cover" src="{{ asset('/images/slides/slide-1.png') }}" alt="">
            </div>
            <div class="swiper-slide">
                <img class="h-full w-full object-cover" src="{{ asset('/images/slides/slide-2.jpg') }}" alt="">
            </div>
            <div class="swiper-slide">
                <img class="h-full w-full object-cover" src="{{ asset('/images/slides/slide-3.jpg') }}" alt="">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    <div class="py-12 overflow-hidden sm:py-16 lg:py-24">
        <div class="max-w-7xl mx-auto px-4 space-y-8 sm:px-6">
            <div class="text-base max-w-prose mx-auto lg:max-w-none">
                <h1 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ __('Bienvenue à Goshen Tabernacle') }}</h1>
            </div>
            <div class="relative z-10 text-base max-w-prose mx-auto lg:max-w-5xl lg:mx-0 lg:pr-72">
                <p class="text-lg text-gray-500 selection:bg-purple-400 selection:text-white">
                    Goshen Tabernacle est une église chrétienne souveraine non confessionnelle située à Douala au Cameroun.
                    Nous sommes un ministère de la perfection où l'espoir est restauré, la foi est renouvelée et les vies sont changées.
                </p>
            </div>
            <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-start">
                <div class="relative z-10">
                    <div class="prose prose-purple text-gray-500 mx-auto sm:prose-lg lg:max-w-none">
                        <p>
                            Nous sommes une assemblée interdénominationelle qui croit au message du temps de la fin prêché par le Prophète <a href="{{ route('wmb.about') }}" class="font-medium text-purple-600 hover:text-purple-500 hover:underline">William Marrion Branham</a>,
                            serviteur du Seigneur Jésus-Christ, conformément à Malachie 4; 5-6 et en vertu des promesses contenues dans la Bible.
                        </p>
                        <h3>Notre confession</h3>
                        <p>
                            Nous sommes une Église fondée sur la Bible, prêchant Jésus-Christ et enseignant la Parole de Dieu, telle qu'elle a été révélée par le prophète messager de la fin des temps William Marrion Branham.
                        </p>
                    </div>
                    <div class="mt-10 flex text-base max-w-prose mx-auto lg:max-w-none">
                        <div class="rounded-md shadow">
                            <a href="#" class="w-full flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700">
                                {{ __('En savoir plus') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="mt-12 relative max-w-2xl">
                    <svg class="absolute top-0 right-0 -mt-20 -mr-20 lg:top-auto lg:right-auto lg:bottom-1/2 lg:left-1/2 lg:mt-0 lg:mr-0 xl:top-0 xl:right-0 xl:-mt-20 xl:-mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="bedc54bc-7371-44a2-a2bc-dc68d819ae60" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#bedc54bc-7371-44a2-a2bc-dc68d819ae60)" />
                    </svg>
                    <div class="relative rounded-lg shadow-lg overflow-hidden">
                        <div class="rounded-lg aspect-w-2 aspect-h-1">
                            <img class="h-full w-full object-cover" src="{{ asset('/images/goshen-pupitre.jpg') }}" alt="Goshen Tabernacle">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="relative max-w-7xl mx-auto px-4 py-12 sm:px-6 sm:py-16 lg:py-24">

    </div>

@stop

@push('scripts')
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper('.mySwiper', {
            slidesPerView: 1,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
            },
        });
    </script>
@endpush
