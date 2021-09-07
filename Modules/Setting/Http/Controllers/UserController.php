<?php

namespace Modules\Setting\Http\Controllers;

use App\Http\Controllers\AdminController;

class UserController extends AdminController
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
