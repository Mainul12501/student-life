<?php

namespace App\Http\Controllers\Testauth\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use App\Http\Requests\Testauth\Auth\EmailVerificationRequest;

class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated testauth's email address as verified.
     *
     * @param  \Illuminate\Foundation\Auth\EmailVerificationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user('testauth')->hasVerifiedEmail()) {
            return redirect()->intended(route('testauth.dashboard').'?verified=1');
        }

        if ($request->user('testauth')->markEmailAsVerified()) {
            event(new Verified($request->user('testauth')));
        }

        return redirect()->intended(route('testauth.dashboard').'?verified=1');
    }
}
