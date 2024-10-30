<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
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
        //$posts = Post::all();

        //with in a model defines eager loading a relationship, for better performances.
        $posts = Post::with("category")->get();

        return view("posts.index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view("posts.create", compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        /*
        $request->validate([
            "title" => ["required"],
            "text" => ["required"],
            "category_id" => ["required"]
        ]);

        Post::create([
            "title" => $request->input("title"),
            "text" => $request->input("text"),
            "category_id" => $request->input("category_id")
        ]);
        */ //Now using a separate Request to handle validation

        //After the StorePostRequest validated the data, and it did not return any errors, them it returns all the data that it verified.
        Post::create($request->validated());

        return redirect()->route("posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view("posts.edit", compact("post", "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        /*
            $post->update([
                "title" => $request->input("title"),
                "text" => $request->input("text"),
                "category_id" => $request->input("category_id")
            ]);
        */

        $post->update($request->validated());

        return redirect()->route("posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route("posts.index");
    }
}
