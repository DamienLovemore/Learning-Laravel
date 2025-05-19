<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

use Illuminate\Support\Facades\Route;

Route::group(["middleware" => "sessionpersist"], function() {
    Route::group(["middleware" => "auth2"], function () {
        Route::get('/', function () {
            return view('login_custom');
        });

        Route::get("/login", function(){
            dd(request()->path(), session());
        });

        Route::post("/loginsend", [UserController::class, "login"]);

        Route::get("/products", [ProductController::class, "index"]);

        Route::get("/clear", function(){
            //Limpa todos os caches
            Artisan::call("cache:clear");
            Artisan::call("config:clear");
            Artisan::call("route:clear");
            Artisan::call("view:clear");
            Artisan::call("event:clear");
            Artisan::call("clear-compiled");

            //Refaz as otimizações
            Artisan::call("optimize");

            return view("clearcaches");
        })->name("clearlaravel");
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
