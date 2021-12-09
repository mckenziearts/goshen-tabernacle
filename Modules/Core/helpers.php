<?php

if (! function_exists('active')) {
    /**
     * Sets the menu item class for an active route.
     */
    function active($routes, string $activeClass = 'active', string $defaultClass = '', bool $condition = true): string
    {
        return call_user_func_array([app('router'), 'is'], (array) $routes) && $condition ? $activeClass : $defaultClass;
    }
}

if (! function_exists('is_active')) {
    /**
     * Determines if the given routes are active.
     */
    function is_active($routes): bool
    {
        return (bool) call_user_func_array([app('router'), 'is'], (array) $routes);
    }
}

if (! function_exists('canonical')) {
    /**
     * Generate a canonical URL to the given route and allowed list of query params.
     */
    function canonical(string $route, array $params = []): string
    {
        $page = app('request')->get('page');
        $params = array_merge($params, ['page' => $page != 1 ? $page : null]);

        ksort($params);

        return route($route, $params);
    }
}

if (! function_exists('getFilter')) {
    function getFilter(string $key, array $filters = [], string $default = 'recent'): string
    {
        $filter = (string) request($key);

        return in_array($filter, $filters) ? $filter : $default;
    }
}

if (! function_exists('is_module_enabled')) {
    function is_module_enabled($module)
    {
        return array_key_exists($module, app('modules')->allEnabled());
    }
}

if (! function_exists('setEnvironmentValue')) {
    /**
     * Function to set or update .env variable.
     *
     * @param array $values
     * @return bool
     */
    function setEnvironmentValue(array $values): bool
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            $str .= "\n"; // In case the searched variable is in the last line without \n
            foreach ($values as $envKey => $envValue) {
                if ($envValue === true) {
                    $value = 'true';
                } elseif ($envValue === false) {
                    $value = 'false';
                } else {
                    $value = $envValue;
                }

                $envKey = strtoupper($envKey);
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                $space = strpos($value, ' ');
                $envValue = ($space === false) ? $value : '"' . $value . '"';

                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

                env($envKey, $envValue);
            }
        }

        $str = substr($str, 0, -1);

        if (! file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }
}
