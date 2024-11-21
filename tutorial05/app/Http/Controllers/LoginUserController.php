<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class LoginUserController extends Controller
{
    public function login()
    {
        $passwordSH = "hide";

        return View::make("auth.login", compact("passwordSH"));
    }

    public function store(Request $request)
    {
        $signalMessages = [
            "status" => "",
            "message" => ""
        ];

        if ($request->filled("email") && $request->filled("password"))
        {
            $request->validate([
                "email" => "required|string|min:7|max:254|email:rfc,dns,spoof,strict",
                "password" => "required|string"
            ]);

            try
            {
                $loginAttempt = [
                    "email" => $request->email,
                    "password" => $request->password
                ];
                if(Auth::guard("web")->attempt($loginAttempt))
                {
                    $signalMessages["status"] = "SUCCESS";
                    $signalMessages["message"] = "You have been logged in successfully";

                    return redirect()->intended(route("posts.index"))->with($signalMessages);
                }
                else{
                    return back()->withErrors([
                        "email" => __("The provided credentials do not match our records")
                    ]);
                }
            }
            catch(\Exception $erro)
            {
                abort(500);
            }
        }

        return abort(403);//Forbidden(Trying to pass a invalid post)
    }

    public function logout(Request $request)
    {
        $signalMessages = [
            "status" => "",
            "message" => ""
        ];

        //Logs out always from the web (not the API)
        Auth::guard("web")->logout();

        $request->session()->invalidate();//Destroy the session and generates another
        $request->session()->regenerateToken();//Generate another CRSF token

        $signalMessages["status"] = "SUCCESS";
        $signalMessages["message"] = "You are logged out";

        return redirect()->to("/")->with($signalMessages);
    }
}
