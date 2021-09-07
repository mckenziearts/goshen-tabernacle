<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Module Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your module.
    |
    */

    'name' => 'Setting',

    /*
    |--------------------------------------------------------------------------
    | Setting Locale Configuration
    |--------------------------------------------------------------------------
    |
    | PHP locale determines the default locale that will be used
    | by the model date format function ->formatLocalized().
    |
    */

    'locale' => 'fr_FR',

    /*
    |--------------------------------------------------------------------------
    | Configurations for the user
    |--------------------------------------------------------------------------
    |
    | User configuration to manage user access using spatie/laravel-permission.
    |
    */

    'users' => [
        'admin_role' => 'administrator',
        'default_role' => 'member',
    ],

    /*
    |--------------------------------------------------------------------------
    | Permissions group
    |--------------------------------------------------------------------------
    |
    |
    */

    'permission_groups' => [],

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
