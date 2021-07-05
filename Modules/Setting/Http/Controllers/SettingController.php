<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\AdminController;

class SettingController extends AdminController
{
    public function index()
    {
        return view('setting::index');
    }
}
