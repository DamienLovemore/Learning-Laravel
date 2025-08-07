<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function enter()
    {
        dd("Abracadabra!");
    }
}
