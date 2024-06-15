<?php

namespace App\Http\Controllers;

use App\Rules\LoginRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'equired|email',
            'password' => 'equired',
        ]);

        if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('admin.dashboard'));
        }
        if (Auth::guard('pembina')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('pembina.dashboard'));
        }
        if (Auth::guard('siswa')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->intended(route('siswa.dashboard'));
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}