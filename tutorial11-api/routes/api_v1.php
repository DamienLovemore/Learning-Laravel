<?php
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\UsersController;
use Illuminate\Support\Facades\Route;

//Exclude the urls that API usually does not need, like create and edit
//Requires user to be logged in with a Bearer token in the Authentication
Route::middleware("auth:sanctum")->apiResource("tickets", TicketController::class);
Route::middleware("auth:sanctum")->apiResource("users", UsersController::class);
