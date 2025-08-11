<?php
use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;

//php artisan route:list -Shows all routes
//php artisan route:list --except-vendor -Shows only your created routes

Route::view("test-themecolors", "test.themecolors");

Route::get("test-queue", function(){
    //dispatch sends a job to the queue
    dispatch(function(){
        $msg = __("Hello from the queue") . "!";
        logger($msg);//logger display a message to the log
    });

    dispatch(function(){
        $msg = __("This message was delayed") . ".";
        logger($msg);//logger display a message to the log
    })->delay(5);

    //You can create specific jobs to have them sent at a given time
    $job = Job::first();
    TranslateJob::dispatch($job);
});

Route::get("test-mail", function(){
    $target_email    = "matheusoaresmartins2020@gmail.com";
    $job_email       = new JobPosted(Job::first());

    Mail::to($target_email, "Matheus")
        ->send($job_email);

    return __("Done");
});

Route::get('/', function () {
    $greeting   = __("Hello!");

    $data       = compact("greeting");

    return view('home', $data);
})->name("home");

Route::group(["prefix" => "jobs", "as" => "jobs"], function(){//Group them together pass default prefix url, and them default name prefix
    Route::controller(JobController::class)->group(function(){//Set all to use the same controller
        Route::get("/", "index");

        Route::get("/create", "create")->middleware("auth")->name(".create");

        Route::post("/", "store")->middleware("auth")->name(".store");

        //Wildcards should generally stick to the bottom
        Route::get("/{p1}", "show")->name(".info");

        Route::get("/{p1}/edit", "edit")->middleware("auth")->can("job-control", "p1")->name(".edit");

        Route::patch("/{p1}/update", "update")->middleware("auth")->can("edit", "p1")->name(".update");//Policies, JobPolicy

        Route::delete("/{p1}/delete", "delete")->middleware("auth")->can("job-control", "p1")->name(".delete");
    });
});

Route::get("/contact", function(){
    $greeting   = __("Hello!");

    $data       = compact("greeting");

    return view("contact", $data);
})->name("contact");

//Middleware auth, expects a route named exactly "login"
Route::get("/login", function(){
    return redirect(route("user.index"));
})->name("login");

// Auth
Route::group(["prefix" => "user", "as" => "user"], function(){
    Route::controller(RegisteredUserController::class)->group(function(){
        Route::get("/register", "create")->name(".register");
        Route::put("/register", "store")->name(".store");
    });

    Route::controller(SessionController::class)->group(function(){
        Route::get("/login", "index")->name(".index");
        Route::post("/enter", "enter")->name(".login");
        Route::post("/logout", "logout")->name(".logout");
    });
});

