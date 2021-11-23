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
    <title>{{ __("Goshen Tabernacle l'Église des 7 Tonnerres") }}</title>
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

    <div class="bg-white pb-8 sm:pb-12 lg:pb-12">
        <div class="pt-8 overflow-hidden sm:pt-12 lg:relative lg:py-48">
            <div class="mx-auto max-w-md px-4 sm:max-w-3xl sm:px-6 lg:px-8 lg:max-w-7xl lg:grid lg:grid-cols-2 lg:gap-24">
                <div>
                    <div>
                        <x-application-logo class="h-12 w-auto text-purple-700" />
                    </div>
                    <div class="mt-10">
                        <div>
                            <a href="{{ url('/youtube') }}" class="inline-flex space-x-4">
                                <span class="rounded bg-purple-50 px-2.5 py-1 text-xs font-semibold text-purple-600 tracking-wide uppercase">
                                    {{ __('Abonnez-vous') }}
                                </span>
                                <span class="inline-flex items-center text-sm font-medium text-purple-600 space-x-1">
                                    <span>{{ __('Rejoignez nous sur YouTube') }}</span>
                                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                            </a>
                        </div>
                        <div class="mt-6 sm:max-w-xl">
                            <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">
                                {{ __('Bienvenue chez Goshen Tabernacle') }}
                            </h1>
                            <p class="mt-6 text-xl leading-7 text-gray-500">
                                {{ __("L'église c'est plus qu'un lieu, c'est chacun de nous. Dans cette nouvelle saison, année de brisement de limites, nous croyons qu'il est possible d'être plus connectés que jamais.") }}
                            </p>
                        </div>
                        <div class="mt-12 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0">
                            <p class="text-base font-medium text-gray-900">
                                {{ __("Inscrivez-vous pour être averti lorsque le nouveau site sera prêt.") }}
                            </p>
                            <!-- Begin Mailchimp Signup Form -->
                            <form action="https://goshen-tabernacle.us18.list-manage.com/subscribe/post?u=3ede7cb0d3cb98757535cf6e2&amp;id=79d4ed3192" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate class="mt-3 sm:max-w-lg sm:w-full sm:flex">
                                <input type="hidden" name="b_3ede7cb0d3cb98757535cf6e2_79d4ed3192" tabindex="-1" value="">
                                <div class="min-w-0 flex-1">
                                    <label for="hero_email" class="sr-only">{{ __('Adresse Email') }}</label>
                                    <input id="hero_email" type="email" name="EMAIL" class="block w-full border border-gray-300 rounded-md px-5 py-3 text-base text-gray-900 placeholder-gray-500 shadow-sm focus:border-purple-500 focus:ring-purple-500" placeholder="{{ __('Entrer votre Adresse Email') }}" required>
                                </div>
                                <div class="mt-4 sm:mt-0 sm:ml-3">
                                    <button type="submit" class="block w-full rounded-md border border-transparent px-5 py-3 bg-purple-600 text-base font-medium text-white shadow hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 sm:px-10">{{ __("M'abonner") }}</button>
                                </div>
                            </form>
                            <!--End mc_embed_signup-->
                            <div class="mt-6">
                                <div class="inline-flex items-center divide-x divide-gray-300">
                                    <div class="min-w-0 flex-1 py-1 text-sm text-gray-500 sm:py-3">
                                        {{ __("Écoutez les prédications, exhortations et suivez nos moments de prières via nos") }} <span class="font-medium text-purple-600">Podcasts</span>
                                    </div>
                                    <div class="pl-4">
                                        <a href="{{ route('podcasts') }}" class="inline-flex items-center px-3 py-2 border border-transparent shadow-sm text-sm leading-4 font-medium rounded-md text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500">
                                            <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z" />
                                            </svg>
                                            {{ __('Écouter') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sm:mx-auto sm:max-w-3xl sm:px-6">
                <div class="py-12 sm:relative sm:mt-12 sm:py-16 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                    <div class="hidden sm:block">
                        <div class="absolute inset-y-0 left-1/2 w-screen bg-gray-50 rounded-l-3xl lg:left-80 lg:right-0 lg:w-full"></div>
                        <svg class="absolute top-8 right-1/2 -mr-3 lg:m-0 lg:left-0" width="404" height="392" fill="none" viewBox="0 0 404 392">
                            <defs>
                                <pattern id="837c3e70-6c3a-44e6-8854-cc48c737b659" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                    <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                                </pattern>
                            </defs>
                            <rect width="404" height="392" fill="url(#837c3e70-6c3a-44e6-8854-cc48c737b659)" />
                        </svg>
                    </div>
                    <div class="relative pl-4 -mr-40 sm:mx-auto sm:max-w-3xl sm:px-0 lg:max-w-none lg:h-full lg:pl-12">
                        <img class="w-full rounded-md shadow-xl ring-1 ring-black ring-opacity-5 lg:h-full lg:w-auto lg:max-w-none" src="{{ asset('images/21-jours-jeune-prieres.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
