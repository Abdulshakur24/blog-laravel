<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function register()
    {
        return view('users.register');
    }

    public function createUserAndLogin(Request $request)
    {
        $formFields = $request->validate([
            "name" => ['required', 'min:3'],
            "email" => ['required', 'email', Rule::unique('users', 'email')],
            "password" => 'required|confirmed|min:6',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);


        $user = User::create($formFields);

        auth()->login($user);
        $request->session()->regenerate();

        return redirect('/')->with('message', 'Your account have been successfully created.');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();
            return redirect('/')->with('message', "You're now logged in.");
        }

        return back()->withErrors(['email' => 'invalid credentials'])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');
    }
}
