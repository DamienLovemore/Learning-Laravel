<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(LoginUserRequest $request)
    {
        // return $this->ok($request->input("email"));
        //Attempts to validate the user input
        $request->validated($request->all());

        //Attempts to login in
        $login_data = $request->only("email", "password");
        if(!Auth::attempt($login_data))
            return $this->error("Invalid login credentials! Try again", 401);
        else
        {
            $user = User::firstWhere("email", $login_data["email"]);
            $data = [
                "token" => $user->createToken("API token for " . $user->name)->plainTextToken//plainTextToken to ge the unhashed version
            ];
            return $this->ok("You're now logged in!", data: $data);
        }
    }

    public function register()
    {
        $this->ok("Registered =)", []);
    }

    public function login_message()
    {
        return $this->ok("You´re now logged in", []);

        // return response()->json([
        //     "message" => "You´re now logged in"
        // ]);
    }
}
