<?php

namespace App\Http\Controllers\Testauth\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function show(Request $request)
    {
        return view('testauth.auth.confirm-password');
    }

    /**
     * Confirm the testauth's password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (! Auth::guard('testauth')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            return back()->withErrors([
                'password' => __('testauth.auth.password'),
            ]);
        }

        $request->session()->put('testauth.auth.password_confirmed_at', time());

        return redirect()->intended(route('testauth.dashboard'));
    }
}
