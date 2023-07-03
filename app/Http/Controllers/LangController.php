<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

final class LangController extends Controller
{
    public function __invoke(string $locale): RedirectResponse
    {
        if (array_key_exists($locale, (array) config('goshen.languages'))) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
