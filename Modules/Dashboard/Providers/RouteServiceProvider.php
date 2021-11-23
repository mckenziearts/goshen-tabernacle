<?php

namespace Modules\Dashboard\Providers;

use Modules\Core\Providers\RoutingServiceProvider;

class RouteServiceProvider extends RoutingServiceProvider
{
    protected $namespace = 'Modules\Dashboard\Http\Controllers';

    protected function getWebRoute(): ?string
    {
        return null;
    }

    protected function getCPanelRoute(): ?string
    {
        return module_path('Dashboard', '/Routes/cpanel.php');
    }

    protected function getApiRoute(): ?string
    {
        return null;
    }
}
