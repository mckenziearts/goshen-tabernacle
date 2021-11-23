<?php

namespace Modules\Core\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

abstract class RoutingServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $namespace = 'Modules\Core\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    abstract protected function getWebRoute(): ?string;

    abstract protected function getCPanelRoute(): ?string;

    abstract protected function getApiRoute(): ?string;

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapLocaleRoute();

        $this->loadApiRoute();
        $this->loadCPanelRoutes();
        $this->loadWebRoutes();
    }

    protected function mapLocaleRoute()
    {
        Route::middleware('web')
            ->namespace('Modules\Core\Http\Controllers')
            ->group(module_path('Core', '/Routes/web.php'));
    }

    private function loadWebRoutes()
    {
        $web = $this->getWebRoute();

        if ($web && file_exists($web)) {
            Route::middleware('web')
                ->namespace($this->namespace)
                ->group($web);
        }
    }

    private function loadCPanelRoutes()
    {
        $backend = $this->getCPanelRoute();

        if ($backend && file_exists($backend)) {
            Route::middleware('admin')
                ->prefix(config('starterkit.core.routes.prefix'))
                ->domain(config('starterkit.core.routes.sub_domain'))
                ->namespace($this->namespace)
                ->as('cp.')
                ->group($backend);
        }
    }

    private function loadApiRoute()
    {
        $api = $this->getApiRoute();

        if ($api && file_exists($api)) {
            Route::prefix('api')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group($api);
        }
    }
}
