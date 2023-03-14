<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\View\View;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Display the login view.
     */
    public function login()
    {
        if(Auth::check()){
            return redirect()->route('dashboard');
        }else{
            return view('backend.login.login');
        }

    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }
    Public function forgetPassword()
    {
        return view('backend.login.forget_password');
    }
}
