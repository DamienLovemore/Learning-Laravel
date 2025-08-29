<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// php artisan install:api to enable API in the Laravel project (There should be a api.php file in routes)
// url begins with api/

Route::get("/", function(){
    $data = ["message" => "Hello World!"];

    return response()->json($data);
});

Route::get("/loginmessage", [AuthController::class, "login_message"]);
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
