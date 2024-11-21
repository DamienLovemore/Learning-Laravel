<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\PostController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::group(["middleware" => "sessionpersist"], function(){
    //Muda a lingua do aplicativo e volta para a página da onde veio
    Route::get("set-language/{language}", function(string $language){
        session()->put("language", $language);
        return redirect()->back();
    });

    Route::group(["middleware" => "languageset"], function(){
        //Home Page
        Route::view("/", "welcome")->name("home");//If you do not need additional logic, you can just use view

        Route::group(["middleware" => ["auth", "auth2"]], function(){
            //Posts Logged Handler
            Route::get("/posts/create", [PostController::class, "create"])->name("posts.create");
            Route::post("/posts", [PostController::class, "store"])->name("posts.store");
            Route::get("/posts/{post}/edit", [PostController::class, "edit"])->name("posts.edit");
            Route::put("/posts/{post}", [PostController::class, "update"])->name("posts.update");
            Route::delete("/posts/{post}", [PostController::class, "destroy"])->name("posts.destroy");

            Route::post("/logout", [LoginUserController::class, "logout"])->name("logout");

            //Others
            Route::get("/clear", function(){
                //Limpa tudo
                Artisan::call("cache:clear");
                Artisan::call("config:clear");
                Artisan::call("route:clear");
                Artisan::call("view:clear");
                Artisan::call("event:clear");
                Artisan::call("clear-compiled");

                //Forca refazer otimizacoes
                Artisan::call("optimize");

                return view("clearcaches");
            })->name("clearlaravel");
        });

        //Unlogged user options
        Route::group(["middleware" => "guest"], function(){
            //Users Regist Handler
            Route::get("/register", [RegisterUserController::class, "register"])->name("register");
            Route::post("/register", [RegisterUserController::class, "store"])->name("register.store");

            //Users Login Handler
            Route::get("/login", [LoginUserController::class, "login"])->name("login");
            Route::post("/login", [LoginUserController::class, "store"])->name("login.store");
        });

        //Post no need to log handler
        Route::get("/posts", [PostController::class, "index"])->name("posts.index");
        Route::get("/posts/{post}", [PostController::class, "show"])->middleware("can-view-post")->name("posts.show");
    });
});

/*
Route::get("/test", function (){
    $body = "";
    $body .= "<h1>" . __('Test') . "</h1>";

    return $body;
});
*/
