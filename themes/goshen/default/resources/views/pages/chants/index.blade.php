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
            <div class="mt-10 w-full max-w-xl mx-auto">
                <form action="#" method="POST" class="mt-3 sm:flex">
                    <label for="search" class="sr-only">Rechercher</label>
                    <input type="search" name="search" id="search" class="block w-full py-3 text-base rounded-md sm:rounded-l-md sm:rounded-r-none placeholder-gray-500 shadow-sm focus:ring-purple-500 focus:border-purple-500 sm:flex-1 sm:py-4 sm:px-5 border-gray-300" placeholder="{{ __('Rechercher par titre ou par contenu') }}" autocomplete="song" />
                    <button type="submit" class="mt-3 w-full px-6 py-3 border border-transparent text-base font-medium rounded-md sm:rounded-r-md sm:rounded-l-none text-white bg-purple-800 shadow-sm hover:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:mt-0 sm:flex-shrink-0 sm:inline-flex sm:items-center sm:w-auto">
                        {{ __('Rechercher') }}
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="max-w-7xl relative mx-auto py-8 px-4 sm:py-10 sm:px-6 lg:px-8 lg:pb-16">
        <div class="space-y-10 sm:space-y-14">
            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par ordre alphabétique') }}</h3>
                <div class="mt-4 text-base flex flex-wrap items-center space-x-4 sm:space-x-8">
                    @for($i = 1; $i <= 26; $i++)
                        <a href="#" class="block py-1.5 uppercase font-medium hover:underline text-purple-600 hover:text-purple-700">A</a>
                    @endfor
                </div>
            </div>

            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par recueil') }}</h3>
                <ul role="list" class="mt-5 grid gap-4 sm:grid-cols-2 sm:gap-5 lg:grid-cols-3 lg:gap-6">
                    <li class="flow-root">
                        <a href="#" class="-m-3 p-3 inline-flex items-center rounded-md text-base font-medium text-gray-900 hover:bg-gray-50 transition ease-in-out duration-150">
                            <img class="h-6 w-auto" src="https://s.topchretien.com/media/uploads/jem1.jpg" alt=""/>
                            <span class="ml-4">Axe 21 musique - Repousse mes limites</span>
                        </a>
                    </li>
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
                                Learn about tips, product updates and company culture.
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                            <p class="text-base font-medium text-gray-900">
                                {{ __('Chants de victoire') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                Learn about tips, product updates and company culture.
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                            <p class="text-base font-medium text-gray-900">
                                {{ __('Chants de l\'inspiration') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                Learn about tips, product updates and company culture.
                            </p>
                        </a>
                    </li>
                    <li>
                        <a href="#" class="-m-3 p-3 block rounded-md hover:bg-gray-50 transition ease-in-out duration-150">
                            <p class="text-base font-medium text-gray-900">
                                {{ __('Adoration') }}
                            </p>
                            <p class="mt-1 text-sm text-gray-500">
                                Learn about tips, product updates and company culture.
                            </p>
                        </a>
                    </li>
                </ul>
            </div>

            <div>
                <h3 class="text-lg leading-6 font-medium text-gray-900 sm:text-xl">{{ __('Par Chantre / Auteur') }}</h3>
                <ul role="list" class="mt-5 grid gap-4 sm:grid-cols-3 sm:gap-5 lg:grid-cols-5 lg:gap-8">
                    @for($i = 1; $i <= 10; $i++)
                        <div class="relative flex items-center space-x-3">
                            <div class="flex-shrink-0">
                                <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1501031170107-cfd33f0cbdcc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="">
                            </div>
                            <div class="flex-1 min-w-0">
                                <a href="#" class="focus:outline-none">
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    <p class="text-sm font-medium text-gray-900 truncate">Angela Beaver</p>
                                    <p class="text-sm text-gray-500 truncate">4 chants</p>
                                </a>
                            </div>
                        </div>
                    @endfor
                </ul>
            </div>
        </div>
    </div>

@stop
