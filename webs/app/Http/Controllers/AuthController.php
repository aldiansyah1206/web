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
        $request->validate([
            'nrp' => ['required', 'size:9', 'required_with:password', new LoginRule($request->password)],
            'password' => ['required'],
        ]);

        if (Auth::attempt(['nrp' => $request->nrp, 'password' => $request->password])) {
            return redirect()->intended('/home');
        }

        return redirect()->back()->withErrors(['nrp' => 'NRP atau kata sandi salah.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}