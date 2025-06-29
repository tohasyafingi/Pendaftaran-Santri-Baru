<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    $request->session()->regenerate();

    $user = Auth::user();

    switch ($user->role) {
        case 'superadmin':
            return redirect()->intended('/admin/dashboard');
        case 'admin':
            return redirect()->intended('/admin/dashboard');
        case 'santri':
            return redirect()->intended('/santri/dashboard');
        default:
            Auth::logout();
            return redirect('/login')->withErrors(['email' => 'Akun tidak valid.']);
    }    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
