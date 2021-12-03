<?php

namespace Modules\User\Providers;

use Modules\Core\Providers\RoutingServiceProvider;

class RouteServiceProvider extends RoutingServiceProvider
{
    protected $moduleNamespace = 'Modules\User\Http\Controllers';

    protected function getWebRoute(): ?string
        {
            return null;
        }

        protected function getCPanelRoute(): ?string
        {
            return module_path('User', '/Routes/cpanel.php');
        }

        protected function getApiRoute(): ?string
        {
            return null;
        }
}
