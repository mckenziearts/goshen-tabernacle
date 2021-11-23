<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Route Prefix
    |--------------------------------------------------------------------------
    |
    | This prefix method can be used for the prefix of each
    | route in the administration panel. For example, you can change to 'admin'.
    |
    */

    'prefix' => env('CPANEL_PREFIX', 'cpanel'),


    /*
    |--------------------------------------------------------------------------
    | App subdomain
    |--------------------------------------------------------------------------
    |
    | This option controls the default subdomain  for your application.
    | You may change these defaults as required, but they're a perfect start
    | for this applications.
    |
    */

    'sub_domain' => 'app.' . env('APP_DOMAIN'),

    /*
    |--------------------------------------------------------------------------
    | Admin Routes Middleware
    |--------------------------------------------------------------------------
    |
    | Here you may specify which middleware Admin will assign to the routes
    | that it registers with the application. If necessary, you may change
    | these middleware but typically this provided default is preferred.
    |
    */

    'middleware' => [],

];

