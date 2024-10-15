<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        // $dummyCategories = ["Categoria 1", "Categoria 2"];
        // $allCategories = DB::table('Categories')->get();

        $categories = Category::all();
        // $posts = Post::orderBy('id', 'desc')->get();
        // $posts = Post::latest()->get();

        //$posts = Post::where("category_id", request("category_id"))->latest()->get(); //Only gets the posts of that category
        $posts = Post::when(request("category_id"), function($query){
            $query->where("category_id", request("category_id"));
        })->latest()->get();

        //return view('home', ['categories' => $categories, "posts" => $posts]);
        return view("home", compact("categories", "posts"));
    }
}
