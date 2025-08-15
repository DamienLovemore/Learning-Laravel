<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("auth.register");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Password rules, minimun of 7 characters with a maximum of 25 characters. It needs to have at least one letter, one number and one symbol.
        $pass = Password::min(7)
                        ->max(25)
                        ->letters()
                        ->numbers()
                        ->symbols();

        //User specific validations
        $user_attr = $request->validate([
            "name"          => ["required"],
            "email"         => ["required", "email:rfc,dns,spoof", "max:254", "unique:users,email"],
            "password"      => ["required", $pass, "confirmed"]
        ]);

        //Employer specific validations
        $employer_attr = $request->validate([
            "employer"      => ["required", "min:6", "max:60", "regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ0-9\h]+$/"],//Letters and accents(lower and upper case), numbers and space.
            "logo"          => ["required", File::types(["png", "jpg", "webp"]), "dimensions:min_width=300,min_height=300,max_width=1000,max_height=1000"]
        ]);

        $user = User::create($user_attr);

        //Store the uploadede file into a folder called logos
        $logo_path = $request->logo->store("logos");

        //Register the employer for this user
        $user->employer()->create([
            "name"      => $employer_attr["employer"],
            "logo"      => $logo_path
        ]);

        //Log in the user
        Auth::login($user);

        //Redirect to the home page
        return redirect(route("home"));
    }
}
