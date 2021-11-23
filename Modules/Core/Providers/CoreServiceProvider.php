<?php

namespace Modules\Core\Providers;

use Carbon\Carbon;
use Hexadog\ThemesManager\Http\Middleware\ThemeLoader;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Modules\Core\Console\AdminCommand;
use Modules\Core\Console\InstallCommand;
use Modules\Core\Http\Middleware\LocaleMiddleware;
use Spatie\Permission\Middlewares\PermissionMiddleware;
use Spatie\Permission\Middlewares\RoleMiddleware;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * @var string
     */
    protected $moduleName = 'Core';

    /**
     * @var string
     */
    protected $moduleNameLower = 'core';

    /**
     * The middleware base class name.
     *
     * @var array
     */
    protected $middlewares = [
        'role'  => RoleMiddleware::class,
        'permission' => PermissionMiddleware::class,
        'theme' => ThemeLoader::class,
    ];

    /**
     * Shopper config files.
     *
     * @var array
     */
    protected array $configFiles = [
        'config', 'routes', 'locale',
    ];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerMiddleware($this->app['router']);
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));

        // setLocale for php. Enables ->formatLocalized() with localized values for dates.
        setlocale(LC_TIME, config('starterkit.core.locale.app_locale'));

        // setLocale to use Carbon source locales. Enables diffForHumans() localized.
        Carbon::setLocale(config('app.locale'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            AdminCommand::class,
            InstallCommand::class
        ]);
    }

    public function registerMiddleware(Router $router)
    {
        foreach ($this->middlewares as $name => $middleware) {
            $router->aliasMiddleware($name, $middleware);
        }

        $router->middlewareGroup('admin', array_merge([
            'web',
            'auth',
            'role:' . config('starterkit.core.config.users.admin_role') . '|manager',
        ], config('starterkit.core.routes.middleware', [])));
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        collect($this->configFiles)->each(function ($config) {
            $this->mergeConfigFrom(module_path($this->moduleName, "Config/{$config}.php"), $this->moduleNameLower . '.' . $config . '.config');
            $this->publishes([module_path($this->moduleName, "Config/{$config}.php") => config_path("starterkit/{$this->moduleNameLower}/{$config}.php")], $this->moduleNameLower . '-config');
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            RoutingServiceProvider::class,
        ];
    }
}
