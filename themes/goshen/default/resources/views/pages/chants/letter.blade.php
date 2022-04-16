@extends('layouts.site')

@section('body')

    <div class="bg-gradient-to-r from-violet-500 via-purple-600 to-purple-800 py-6 lg:py-10">
        <div class="max-w-7xl relative mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <nav class="sm:hidden" aria-label="Back">
                    <a href="{{ route('chants.index') }}" class="flex items-center text-sm font-medium text-purple-200 hover:text-purple-100">
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
                                <span class="ml-4 text-sm font-medium text-white">{{ __('Alphabet :letter', ['letter' => request()->query('letter')]) }}</span>
                            </div>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="mt-4 md:flex md:items-center md:justify-between">
                <div class="flex-1 min-w-0">
                    <h2 class="text-2xl font-bold leading-7 text-white sm:text-3xl sm:truncate">
                        {{ __('Chants commençant par :letter', ['letter' => request()->query('letter')]) }}
                    </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl relative mx-auto px-4 py-12 sm:py-16 sm:px-6 lg:px-8">
        @if($songs->isNotEmpty())
            <x-songs.grid-list :songs="$songs" />

            <div class="mt-12 text-center">
                {{ $songs->appends(['letter' => request()->query('letter')])->links() }}
            </div>
        @else
            <div class="flex-shrink-0 my-auto py-16 sm:py-20">
                <p class="text-sm font-semibold text-indigo-600 uppercase tracking-wide">{{ __('Introuvable') }}</p>
                <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">{{ __('Aucun chant trouvé') }}</h1>
                <p class="mt-2 text-base text-gray-500">{{ __('Désolé, nous n\'avons pas trouvé de chants correspondant à cette recherche.') }}</p>
                <div class="mt-6">
                    <a href="{{ route('chants.index') }}" class="text-base font-medium text-indigo-600 hover:text-indigo-500">{{ __('Retour aux chants') }}<span aria-hidden="true"> →</span></a>
                </div>
            </div>
        @endif
    </div>
@stop
