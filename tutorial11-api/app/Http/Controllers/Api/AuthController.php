<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginUserRequest;
use App\Traits\ApiResponses;
use Illuminate\Support\Facades\Auth;


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
            $user       = User::firstWhere("email", $login_data["email"]);
            $exp_dat    = now()->addHours(1);
            $data = [
                "token" => $user->createToken("API token for " . $user->name, ["*"], $exp_dat)->plainTextToken//plainTextToken to ge the unhashed version
            ];
            return $this->ok("You're now logged in!", data: $data);
        }
    }

    public function logout(Request $request)
    {
        $logged_user = $request->user();
        if(!empty($logged_user))
        {
            //Removes all the acess tokens for the user
            //$logged_user->tokens()->delete();
            //Removes the user current access token
            $logged_user->currentAccessToken()->delete();

            $msg = "User {$logged_user->name} - {$logged_user->email} was logged out sucessfully";
            return $this->ok($msg);
        }
        else
            return $this->error("You're not logged in", 401);
    }

    public function register()
    {
        $this->ok("Registered =)");
    }

    public function login_message()
    {
        return $this->ok("You´re now logged in");

        // return response()->json([
        //     "message" => "You´re now logged in"
        // ]);
    }
}
