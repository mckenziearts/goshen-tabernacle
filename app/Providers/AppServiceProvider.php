<?php

declare(strict_types=1);

namespace App\Providers;

use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        date_default_timezone_set(config('app.timezone')); // @phpstan-ignore-line
        Carbon::setLocale(config('app.locale')); // @phpstan-ignore-line
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
}
