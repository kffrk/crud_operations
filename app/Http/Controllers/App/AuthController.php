<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('auth.login');
    }

    public function authenticate(LoginFormRequest $request) {
        $data = $request->validated();

        if (Auth::attempt($data)) {
            session()->flash('success', 'Logged in successfully');
            return redirect()->route('index');
        } else {
            session()->flash('danger', 'Invalid email or password');
            return redirect()->back();
        }
    }

    public function logout() {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        session()->flash('success', 'Logged out');
        return redirect()->route('login');
    }
}
