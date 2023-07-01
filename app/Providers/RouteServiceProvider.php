<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

final class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public function boot(): void
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });

        Route::macro('redirectMap', function ($map, $status = 302) {
            foreach ($map as $old => $new) {
                Route::redirect($old, $new, $status)->name($old);
            }
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for(
            name: 'api',
            callback: fn (Request $request): Limit => Limit::perMinute(60)->by(
                key: optional($request->user())->id ?: $request->ip()
            )
        );
    }
}
