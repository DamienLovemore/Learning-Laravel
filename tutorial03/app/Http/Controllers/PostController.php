<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    /*
    public function show($postId)
    {
        $post = Post::find($postId);

        return view("post", compact("post"));
    }
    */
    public function show(Post $post)
    {
        return view("post", compact("post"));
    }
}
