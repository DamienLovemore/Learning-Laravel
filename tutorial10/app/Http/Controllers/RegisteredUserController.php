<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rules\File;

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
        //Image rules, it needs to be a jpg, jpeg or png. And the dimension need to a maximum of 600 width and 400 height.
        $img = File::types(["jpg", "jpeg", "png"])
                    ->dimensions(Rule::dimensions()->maxWidth(600)->maxHeight(400));
        $employer_attr = $request->validate([
            "name" => ["required", "min:6", "max:60", "regex:/^[a-zA-ZáàâãéèêíïóôõöúçñÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ0-9\h]+$/"],//Letters and accents(lower and upper case), numbers and space.
            "logo" => ["required", $img, "image"]
        ]);

        $user = User::create($user_attr);
    }
}
