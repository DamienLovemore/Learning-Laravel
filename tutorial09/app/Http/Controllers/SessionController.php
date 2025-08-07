<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function enter(Request $request)
    {
        //At least 5 characters, with a maximum of 25. Requires one letter, one number, and one symbol.
        $pass_rules = Password::min(5)
            ->max(25)
            ->letters()
            ->numbers()
            ->symbols();

        //Verifies if the input received is valid or not
        $validated = $request->validate([
            "email"      => "required|email:rfc,dns,spoof",
            "password"   => ["required", "min:5", "max:25", $pass_rules, "confirmed"]
        ]);

        //Try to login in with the given credentials
        $login_success = Auth::attempt($validated);
        if(!$login_success)
        {
            $failed_attempt = [
                "login" => __("This password does not match our records.")
            ];

            throw ValidationException::withMessages($failed_attempt);
        }

        //Resets the session token(security reasons)
        $request->session()->regenerate();

        return redirect(route("jobs"));
    }

    public function logout()
    {
        //Log out of the current user session
        Auth::logout();

        return redirect(route("home"));
    }
}
