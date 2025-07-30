<?php
use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    $greeting   = __("Hello!");
    $data       = compact("greeting");

    return view('home', $data);
})->name("home");

Route::get("/jobs", function(){
    //https://laravelmagazine.com/differences-between-lazy-loading-and-eager-loading
    $jobs       = Job::with("employer")//Eager Loading with Relationships(Queries count reduced from 22 to 3;Solves N+1 problem)
                    ->paginate(20);//Switch to simplePaginate to display numbers of pags, just previous and next buttons. Or cursor paginate to be even more performant(no page in the url)
    $data       = compact("jobs");

    return view("jobs.index", $data);
})->name("jobs");

Route::get("/jobs/create", function(){
    return view("jobs.create");
})->name("jobs.create");

//Wildcards should generally stick to the bottom
Route::get("/jobs/{p1}", function($p1){
    $id         = (int)base64_decode($p1);
    $job        = Job::find($id);
    $data       = compact("job");

    return view("jobs.show", $data);
})->name("jobs.info");

Route::get("/contact", function(){
    $greeting   = __("Hello!");
    $data       = compact("greeting");

    return view("contact", $data);
})->name("contact");
