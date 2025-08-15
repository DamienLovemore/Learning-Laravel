<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auth.login");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Verifies if the input received is valid or not
        $validated = $request->validate([
            "email"      => ["required", "email:rfc,dns,spoof"],
            "password"   => ["required"]
        ]);

        //Try to login in with the given credentials
        $login_success = Auth::attempt($validated);
        if(!$login_success)
        {
            $failed_attempt = [
                "password" => __("This password does not match our records.")
            ];

            throw ValidationException::withMessages($failed_attempt);
        }

        //Resets the session token(security reasons)
        $request->session()->regenerate();

        return redirect(route("home"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //Log out of the current user session
        Auth::logout();

        return redirect(route("home"));
    }
}
