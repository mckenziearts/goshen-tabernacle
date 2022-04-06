<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        seo()
            ->site('Goshen Tabernacle L\'église des 7 Tonnerres')
            ->title(
                default: 'Goshen Tabernacle L\'église des 7 Tonnerres',
                modify: fn (string $title) => $title . ' | Goshen Tabernacle'
            )
            ->description(default: 'L\'église c\'est plus qu\'un lieu, c\'est chacun de nous. Dans cette nouvelle saison, année de brisement de limites, nous croyons qu\'il est possible d\'être plus connectés que jamais.')
            ->image(default: fn () => asset('/images/social-card.png'))
            ->twitterImage(default: fn () => asset('/images/social-card.png'))
            ->tag('keywords', '7 tonnerres, goshen-tabernacle, Eglise du message, William Marrion Brahnam, Joseph Coleman, Goshen, Jesus Christ')
            ->tag('twitter:creator', '@monneyarthur')
            ->twitterSite('monneyarthur');
    }
}
