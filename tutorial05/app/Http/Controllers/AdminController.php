<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class AdminController extends Controller
{
    public function index()
    {
        $posts = Post::all();

        session()->put("showPostsFrom", "admin");

        return view("admin.index", compact("posts"));
    }
}
