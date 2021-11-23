<?php

namespace Modules\Core\Http\Controllers;

use Hexadog\ThemesManager\Facades\ThemesManager;
use Illuminate\Routing\Controller;

class BaseController extends Controller
{
    public function __construct()
    {
        // Specify theme name with vendor
        // in case multiple themes with same name are provided by multiple vendor
        ThemesManager::set('goshen/default');
    }
}
