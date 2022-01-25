<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginPetugasController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:petugas',['except'=>'logout']);
    }

    public function formLogin()
    {
        return view('auth.login-petugas');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username'=>'required|exists:petugas',
            'password'=>'required'
        ]);

        if (Auth::guard('petugas')->attempt($credentials, $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended(config('invensa.prefix') );
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::guard('petugas')->logout();
        return redirect()->route('petugas.login');
    }
}
