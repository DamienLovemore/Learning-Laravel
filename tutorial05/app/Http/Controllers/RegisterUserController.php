<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function register()
    {
        return view("auth.register");
    }

    public function store(Request $request)
    {
        if ($request->filled("name") && $request->filled("email") && $request->filled("password"))
        {

        }
        
        return back();
    }
}
