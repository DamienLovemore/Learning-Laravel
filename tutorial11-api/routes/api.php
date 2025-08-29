<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Models\Ticket;

// php artisan install:api to enable API in the Laravel project (There should be a api.php file in routes)
// url begins with api/
// The Accept header defines the media types that the client is able to accept from the server. For instance, Accept: application/json, text/html indicates that the client prefers JSON or HTML responses. This information allows the server to send a resource representation that meets the client's needs.

Route::get("/", function(){
    $data = ["message" => "Hello World!"];

    return response()->json($data);
});

Route::get("/loginmessage", [AuthController::class, "login_message"]);
Route::post("/login", [AuthController::class, "login"]);
Route::post("/register", [AuthController::class, "register"]);

Route::get("/tickets", function(){
    return Ticket::all();
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
