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
        $credentials = $request->only('email', 'password');
        
        // Attempt to authenticate using different guards
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole(Auth::guard('web')->user());
        } elseif (Auth::guard('pembina')->attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole(Auth::guard('pembina')->user());
        } elseif (Auth::guard('siswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return $this->redirectBasedOnRole(Auth::guard('siswa')->user());
        } else {
            return back()->withErrors([
                'email' => 'These credentials do not match our records.',
            ]);
        }
    }

    /**
     * Redirect user based on their role.
     */
    protected function redirectBasedOnRole($user): RedirectResponse
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('dashboard.siswa');
        } elseif ($user->hasRole('pembina')) {
            return redirect()->route('dashboard.pembina');
        } elseif ($user->hasRole('siswa')) {
            return redirect()->route('dashboard.siswa');
        } else {
            return redirect()->route('home');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        if (Auth::guard('web')->check()) {
            Auth::guard('web')->logout();
        }

        if (Auth::guard('pembina')->check()) {
            Auth::guard('pembina')->logout();
        }

        if (Auth::guard('siswa')->check()) {
            Auth::guard('siswa')->logout();
        }

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
