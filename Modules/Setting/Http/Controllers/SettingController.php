<?php

namespace Modules\Setting\Http\Controllers;

use Modules\Core\Http\Controllers\CPanel\AdminController;

class SettingController extends AdminController
{
    public function index()
    {
        return view('setting::index');
    }
}
