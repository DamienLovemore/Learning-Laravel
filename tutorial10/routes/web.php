<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TagController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\SearchController;

Route::get('/', [JobController::class, "index"])->name("home");
Route::group(["prefix" => "jobs", "as" => "jobs."], function(){
    Route::controller(JobController::class)->middleware("auth")->group(function(){
        Route::get("/create", "create")->name("create");
        Route::post("/", "store")->name("store");
    });
});

Route::get("/search", SearchController::class);

Route::group(["as" => "user_reg."], function(){
    Route::controller(RegisteredUserController::class)->group(function(){
        // Route::middleware("guest")->group(function(){
            Route::get("/register",  "create")->name("create");
            Route::post("/register", "store")->name("store");
        // });
    });
});

Route::group(["as" => "session."], function(){
    Route::controller(SessionController::class)->group(function(){
        Route::middleware("guest")->group(function(){
            Route::get("/login", "create")->name("create");
            Route::post("/login", "store")->name("store");
        });

        Route::delete("/logout", "destroy")->middleware("auth")->name("destroy");
    });
});

Route::group(["prefix" => "tags", "as" => "tags."], function(){
    Route::controller(TagController::class)->group(function(){
        Route::get("/show/{tag_name}", "show")->name("show");
        Route::get("/jobs/{tag:name}", "getJobs")->name("jobs");
    });
});
