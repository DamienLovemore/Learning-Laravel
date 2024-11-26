<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Jobs\SendNewPostMailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

use App\Models\Post;

class PostController extends Controller
{
    private const textRegex = "/^[a-zA-Z0-9\s\-\—\.\;\,\!\:\?\%\⁰\&\"\“\”\'\(\)\[\]wàáéíóúâêîôûãõçÁÀÂÃÉÈÊÍÏÓÔÕÖÚÇÑ]+$/";
    private const imageValdRules = "image|extensions:png,jpg,jpeg|min:2";
    private const imageThumbRules = "dimensions:min_width=200,min_height=200,max_width=1280,max_height=720";

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
                "content" => "required|string|min:10|regex:" . $this::textRegex,
                "thumbnail" => $this::imageValdRules . "|" . $this::imageThumbRules
            ]);

            /*
                //Gets the id of the current logged in user, and make this post be related to it.
                $validated["user_id"] = auth()->id();
            */

            try
            {
                //Old way without user
                //Post::create($validated);

                //After the validation has passed with we pass thumbnail the way it is we will store the path of temp file, and not actually store the image in the filesystem. of the server.
                $urlStoredImage = null;
                if($request->hasFile("thumbnail"))
                {
                    $uploadedFile = $request->file("thumbnail");
                    $currentTimeStamp = Date::now();
                    $currentTimeStamp = $currentTimeStamp->format("Y_m_d_h_i_s");

                    $originalName = $uploadedFile->getClientOriginalName();
                    $lastPos = strrpos($originalName, ".");
                    $extensionPart = substr($originalName, $lastPos);
                    $name = explode($extensionPart, $originalName)[0];

                    //Tenta salvar com nome original do arquivo + data/hora
                    if (mb_strlen($name) > 0 && mb_strlen($extensionPart) > 0)
                    {
                        $fileName = $name . "_" . $currentTimeStamp . $extensionPart;
                        //Removes all whitespaces to prevent not being able to attach images in a email
                        $fileName = preg_replace("/\s+/", '', $fileName);

                        //Store in the "thumbnails" directory within the app folder, with the specified filename, and returns the path to it in a string
                        $validated["thumbnail"] = $uploadedFile->storeAs("thumbnails", $fileName);
                    }
                    else //Caso contrário gera um nome aleatório
                    {
                        $validated["thumbnail"] = $uploadedFile->store("thumbnails");
                    }

                    //Pega a url verdadeira que foi salva, e não a temporária original antes de pegar o valor de ->store
                    $urlStoredImage = asset("storage/" . $validated["thumbnail"]);
                }

                //Creates a new instance of the related model (One to Many, "User" being the "one")
                $createdPost = auth()->user()->posts()->create($validated);

                //Try to send a welcome email to the user, using jobs so it is asyncronous and does not make create takes too long.
                $formattedBody = Str::words($validated["content"], 20, "...");

                $emailJob = new SendNewPostMailJob($validated["title"], $formattedBody, $urlStoredImage, route("posts.show", $createdPost->id));
                dispatch($emailJob);

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
                "content" => "required|string|min:10|regex:" . $this::textRegex,
                "thumbnail" => "sometimes|" . $this::imageValdRules . "|" . $this::imageThumbRules
            ]);

            if($request->hasFile("thumbnail"))
            {
                $uploadedFile = $request->file("thumbnail");
                $currentTimeStamp = Date::now();
                $currentTimeStamp = $currentTimeStamp->format("Y_m_d_h_i_s");

                $originalName = $uploadedFile->getClientOriginalName();
                $lastPos = strrpos($originalName, ".");
                $extensionPart = substr($originalName, $lastPos);
                $name = explode($extensionPart, $originalName)[0];

                //If the user has uploaded a File them deletes it, to put the new file.
                if(!empty($post->thumbnail) && mb_strlen($post->thumbnail) > 0)
                {
                    $storedFilePath = storage_path("app/public/" . $post->thumbnail);
                    File::delete($storedFilePath);
                }

                if (mb_strlen($name) > 0 && mb_strlen($extensionPart) > 0)
                {
                    $fileName = $name . "_" . $currentTimeStamp . $extensionPart;
                    $fileName = preg_replace("/\s+/", '', $fileName);

                    $validated["thumbnail"] = $uploadedFile->storeAs("thumbnails", $fileName);
                }
                else
                {
                    $validated["thumbnail"] = $uploadedFile->store("thumbnails");
                }
            }

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

        if (!empty($post->thumbnail) && mb_strlen($post->thumbnail) > 0)
        {
            $storedFilePath = storage_path("app/public/" . $post->thumbnail);
            $successFile = File::delete($storedFilePath);
        }
        else
        {
            $successFile = true;
        }

        $successModel = $post->deleteOrFail();
        if ($successFile && $successModel)
        {
            $signalMessages["status"] = "SUCCESS";
            $signalMessages["message"] = "Post deleted succesfully!";

            $targetRedirect = session("showPostsFrom", "posts");
            $urlRedirect = route("posts.index");

            if($targetRedirect === "admin")
                $urlRedirect = route("admin");

            return redirect()->to($urlRedirect)->with($signalMessages);
        }
        else if (!$successFile)//Verifica se o modelo foi apagado com sucesso, mais o arquivo de imagem thumbnail não.
        {
            $signalMessages["status"] = "WARNING";
            $signalMessages["message"] = "Post deleted succesfully, but the file thumbnail file could not be deleted!";

            $targetRedirect = session("showPostsFrom", "posts");
            $urlRedirect = route("posts.index");

            if($targetRedirect === "admin")
                $urlRedirect = route("admin");

            return redirect()->to($urlRedirect)->with($signalMessages);
        }
    }
}
