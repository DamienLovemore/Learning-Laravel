<?php
use App\Http\Controllers\Api\V1\TicketController;
use App\Http\Controllers\Api\V1\AuthorsController;
use App\Http\Controllers\Api\V1\AuthorTicketsController;
use Illuminate\Support\Facades\Route;

Route::middleware("auth:sanctum")->group(function(){
    //Exclude the urls that API usually does not need, like create and edit
    //Requires user to be logged in with a Bearer token in the Authentication
    Route::apiResource("tickets", TicketController::class)->except(["update"]);
    Route::put("tickets/{ticket}", [TicketController::class, "replace"]);

    Route::apiResource("authors", AuthorsController::class);
    Route::apiResource("authors.tickets", AuthorTicketsController::class)->except(["update"]);
    Route::put("authors/{author}/tickets/{ticket}", [AuthorTicketsController::class, "replace"]);
});
