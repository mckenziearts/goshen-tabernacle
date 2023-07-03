<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Configurations for the user
    |--------------------------------------------------------------------------
    |
    | User configuration to manage user access using http://github.com/spatie/laravel-permission.
    |
    */

    'users' => [
        'admin_role' => 'administrator',
        'default_role' => 'user',
    ],

    /*
    |--------------------------------------------------------------------------
    | Available languages
    |--------------------------------------------------------------------------
    |
    | Add your language code to this array.
    | The code must have the same name as the language folder.
    | Be sure to add the new language in an alphabetical order.
    |
    | The language picker will not be available if there is only one language option
    | Commenting out languages will make them unavailable to the user
    |
    | @var array
    */

    'languages' => [

        /*
        | Key is the Laravel locale code
        | Index 0 of sub-array is the Carbon locale code
        | Index 1 of sub-array is the PHP locale code for setLocale()
        | Index 2 of sub-array is whether or not to use RTL (right-to-left) html direction for this language
        */

        'en' => ['en', 'en_US', false],
        'fr' => ['fr', 'fr_FR', false],
    ],

];
