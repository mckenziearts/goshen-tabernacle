<?php

namespace App\Http\Controllers;

class LiveController extends Controller
{
    public function streaming()
    {
        return view('pages.live');
    }
}
