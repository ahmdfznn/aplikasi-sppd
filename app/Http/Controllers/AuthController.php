<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login', [
            'title' => 'Login Admin'
        ]);
    }

    public function check(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register Admin'
        ]);
    }

    public function store(Request $request)
    {

        if (User::where('username', $request->username)) {
            return redirect('register')->with('account', 'Akun sudah ada');
        }

        $request->session()->regenerate();

        $validated = $request->validate([
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        $validated['password'] = bcrypt($request->password);

        User::create($validated);

        return redirect(RouteServiceProvider::HOME);
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
