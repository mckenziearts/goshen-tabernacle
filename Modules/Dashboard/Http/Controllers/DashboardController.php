<?php

namespace Modules\Dashboard\Http\Controllers;

use Modules\Core\Http\Controllers\CPanel\AdminController;

class DashboardController extends AdminController
{
    public function index()
    {
        return view('dashboard::index');
    }
}
