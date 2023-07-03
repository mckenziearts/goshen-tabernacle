<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

final class BrochuresController extends Controller
{
    public function index(): View
    {
        return view('pages.wmb.brochures');
    }
}
