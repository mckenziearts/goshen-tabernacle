<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;

final class LocaleMiddleware
{
    public function handle($request, Closure $next)
    {
        if (session()->has('locale') && array_key_exists(session()->get('locale'), config('goshen.languages'))) {

            app()->setLocale(session()->get('locale'));

            setlocale(LC_TIME, config('goshen.languages')[session()->get('locale')][1]);
            Carbon::setLocale(config('goshen.languages')[session()->get('locale')][0]);

            if (config('goshen.languages')[session()->get('locale')][2]) {
                session(['lang-rtl' => true]);
            } else {
                session()->forget('lang-rtl');
            }
        }

        return $next($request);
    }
}
