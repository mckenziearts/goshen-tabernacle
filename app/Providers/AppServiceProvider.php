<?php

declare(strict_types=1);

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Carbon\Carbon;
use Filament\Facades\Filament;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        date_default_timezone_set(config('app.timezone')); // @phpstan-ignore-line
        setlocale(LC_TIME, 'fr_FR', 'fr', 'FR', 'French', 'fr_FR.UTF-8');
        setlocale(LC_ALL, 'fr_FR', 'fr', 'FR', 'French', 'fr_FR.UTF-8');
        Carbon::setLocale('fr');

        $this->bootFilament();
    }

    public function register(): void
    {
        if ($this->app->isLocal()) {
            $this->app->register(IdeHelperServiceProvider::class);
        }

        $this->registerBladeDirective();
    }

    public function registerBladeDirective(): void
    {
        Blade::directive(
            name: 'title',
            handler:  fn ($expression) => "<?php \$title = {$expression} ?>"
        );

        Blade::directive(
            name: 'canonical',
            handler: fn ($expression) => "<?php \$canonical = {$expression} ?>"
        );
    }

    public function bootFilament(): void
    {
        Filament::serving(function (): void {
            Filament::registerTheme(
                mix('css/filament.css'),
            );
        });

        Filament::registerRenderHook(
            'body.start',
            fn (): string => Blade::render('@livewire(\'livewire-ui-modal\')'),
        );
    }
}
