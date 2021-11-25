<?php

namespace Modules\Event\Providers;

use Modules\Core\Providers\RoutingServiceProvider;

class RouteServiceProvider extends RoutingServiceProvider
{
    protected $moduleNamespace = 'Modules\Event\Http\Controllers';

    protected function getWebRoute(): ?string
        {
            return null;
        }

        protected function getCPanelRoute(): ?string
        {
            return module_path('Event', '/Routes/cpanel.php');
        }

        protected function getApiRoute(): ?string
        {
            return null;
        }
}
