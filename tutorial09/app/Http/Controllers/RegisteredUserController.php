<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        //At least 5 characters, with a maximum of 25. Requires one letter, one number, and one symbol.
        $pass_rules = Password::min(5)
            ->max(25)
            ->letters()
            ->numbers()
            ->symbols();

        //Verifies if the input received is valid or not
        $validated = $request->validate([
            "first_name" => "required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ0-9\h]+$/|min:5|max:50",
            "last_name"  => "required|regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ0-9\h]+$/|min:5|max:50",
            "email"      => "required|email:rfc,dns,spoof",
            "password"   => ["required", "min:5", "max:25", $pass_rules, "confirmed"]
        ]);

        //Creates the user
        $user       = User::create($validated);

        //Log in with the created user
        Auth::login($user);

        return redirect(route("jobs"));
    }
}
