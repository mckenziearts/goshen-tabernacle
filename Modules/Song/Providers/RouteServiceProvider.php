<?php

namespace Modules\Song\Providers;

use Modules\Core\Providers\RoutingServiceProvider;

class RouteServiceProvider extends RoutingServiceProvider
{
    protected $moduleNamespace = 'Modules\Song\Http\Controllers';

    protected function getWebRoute(): ?string
        {
            return module_path('Song', '/Routes/web.php');
        }

        protected function getCPanelRoute(): ?string
        {
            return module_path('Song', '/Routes/cpanel.php');
        }

        protected function getApiRoute(): ?string
        {
            return null;
        }
}
