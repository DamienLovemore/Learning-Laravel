<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Category;

abstract class Controller
{
    public function index()
    {
        //$dummyCategories = ["Categoria 1", "Categoria 2"];
        //$allCategories = DB::table("categories")->get(); //Facade Style
        $allCategories = Category::all();

        return view("home", ["categories" => $allCategories]);
    }
}
