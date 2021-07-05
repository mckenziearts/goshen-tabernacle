<?php

namespace App\Http\Controllers;

use Hexadog\ThemesManager\Facades\ThemesManager;

class AdminController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        ThemesManager::set('goshen/admin');
    }
}
