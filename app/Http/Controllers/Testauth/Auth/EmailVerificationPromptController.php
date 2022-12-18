<?php

namespace App\Http\Controllers\Testauth\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        return $request->user('testauth')->hasVerifiedEmail()
                    ? redirect()->intended(route('testauth.dashboard'))
                    : view('testauth.auth.verify-email');
    }
}
