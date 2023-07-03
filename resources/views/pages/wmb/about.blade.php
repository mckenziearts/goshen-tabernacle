@extends('layouts.site')

@section('body')

    <div class="overflow-hidden">
        <div class="relative max-w-7xl mx-auto pt-12 px-4 sm:px-6">
            <div class="hidden lg:block bg-purple-50 absolute top-0 bottom-0 left-3/4 w-screen"></div>
            <div class="mx-auto text-base max-w-prose lg:grid lg:grid-cols-2 lg:gap-8 lg:max-w-none">
                <div>
                    <h2 class="text-base text-purple-600 font-semibold tracking-wide uppercase">{{ __('Prophète') }}</h2>
                    <h3 class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">William Marrion Branham</h3>
                </div>
            </div>
            <div class="mt-8 lg:grid lg:grid-cols-2 lg:gap-8">
                <div class="relative lg:row-start-1 lg:col-start-2">
                    <svg class="hidden lg:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="de316486-4a29-4312-bdfc-fbce2132a2c1" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-purple-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#de316486-4a29-4312-bdfc-fbce2132a2c1)" />
                    </svg>
                    <div class="relative text-base mx-auto max-w-prose lg:max-w-none">
                        <figure>
                            <div class="aspect-w-6 aspect-h-3 lg:aspect-none">
                                <img class="rounded-lg shadow-lg object-cover object-center" src="{{ asset('images/william-branham.jpeg') }}" alt="{{ __('William Marrion Brahnam avec l\'aureole du Saint Esprit') }}" />
                            </div>
                            <figcaption class="mt-3 flex text-sm text-gray-500">
                                <x-heroicon-s-camera class="flex-none w-5 h-5 text-gray-400"/>
                                <span class="ml-2">{{ __('Photo du prophete William Marrion Brahnam') }}</span>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="mt-8 lg:mt-0">
                    <div class="prose prose-purple text-gray-500 mx-auto sm:prose-lg lg:max-w-none lg:row-start-1 lg:col-start-1">
                        <p>{{ __("William Branham (nous l'appelons frère Branham) a commencé sa vie au printemps 1909. Il est né dans la plus pauvre des familles, au fin fond des collines du sud du Kentucky. Quelques minutes après sa naissance, dans une minuscule cabane d'une pièce, une étrange lumière est entrée dans la pièce et a plané au-dessus du lit où il était couché. C'était le début d'une vie surnaturelle qui allait changer la face du monde chrétien moderne.") }}</p>
                        <p>{{ __("Avec un père alcoolique et peu ou pas de religion à la maison, il n'avait pas beaucoup de chance. Pourtant, contre toute attente, frère Branham a grandi et est devenu un puissant homme de Dieu. A environ 38 ans, il priait dans une petite cabane de trappeur, juste au nord de sa maison à Jeffersonville, dans l'Indiana. C'est alors, tard dans la nuit, que l'Ange du Seigneur lui rendit visite et lui donna la mission de prier pour les malades.") }}</p>
                        <p>{{ __("Entre autres choses, l'Ange lui a dit :") }}</p>
                        <blockquote>
                            <p>{{ __("Si vous obtenez que les gens vous croient, et que vous êtes sincère lorsque vous priez, rien ne pourra résister à vos prières, pas même le cancer.") }}</p>
                        </blockquote>
                        <p>{{ __("Tous les doutes avaient disparu. Frère Branham avait maintenant sa commission et s'avançait hardiment. Un réveil de guérison mondial avait commencé.") }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="py-10 px-4 sm:px-6 overflow-hidden">
            <div class="max-w-max lg:max-w-7xl mx-auto">
                <div class="relative">
                    <svg class="hidden md:block absolute top-0 right-0 -mt-20 -mr-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="95e8f2de-6d30-4b7e-8159-f791729db21b" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-purple-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#95e8f2de-6d30-4b7e-8159-f791729db21b)" />
                    </svg>
                    <svg class="hidden md:block absolute bottom-0 left-0 -mb-20 -ml-20" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                        <defs>
                            <pattern id="7a00fe67-0343-4a3c-8e81-c145097a3ce0" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                <rect x="0" y="0" width="4" height="4" class="text-purple-200" fill="currentColor" />
                            </pattern>
                        </defs>
                        <rect width="404" height="384" fill="url(#7a00fe67-0343-4a3c-8e81-c145097a3ce0)" />
                    </svg>
                    <div class="relative md:bg-white md:p-6">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-6">
                            <div class="prose prose-purple prose-lg text-gray-500 lg:max-w-none">
                                <p>{{ __("Le ministère de frère Branham a marqué la plus grande effusion du Saint-Esprit depuis le jour de la Pentecôte. Des centaines de milliers de personnes ont assisté aux campagnes de Branham. Des milliers de personnes ont été guéries au nom du Seigneur Jésus-Christ. D'autres évangélistes tels que Oral Roberts, T.L. Osborne et A.A. Allen ont rapidement suivi frère Branham et ont lancé leurs propres réveils de guérison. Le Seigneur fait pleuvoir ses bénédictions comme jamais auparavant. La main guérisseuse de Jésus-Christ avait à nouveau touché son peuple.") }}</p>
                            </div>
                            <div class="mt-6 prose prose-purple prose-lg text-gray-500 lg:mt-0">
                                <p>{{ __("Le ministère de frère Branham n'avait pas d'égal. Il a prouvé que Jésus-Christ est aussi vivant aujourd'hui qu'Il l'était lorsqu'Il marchait sur les rives de la Galilée. Comme l'apôtre Paul, frère Branham a montré que l'Evangile n'est pas seulement en paroles, mais aussi en puissance ! La révélation des mystères cachés et la puissance manifestée de Dieu s'étaient réunies en un seul ministère très spécial. Notamment, comme les scribes enregistraient les sermons des prophètes bibliques, ses sermons ont été enregistrés sur bande magnétique. Aujourd'hui, nous chérissons ces enregistrements.") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="relative max-w-7xl mx-auto py-12 px-4 sm:px-6">

        </div>
    </div>

@stop
