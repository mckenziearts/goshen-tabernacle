@extends('layouts.site')

@section('body')

    <div class="bg-gradient-to-r from-violet-500 via-purple-600 to-purple-800 py-6 lg:py-10">
        <div class="max-w-7xl relative mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <nav class="sm:hidden" aria-label="Back">
                    <a href="{{ back() }}" class="flex items-center text-sm font-medium text-purple-200 hover:text-purple-100">
                        <x-heroicon-s-chevron-left class="flex-shrink-0 -ml-1 mr-1 h-5 w-5 text-gray-400"/>
                        {{ __('Retour') }}
                    </a>
                </nav>
                <nav class="hidden sm:flex" aria-label="Breadcrumb">
                    <ol role="list" class="flex items-center space-x-4">
                        <li>
                            <div class="flex">
                                <a href="{{ route('chants.index') }}" class="text-sm font-medium text-purple-200 hover:text-purple-100">{{ __('Chants') }}</a>
                            </div>
                        </li>
                        <li>
                            <div class="flex items-center">
                                <x-heroicon-s-chevron-right class="flex-shrink-0 h-5 w-5 text-purple-300" />
                                <span class="ml-4 text-sm font-medium text-white">{{ $song->title }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="mt-4 md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl sm:truncate">
                        {{ $song->title }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl relative mx-auto px-4 py-12 sm:py-16 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-3 max-w-lg">
            <div class="sm:col-span-1">
                <dt class="text-sm font-medium text-gray-500">
                    {{ __('Auteur') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-500">
                    @if($song->author)
                        <a href="{{ route('chants.author', $song->author) }}" class="text-purple-600 hover:text-purple-700">
                            {{ $song->author->name }}
                        </a>
                    @else
                        <span>{{ __('Non défini') }}</span>
                    @endif
                </dd>
            </div>
            <div class="sm:col-span-2">
                <dt class="text-sm font-medium text-gray-500">
                    {{ __('Livre de Recueil') }}
                </dt>
                <dd class="mt-1 text-sm text-gray-500">
                    @if($song->book)
                        <a href="{{ route('chants.book', $song->book) }}" class="text-purple-600 hover:text-purple-700">
                            {{ $song->book->name }}
                        </a>
                    @else
                        <span>{{ __('Non défini') }}</span>
                    @endif
                </dd>
            </div>
        </div>
        <div class="mt-5 lg:grid lg:grid-cols-3 lg:gap-8">
            <div class="lg:col-span-2">
                <div class="mt-5 prose prose-purple text-gray-500 mx-auto lg:max-w-none lg:row-start-1 lg:col-start-1">
                    {!! $song->content !!}
                </div>
            </div>
            <aside class="hidden lg:block lg:col-span-1">
                <div class="sticky top-6 space-y-10">
                    @if($song->video_link)
                        <div>
                            <h4 class="text-sm text-gray-700 font-medium leading-5">{{ __('La Vidéo du chant') }}</h4>
                            <div class="mt-4 w-full relative h-[250px]">
                                <iframe class="w-full h-full aspect-video rounded-lg shadow-lg"
                                        src="{{ $song->video_link }}"
                                        frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen
                                ></iframe>
                            </div>
                        </div>
                    @endif

                    <div>
                        <h4 class="text-sm text-gray-700 font-medium leading-5">{{ __('Partager sur les Réseaux Sociaux') }}</h4>
                        <div class="mt-4 flex items-center space-x-2">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('chants.show', $song)) }}&quote={{ urlencode($song->title) }}" class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-[#1877F2] hover:bg-[#0c64d5] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#0c64d5]">
                                <span class="sr-only">Facebook</span>
                                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path>
                                </svg>
                            </a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode(route('chants.show', $song)) }}" class="inline-flex items-center p-2 border border-transparent rounded-full shadow-sm text-white bg-[#27D044] hover:bg-[#21ae39] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#21ae39]">
                                <span class="sr-only">WhatsApp</span>
                                <svg class="h-6 w-6 text-white" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 308 308" aria-hidden="true">
                                    <path d="M227.904 176.981c-.6-.288-23.054-11.345-27.044-12.781-1.629-.585-3.374-1.156-5.23-1.156-3.032 0-5.579 1.511-7.563 4.479-2.243 3.334-9.033 11.271-11.131 13.642-.274.313-.648.687-.872.687-.201 0-3.676-1.431-4.728-1.888-24.087-10.463-42.37-35.624-44.877-39.867-.358-.61-.373-.887-.376-.887.088-.323.898-1.135 1.316-1.554 1.223-1.21 2.548-2.805 3.83-4.348a140.77 140.77 0 0 1 1.812-2.153c1.86-2.164 2.688-3.844 3.648-5.79l.503-1.011c2.344-4.657.342-8.587-.305-9.856-.531-1.062-10.012-23.944-11.02-26.348-2.424-5.801-5.627-8.502-10.078-8.502-.413 0 0 0-1.732.073-2.109.089-13.594 1.601-18.672 4.802C90 87.918 80.89 98.74 80.89 117.772c0 17.129 10.87 33.302 15.537 39.453.116.155.329.47.638.922 17.873 26.102 40.154 45.446 62.741 54.469 21.745 8.686 32.042 9.69 37.896 9.69h.001c2.46 0 4.429-.193 6.166-.364l1.102-.105c7.512-.666 24.02-9.22 27.775-19.655 2.958-8.219 3.738-17.199 1.77-20.458-1.348-2.216-3.671-3.331-6.612-4.743z"/>
                                    <path d="M156.734 0C73.318 0 5.454 67.354 5.454 150.143c0 26.777 7.166 52.988 20.741 75.928L.212 302.716a3.998 3.998 0 0 0 4.999 5.096l79.92-25.396c21.87 11.685 46.588 17.853 71.604 17.853C240.143 300.27 308 232.923 308 150.143 308 67.354 240.143 0 156.734 0zm0 268.994c-23.539 0-46.338-6.797-65.936-19.657a3.996 3.996 0 0 0-3.406-.467l-40.035 12.726 12.924-38.129a4.002 4.002 0 0 0-.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 0-65.543 53.754-118.867 119.826-118.867 66.064 0 119.812 53.324 119.812 118.867.001 65.535-53.746 118.851-119.811 118.851z"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div>

@stop
