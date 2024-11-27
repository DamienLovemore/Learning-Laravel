<?php
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;//Not import facade, but in the console.php you import the facade

use App\Http\Middleware\LanguageSet;
use App\Http\Middleware\SessionPersist;
use App\Http\Middleware\auth2;
use App\Http\Middleware\CanViewPost;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Mail;
use App\Mail\PostCountMail;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([ //Register alias so you do not need to import every time, just call name on the middleware
            "sessionpersist" => SessionPersist::class,
            "languageset" => LanguageSet::class,
            "auth2" => auth2::class,
            "can-view-post" => CanViewPost::class,
            "is-admin" => IsAdminMiddleware::class
        ]);
    })
    ->withSchedule(function(Schedule $schedule){
        $schedule->call(function  (){
            $mailInstance = new PostCountMail();

            $mailToSend = Mail::to("admin@gmail.com");

            $mailToSend->send($mailInstance);
        })
        ->weekdays()
        ->timezone("America/Sao_Paulo")
        ->between("8:00", "17:00")
        ->unlessBetween("12:00", "13:00")
        ->everyMinute();//Send the count of emails monday to friday, between 08 and 17, except break time(12 to 13), using the timezone of Brazil every minute.
    })
    ->withExceptions(function (Exceptions $exceptions) {//Custom error views and messages for Exception that occur
        $exceptions->render(function (ModelNotFoundException $e, Request $request){//Trying to use show route for a post that does not exist
            return response()->view("errors.404");//Not found error
        });
    })->create();
