<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function store(Request $request)
    {
        $signalMessages = [
            "status" => "",
            "message" => ""
        ];

        if ($request->filled("email") && $request->filled("password"))
        {

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

        return redirect()->route("posts.index")->with($signalMessages);
    }
}
