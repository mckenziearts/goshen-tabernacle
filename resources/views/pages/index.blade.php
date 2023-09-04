<?php

use function Laravel\Folio\name;

name('home');

?>

<x-base-layout :title="__('Assemblée Goshen Tabernacle')">
    <div class="relative isolate">
        <svg class="absolute inset-0 -z-10 hidden h-full w-full stroke-purple-200 [mask-image:radial-gradient(64rem_64rem_at_top,white,transparent)] sm:block" aria-hidden="true">
            <defs>
                <pattern id="55d3d46d-692e-45f2-becd-d8bdc9344f45" width="200" height="200" x="50%" y="0" patternUnits="userSpaceOnUse">
                    <path d="M.5 200V.5H200" fill="none"></path>
                </pattern>
            </defs>
            <svg x="50%" y="0" class="overflow-visible fill-purple-50">
                <path d="M-200.5 0h201v201h-201Z M599.5 0h201v201h-201Z M399.5 400h201v201h-201Z M-400.5 600h201v201h-201Z" stroke-width="0"></path>
            </svg>
            <rect width="100%" height="100%" stroke-width="0" fill="url(#55d3d46d-692e-45f2-becd-d8bdc9344f45)"></rect>
        </svg>
        <div class="py-16 overflow-hidden sm:py-24 lg:py-36">
            <div class="max-w-7xl mx-auto px-4 space-y-8 sm:px-6">
                <div class="text-base max-w-prose mx-auto lg:max-w-none">
                    <h1 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl font-heading">
                        {{ __('Bienvenue à Goshen Tabernacle') }}
                    </h1>
                </div>
                <div class="relative z-10 text-base max-w-prose mx-auto lg:max-w-5xl lg:mx-0 lg:pr-72">
                    <p class="text-lg text-gray-500 selection:bg-purple-400 selection:text-white">
                        Goshen Tabernacle est une église chrétienne souveraine non confessionnelle située à Douala au Cameroun.
                        Nous sommes un ministère de la perfection où l'espoir est restauré, la foi est renouvelée et les vies sont changées.
                    </p>
                </div>
                <div class="lg:grid lg:grid-cols-2 lg:gap-x-16 lg:items-start">
                    <div class="relative z-10">
                        <div class="prose prose-purple text-gray-500 mx-auto sm:prose-lg lg:max-w-none">
                            <p>
                                Nous sommes une assemblée interdénominationelle qui croit au message du temps de la fin prêché par le Prophète
                                <a href="#" class="font-medium text-purple-600 hover:text-purple-500 hover:underline">William Marrion Branham</a>,
                                serviteur du Seigneur Jésus-Christ, conformément à Malachie 4; 5-6 et en vertu des promesses contenues dans la Bible.
                            </p>
                            <h3 class="font-heading">Notre confession</h3>
                            <p>
                                Nous sommes une Église fondée sur la <span class="font-semibold text-gray-900">Bible</span>,
                                prêchant <span class="font-semibold text-gray-900">Jésus-Christ</span> ressuscité, et enseignant la Parole de Dieu, telle qu'elle a été révélée par le
                                prophète messager de la fin des temps William Marrion Branham.
                            </p>
                        </div>
                    </div>
                    <div class="mt-12 relative max-w-2xl">
                        <div class="relative rounded-lg shadow-lg overflow-hidden">
                            <div class="rounded-lg aspect-w-2 aspect-h-1 shadow-xl">
                                <img class="h-full w-full object-cover" src="{{ asset('/images/goshen-pupitre.jpg') }}" alt="Goshen Tabernacle">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-base-layout>
