<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::post("/", function(Request $request){
    dd($request->all());
});

Route::put("/{id}", function(Request $request, $id){
    //dd($request->all());

    return $id;
});

Route::delete("/{id}", function($id){
    //dd($request->all());

    //delete post based on the id
    return $id;
});

Route::get("/test", function (){
    $body = "";
    $body .= "<h1>" . __('Test') . "</h1>";

    return $body;
});

Route::get("clear", function(){
    //Limpa tudo
    Artisan::call("cache:clear");
    Artisan::call("config:clear");
    Artisan::call("route:clear");
    Artisan::call("view:clear");
    Artisan::call("event:clear");
    Artisan::call("clear-compiled");

    //Forca refazer otimizacoes
    //Artisan::call("optimize");

    return __("Laravel cache cleared succesfully!");
});

