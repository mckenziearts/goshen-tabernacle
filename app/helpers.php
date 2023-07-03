<?php

declare(strict_types=1);

if ( ! function_exists('active')) {
    function active(array $routes, string $activeClass = 'active', string $defaultClass = '', bool $condition = true): string
    {
        return call_user_func_array([app('router'), 'is'], $routes) && $condition ? $activeClass : $defaultClass;
    }
}

if ( ! function_exists('is_active')) {
    function is_active(array $routes): bool
    {
        return (bool) call_user_func_array([app('router'), 'is'], $routes);
    }
}

if ( ! function_exists('canonical')) {
    function canonical(string $route, array $params = []): string
    {
        $page = app('request')->get('page');
        $params = array_merge($params, ['page' => 1 !== $page ? $page : null]);

        ksort($params);

        return route($route, $params);
    }
}

if ( ! function_exists('getFilter')) {
    function getFilter(string $key, array $filters = [], string $default = 'recent'): string
    {
        $filter = (string) request($key); // @phpstan-ignore-line

        return in_array($filter, $filters) ? $filter : $default;
    }
}

if ( ! function_exists('setEnvironmentValue')) {
    function setEnvironmentValue(array $values): bool
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            $str .= "\n"; // In case the searched variable is in the last line without \n
            foreach ($values as $envKey => $envValue) {
                if (true === $envValue) {
                    $value = 'true';
                } elseif (false === $envValue) {
                    $value = 'false';
                } else {
                    $value = $envValue;
                }

                $envKey = mb_strtoupper($envKey);
                $keyPosition = mb_strpos($str, "{$envKey}=");
                $endOfLinePosition = mb_strpos($str, "\n", $keyPosition);
                $oldLine = mb_substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                $space = mb_strpos($value, ' ');
                $envValue = (false === $space) ? $value : '"'.$value.'"';

                // If key does not exist, add it
                if ( ! $keyPosition || ! $endOfLinePosition || ! $oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }

                env($envKey, $envValue);
            }
        }

        $str = mb_substr($str, 0, -1);

        return ! ( ! file_put_contents($envFile, $str));
    }
}
