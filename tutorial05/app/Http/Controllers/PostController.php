<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get all posts from database
        $username = "Alfredo";
        $age = 32;
        $posts = [
            "Post 1",
            "Post 2",
            "Post 3"
        ];

        return view("posts.index", compact("username", "age", "posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("posts.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $signalMessages = [
            "status" => "",
            "message" => ""
        ];

        //Verify is the request and post parameters are being passed right.
        //dd($request);
        //dd($request->all());
        if ($request->filled("title") && $request->filled("content"))
        {
            $validated = $request->validate([
                "title" => "required|string|alpha_dash|min:3|max:50|unique:posts",
                "content" => "required|string|alpha_dash|min:10"
            ]);

            Post::create([
                "title" => $validated["title"],
                "content" => $validated["content"]
            ]);

            $signalMessages["status"] = "SUCCESS";
            $signalMessages["message"] = "Post created succesfully!";
            return redirect()->route("posts.index")->with($signalMessages);
        }
        else
        {
            $signalMessages["status"] = "ERROR";
            $signalMessages["message"] = "All the required parameters should be passed in the request!";
            return back()->with($signalMessages);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view("posts.show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return view("posts.edit");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
