<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    private const textRegex = "/^[a-zA-Z0-9\s\-\.\;\,\!\:\?\"\“\”\'\(\)wáéíóúâêîôûãõçÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]+$/";

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();

        session()->put("showPostsFrom", "posts");

        return view("posts.index", ["posts" => $posts]);
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
                "title" => "required|string|min:3|max:70|unique:posts|regex:".$this::textRegex,
                "content" => "required|string|min:10|regex:".$this::textRegex
            ]);

            /*
                //Gets the id of the current logged in user, and make this post be related to it.
                $validated["user_id"] = auth()->id();
            */

            try
            {
                //Old way without user
                //Post::create($validated);

                //Creates a new instance of the related model (One to Many, "User" being the "one")
                auth()->user()->posts()->create($validated);

                $signalMessages["status"] = "SUCCESS";
                $signalMessages["message"] = "Post created succesfully!";

                $targetRedirect = session("showPostsFrom", "posts");
                $urlRedirect = route("posts.index");

                if($targetRedirect === "admin")
                    $urlRedirect = route("admin");

                return redirect()->to($urlRedirect)->with($signalMessages);
            }
            catch(\Exception $e)
            {
                $signalMessages["status"] = "ERROR";
                $signalMessages["message"] = "Could not create the post in the database, database connection problem!";
            }
        }
        else
        {
            $signalMessages["status"] = "ERROR";
            $signalMessages["message"] = "All the required parameters should be passed in the request!";
        }

        return back()->with($signalMessages);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //$post = Post::findOrFail($id);//If not found, throw a 404 exception

        return view("posts.show", ["post" => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //Only allow it to pass if it has the permissions
        Gate::authorize("update", $post);

        return view("posts.edit", ["post" => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        Gate::authorize("update", $post);

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
                "title" => "required|string|min:3|max:70|regex:".$this::textRegex,
                "content" => "required|string|min:10|regex:".$this::textRegex
            ]);

            $success = $post->updateOrFail($validated);
            if ($success)
            {
                $signalMessages["status"] = "SUCCESS";
                $signalMessages["message"] = "Post edited succesfully!";

                return redirect()->route("posts.show", $post)->with($signalMessages);
            }
        }
        else
        {
            $signalMessages["status"] = "ERROR";
            $signalMessages["message"] = "All the required parameters should be passed in the request!";
            return back()->with($signalMessages);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        Gate::authorize("delete", $post);

        $signalMessages = [
            "status" => "",
            "message" => ""
        ];

        $success = $post->deleteOrFail();
        if ($success)
        {
            $signalMessages["status"] = "SUCCESS";
            $signalMessages["message"] = "Post deleted succesfully!";

            $targetRedirect = session("showPostsFrom", "posts");
            $urlRedirect = route("posts.index");

            if($targetRedirect === "admin")
                $urlRedirect = route("admin");

            return redirect()->to($urlRedirect)->with($signalMessages);
        }
    }
}
