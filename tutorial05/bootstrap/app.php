<?php

use App\Http\Middleware\LanguageSet;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Session\Middleware\StartSession;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(StartSession::class);
        $middleware->append(LanguageSet::class); //Make a middleware run through every request
        /*
        $middleware->alias([ //Register alias so you do not need to import every time, just call name on the middleware
            "languageset" => LanguageSet::class
        ]);
        */
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
