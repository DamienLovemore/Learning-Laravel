<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $req)
    {
        //Tenta pegar um usuário que tenha sido registrado com esse email
        $user = User::where(["email" => $req->email])->first();

        if($user && Hash::check($req->password, $user->password))//Quando não encontra retorna null, Hash::Check pra conferir senha encriptada
        {
            //Passa o usuário logado na sessão e depois envia para a página de produtos
            session()->put("user", $user);
            dd(session());

            return redirect("/products");
        }
        else
            return redirect("/");
    }
}
