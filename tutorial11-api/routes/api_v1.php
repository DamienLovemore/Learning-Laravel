<?php
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorTicketsController;
use Illuminate\Support\Facades\Route;

//Exclude the urls that API usually does not need, like create and edit
//Requires user to be logged in with a Bearer token in the Authentication
Route::middleware("auth:sanctum")->apiResource("tickets", TicketController::class);
Route::middleware("auth:sanctum")->apiResource("authors", AuthorsController::class);
Route::middleware("auth:sanctum")->apiResource("authors.tickets", AuthorTicketsController::class);
