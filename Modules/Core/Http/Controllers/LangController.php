<?php

namespace Modules\Core\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller;

class LangController extends Controller
{
    public function swap(string $locale): RedirectResponse
    {
        if (array_key_exists($locale, config('core.locale.languages'))) {
            session()->put('locale', $locale);
        }

        return redirect()->back();
    }
}
