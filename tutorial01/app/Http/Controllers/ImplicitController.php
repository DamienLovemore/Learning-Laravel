<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ImplicitController extends Controller
{
    public function getIndex()
    {
        echo "Starting method";
    }

    public function getVal($id)
    {
        echo "show value";
    }

    public function getAdminData()
    {
        echo "admin data method";
    }

    public function adminPassword()
    {
        echo "Password Method";
    }
}
