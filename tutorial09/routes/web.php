<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $greeting   = __("Hello!");
    $data       = compact("greeting");

    return view('home', $data);
})->name("home");

Route::get("/jobs", function(){
    $jobs       = Job::all();
    $data       = compact("jobs");

    return view("jobs", $data);
})->name("jobs");

Route::get("/jobs/{p1}", function($p1){
    $id         = (int)base64_decode($p1);
    $job        = Job::find($id);
    $data       = compact("job");

    return view("job", $data);
})->name("job-info");

Route::get("/contact", function(){
    return view("contact");
})->name("contact");
