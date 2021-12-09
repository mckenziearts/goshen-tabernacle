<?php

namespace Modules\Setting\Http\Controllers\CPanel;

use Modules\Core\Http\Controllers\CPanel\AdminController;

class UsersController extends AdminController
{
    public function index()
    {
        return view('setting::users.index');
    }

    public function create()
    {
        return view('setting::users.create');
    }
}
