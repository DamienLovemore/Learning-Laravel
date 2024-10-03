<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DpController;
use App\Http\Controllers\GreetController;
use App\Http\Controllers\ImplicitController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    //return view('welcome');
    //return "Welcome to Index";
    return view("laravel", ["name" => "ABCS"]);
});

Route::post("user/dashboard", function (){
    return "Welcome to dashboard";
});

Route::put("user/add", function(){
    //TODO
});

Route::delete("post/example", function(){
    //TODO
});

Route::get("emp/{id}", function(string $id){
    echo "Emp ".$id;
})->where("id", "[0-9]+");

Route::get("emp/{name?}", function(?string $name = null){
    echo "Employee name: $name";
})->whereAlpha("name");

Route::get("emp/{desig?}", function(?string $design = null){
    echo $design;
});

Route::get("profile", [AdminController::class, "show"]);

Route::resource("tests", TestController::class);

Route::resources([
    "passwords" => PasswordController::class,
    "pictures" => DpController::class
]);

Route::get("greet1", GreetController::class);

Route::get("greet2", function(){
    return view("greeting", ["name" => "Alice"]);
});

Route::get("home", function(){
    return view("home");
});

Route::get("jsonReturn", fn() => response()->json(["message" => "Hi guys, this is a cool message."]));

Route::get("basicresponse", function(){
    return response("Hello World!", 200);
});

Route::get("anotherwelcome", fn() => response()->view("welcome"));

Route::get("laravel", function() {
    return response()->view("laravel", ["name" => "Damien Lovemore"]);
});

Route::get("/users", function(){
    /*
    $users =  [
        ["userid" => 1, "name" => "Fred"],
        ["userid" => 2, "name" => "Andrew"]
    ];
    */
    $users = DB::table("users")->get();

    return response()->json($users);
});

Route::get("signin", function(){
    return redirect("/greet2");
});

Route::get("sessions", [SessionController::class]);
