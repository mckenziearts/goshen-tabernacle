<?php

namespace Modules\Song\Providers;

use Modules\Core\Providers\RoutingServiceProvider;

class RouteServiceProvider extends RoutingServiceProvider
{
    protected $moduleNamespace = 'Modules\Song\Http\Controllers';

    protected function getWebRoute(): ?string
        {
            return null;
        }

        protected function getCPanelRoute(): ?string
        {
            return null;
        }

        protected function getApiRoute(): ?string
        {
            return null;
        }
}
