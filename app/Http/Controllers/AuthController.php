<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * this function view login
     * @return View|Application|Factory
     */
    public function login(): View|Application|Factory
    {
        return view('auth.login');
    }

    /**
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function register(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');
    }


    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/');
}

public function register_store(Request $request)

    {
        $validated=$request->validate([
                'email' => 'required|email:rfc,dns|unique:users,email',
                'name' => 'required',
                'password' => 'required|min:8',
                'password_confirmation' => 'required|same:password'

        ]);

        $validated['password'] = Hash::make($validated['password'] );


        $user = User::create($validated);
        $user->roles()->attach([3]);

        auth()->login($user);

        return redirect('/')->with('success', "Account successfully registered.");
    }


}
