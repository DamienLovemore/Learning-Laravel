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

        //Posts Handler
        Route::resource("/posts", PostController::class);

        //Users Regist Handler
        Route::get("/register", [RegisterUserController::class, "register"])->name("register");
        Route::post("/register", [RegisterUserController::class, "store"])->name("register.store");

        //Users Login Handler
        Route::get("/login", [LoginUserController::class, "login"])->name("login");
        Route::post("/login", [LoginUserController::class, "store"])->name("login.store");

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
});


//Post - Routes
/*
Route::get("/posts", [PostController::class, "index"]);
Route::get("/posts/create", [PostController::class, "create"]);
Route::post("/posts", [PostController::class, "store"]);
Route::get("/posts/{id}", [PostController::class, "show"]);
Route::get("/posts/{id}/edit", [PostController::class, "edit"]);
Route::put("/posts/{id}", [PostController::class, "update"]);
Route::delete("/posts/{id}", [PostController::class, "destroy"]);
*/

/*
Route::get("/test", function (){
    $body = "";
    $body .= "<h1>" . __('Test') . "</h1>";

    return $body;
});
*/
