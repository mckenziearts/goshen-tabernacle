<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

final class EmailVerificationPromptController extends Controller
{
    public function __invoke(Request $request): View | RedirectResponse
    {
        return $request->user()->hasVerifiedEmail() // @phpstan-ignore-line
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email');
    }
}
