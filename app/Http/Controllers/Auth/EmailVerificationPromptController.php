<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Hexadog\ThemesManager\Facades\ThemesManager;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    public function __construct()
    {
        parent::__construct();

        ThemesManager::set('goshen/admin');
    }

    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
                    ? redirect()->intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email');
    }
}
