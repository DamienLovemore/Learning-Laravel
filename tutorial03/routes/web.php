<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
Route::get('/', function () {
    //return view('welcome');
    return view("home");
})->name("home");
*/
//Basic
Route::get("/", [HomeController::class, "index"])->name("home");
Route::view("contact", "contact")->name("contact");
Route::view("about", "about")->name("about");

//Posts
// Route::get("posts/{postId}", [PostController::class, "show"])->name("post.show");
Route::get("posts/{post}", [PostController::class, "show"])->name("post.show");

//Extra
Route::view("/second", "second");
