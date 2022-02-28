<?php

namespace Modules\Song\Http\Controllers;

use Modules\Core\Http\Controllers\CPanel\AdminController;

class SongController extends AdminController
{
    public function index()
    {
        return view('song::index');
    }
}
