<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ApiLoginRequest;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponses;

    public function login(ApiLoginRequest $request)
    {
        return $this->ok($request->input("email"));
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
