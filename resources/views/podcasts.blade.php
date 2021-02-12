<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{ __('Goshen Tabernacle L\'église des 7 Tonnerres') }}" />
    <meta name="description" content="{{ __("L'église c'est plus qu'un lieu, c'est chacun de nous. Dans cette nouvelle saison, année de brisement de limites, nous croyons qu'il est possible d'être plus connectés que jamais.") }}" />
    <meta property="og:description" content="{{ __("L'église c'est plus qu'un lieu, c'est chacun de nous. Dans cette nouvelle saison, année de brisement de limites, nous croyons qu'il est possible d'être plus connectés que jamais.") }}" />
    <meta property="og:image" content="{{ asset('images/social-card.png') }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:locale" content="{{ app()->getLocale() }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@MonneyArthur" />
    <meta name="twitter:title" content="{{ __('Goshen Tabernacle L\'église des 7 Tonnerres') }}" />
    <meta name="twitter:image" content="{{ asset('images/social-card.png') }}" />
    <meta property="twitter:description" content="{{ __("L'église c'est plus qu'un lieu, c'est chacun de nous. Dans cette nouvelle saison, année de brisement de limites, nous croyons qu'il est possible d'être plus connectés que jamais.") }}" />
    <meta name="author" content="@yield('meta_author', 'Arthur Monney')">
    <title>{{ __("Goshen Tabernacle ~ Podcasts") }}</title>
    <meta name="apple-mobile-web-app-title" content="{{ config('app.name') }}" />
    <meta name="application-name" content="{{ config('app.name')  }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('images/favicon/site.webmanifest') }}">
    <link rel="mask-icon" href="{{ asset('images/favicon/safari-pinned-tab.svg') }}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="theme-color" content="#ffffff">
    <!-- Fonts -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/app.css') }}">
    @if(app()->environment() === 'production')
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-T8Y1TN0RRD"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'G-T8Y1TN0RRD');
        </script>
    @endif
</head>
<body class="font-sans antialiased">

    <div class="bg-white pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="relative max-w-2xl mx-auto">
            <div class="flex flex-col items-center space-y-8 sm:items-start sm:space-y-0 sm:flex-row sm:space-x-8">
                <a class="flex-shrink-0" href="/">
                    <span class="sr-only">{{ __('Accueil') }}</span>
                    <img class="h-28 w-28 sm:h-36 sm:w-36 rounded-lg object-cover" src="{{ asset('images/profile.png') }}" alt="">
                </a>
                <div class="text-center sm:text-left">
                    <h1 class="text-3xl leading-9 tracking-tight font-extrabold text-gray-900 sm:text-4xl sm:leading-10">
                        <a href="/">{{ __('Goshen Tabernacle Radio') }}</a>
                    </h1>
                    <div class="mt-2">
                        <p class="text-lg leading-7 text-gray-500">
                            {{ __("Un podcast pour les chrétiens et tous ceux qui s'intéressent à la religion et qui croient en notre Seigneur et Sauveur Jésus Christ. Hébergé par") }}
                            <a href="https://www.spreaker.com" class="font-medium text-gray-900 hover:underline hover:text-gray-700" target="_blank">Speaker</a>.
                        </p>
                    </div>
                    <div class="mt-4 flex justify-center space-x-2 text-gray-400 sm:justify-start">
                        <a class="text-gray-600 hover:text-gray-900" href="#">{{ __('Apple Podcasts') }}</a>
                        <span>•</span>
                        <a class="text-gray-600 hover:text-gray-900" href="#">{{ __('Google Podcasts') }}</a>
                        <span>•</span>
                        <a class="text-gray-600 hover:text-gray-900" href="#">RSS</a>
                    </div>
                </div>
            </div>
            <div class="mt-8">
                <div class="mt-6 grid gap-12 border-t-2 border-gray-100 py-8">
                    <div class="relative overflow-hidden rounded-lg border border-gray-100">
                        <a class="spreaker-player" href="https://www.spreaker.com/show/apprenez-a-connaitre-dieu" data-resource="show_id=4785129" data-width="100%" data-height="350px" data-theme="dark" data-playlist="show" data-playlist-continuous="true" data-autoplay="false" data-live-autoplay="false" data-chapters-image="true" data-episode-image-position="right" data-hide-logo="false" data-hide-likes="false" data-hide-comments="false" data-hide-sharing="false" data-hide-download="true">
                            {{ __('Écoutez "21 jours de jeûne et prières" sur Spreaker.') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script async src="https://widget.spreaker.com/widgets.js"></script>

</body>
</html>
