<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('page.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')], true)) {
            return redirect()->route('index');
        } else {
            return redirect()->route('login')->with('error', 'Sai tài khoản hoặc mật khẩu!');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}
