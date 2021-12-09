<?php

namespace Modules\Setting\Providers;

use Modules\Core\Providers\RoutingServiceProvider;

class RouteServiceProvider extends RoutingServiceProvider
{
    protected $moduleNamespace = 'Modules\Setting\Http\Controllers';

    protected function getWebRoute(): ?string
    {
        return null;
    }

    protected function getCPanelRoute(): ?string
    {
        return module_path('Setting', '/Routes/cpanel.php');
    }

    protected function getApiRoute(): ?string
    {
        return null;
    }
}
