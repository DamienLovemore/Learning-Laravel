<?php
use App\Http\Controllers\GreetController;

use Illuminate\Support\Facades\Route;

Route::get("greet1", GreetController::class);

Route::get("greet2", function(){
    return view("greeting", ["name" => "Alice"]);
});

Route::get("erere", function(){
    return redirect("/greet1");
});