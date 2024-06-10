<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    use ValidatesRequests;

    public function loginPage(Request $request)
    {
        return view('auth.login');
    }

    public function registerPage(Request $request)
    {
        return view('auth.register');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:5|string'
        ]);
        if (Auth::attempt($request->only('email', 'password'))) {
            return to_route('home');
        }
        return to_route('login')->withErrors(['error' => 'Email or password invalid']);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:5|string'
        ]);
        $user = User::create($request->only('name', 'email', 'password'));
        Auth::login($user);
        return to_route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return to_route('home');
    }

}
