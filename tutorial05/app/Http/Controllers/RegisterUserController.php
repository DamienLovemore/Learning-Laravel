<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegisterUserController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        $signalMessages = [
            "status" => "",
            "message" => ""
        ];

        if ($request->filled("name") && $request->filled("email") && $request->filled("password"))
        {
            //Ensure that it is 8 - 35 characters, at least on letter, at least one number, at least one symbol, and that is is not compromissed in data leaks.
            $password_validator = Password::min(8)->max(35)->letters()->numbers()->symbols()->uncompromised();

            $request->validate([
                "name"  => "required|string|min:10|max:100|regex:/^[a-zA-ZwáéíóúâêîôûãõçÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]+(\s+[a-zA-ZwáéíóúâêîôûãõçÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]+)+$/",
                "email" => "required|string|min:7|max:254|unique:users|email:rfc,dns,spoof,strict",
                "password" => ["required", "string", "confirmed", $password_validator],
            ]);

            try
            {
                //Creates the user in the database
                $user = User::create([
                    "name" => $request->name,
                    "email" => $request->email,
                    "password" => Hash::make($request->password)
                ]);

                //Login the user that was created
                auth()->login($user);

                $signalMessages["status"] = "SUCCESS";
                $signalMessages["message"] = "You have been registered successfully, and is now logged in!";

                return redirect()->to("/")->with($signalMessages);
            }
            catch(\Exception $erro)
            {
                abort(500);
            }
        }

        return abort(403);//Forbidden(Trying to pass a invalid post)
    }
}
