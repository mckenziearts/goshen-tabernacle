<footer class="bg-white border-t border-gray-200">
    <div class="max-w-8xl mx-auto py-12 px-4 overflow-hidden sm:px-6">
        <div class="flex-shrink-0 mx-auto max-w-xs flex justify-center">
            <x-application-logo class="text-purple-600 h-10 w-10" />
        </div>
        <nav class="mt-6 -mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
            <div class="px-5 py-2">
                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                    {{ __('A propos') }}
                </a>
            </div>

            <div class="px-5 py-2">
                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                    {{ __('Prédications') }}
                </a>
            </div>

            <div class="px-5 py-2">
                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                    {{ __('Conventions') }}
                </a>
            </div>

            <div class="px-5 py-2">
                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                    {{ __('Galerie') }}
                </a>
            </div>

            <div class="px-5 py-2">
                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                    {{ __('Actualités') }}
                </a>
            </div>

            <div class="px-5 py-2">
                <a href="#" class="text-base text-gray-500 hover:text-gray-900">
                    {{ __('Podcasts') }}
                </a>
            </div>
        </nav>
        <div class="mt-8 flex justify-center space-x-6">
            <a href="{{ route('facebook') }}" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Facebook</span>
                <x-icons.facebook class="h-6 w-6"/>
            </a>

            <a href="{{ route('instagram') }}" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Instagram</span>
                <x-icons.instagram class="h-6 w-6"/>
            </a>

            <a href="{{ route('pinterest') }}" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Pinterest</span>
                <x-icons.pinterest class="h-6 w-6"/>
            </a>

            <a href="#" class="text-gray-400 hover:text-gray-500">
                <span class="sr-only">Youtube</span>
                <x-icons.youtube class="h-6 w-6"/>
            </a>
        </div>
        <p class="mt-8 text-center text-base text-gray-500">
            &copy; 2019 - {{ date('Y') }} Goshen Tabernacle. {{ __('Tous droits réservés') }}
        </p>
    </div>
</footer>
