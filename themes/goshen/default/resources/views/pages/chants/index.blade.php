@extends('layouts.site')

@section('body')

    <div class="bg-white relative">
        <div class="absolute inset-0">
            <img class="h-full w-full object-cover" src="{{ asset('/images/chantre-albert.jpg') }}" alt="Chantre Albert">
            <div class="absolute inset-0 bg-gray-700 mix-blend-multiply"></div>
        </div>
        <div class="max-w-7xl relative mx-auto py-16 px-4 sm:py-20 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base font-semibold text-purple-400 tracking-wide uppercase">Chants</h2>
                <p class="mt-1 text-4xl font-extrabold text-white sm:text-5xl sm:tracking-tight lg:text-6xl">{{ __('Louange et Adoration') }}</p>
                <p class="max-w-xl mt-5 mx-auto text-xl text-purple-200">
                    {{ __('Trouvez ici les paroles de vos chants/cantiques + une vidéo/audio pour apprendre à les chanter.') }}
                </p>
            </div>
            <livewire:search />
        </div>
    </div>

    <div class="max-w-7xl relative mx-auto py-8 px-4 sm:py-10 sm:px-6 lg:px-8 lg:pb-16">
        <div class="space-y-12 sm:space-y-16">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par ordre alphabétique') }}</h3>
                <div class="mt-4 text-base flex flex-wrap items-center space-x-4 sm:space-x-8">
                    @foreach(range('A', 'Z') as $alpha)
                        <a href="?letter={{ $alpha }}" class="block py-1.5 uppercase font-medium hover:underline text-purple-600 hover:text-purple-700">{{ $alpha }}</a>
                    @endforeach
                </div>
            </div>

            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par recueil') }}</h3>
                <ul role="list" class="mt-5 grid gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
                    @foreach($books as $book)
                        <li class="flow-root">
                            <a href="{{ route('chants.book', $book) }}" class="-m-3 p-3 inline-flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50 transition ease-in-out duration-150">
                                <img class="w-10 h-10 object-cover rounded" src="{{ $book->getFirstMediaUrl('avatar') }}" alt=""/>
                                <span class="ml-4">{{ $book->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par catégorie') }}</h3>
                <ul role="list" class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-4 lg:gap-x-6">
                    <li>
                        <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                            <p class="text-base font-medium text-gray-900">
                                {{ __('Cantique') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __('Chant religieux en langue vernaculaire et destiné à être chanté dans les sanctuaires.') }}
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                            <p class="text-base font-medium text-gray-900">
                                {{ __('Chants de victoire') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __('Meilleurs Chants de victoire répertorier dans tous les livres recueils.') }}
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                            <p class="text-base font-medium text-gray-900">
                                {{ __('Chants de l\'inspiration') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __('Tous les chants de l\'inspiration du Message du temps de la fin.') }}
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                            <p class="text-base font-medium text-gray-900">
                                {{ __('Adoration') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                {{ __('Tous les plus grand chants d\'Adoration et Louange Chrétienne🙏') }}
                            </p>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par Chantre / Auteur') }}</h3>
                <ul role="list" class="mt-5 grid gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-5 lg:gap-8">
                    @foreach($authors as $author)
                        <div class="relative flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="{{ $author->getFirstMediaUrl('avatar') }}" alt="">
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="{{ route('chants.author', $author) }}" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900 truncate">{{ $author->name }}</p>
                                    <p class="text-sm text-gray-500 truncate">{{ $author->songs_count . ' ' . \Illuminate\Support\Str::plural('chant', $author->songs_count) }}</p>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </ul>
            </div>

            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par chants les plus visités') }}</h3>
                <x-songs.grid-list :songs="$songs" class="mt-5" />
            </div>
        </div>
    </div>

@stop
