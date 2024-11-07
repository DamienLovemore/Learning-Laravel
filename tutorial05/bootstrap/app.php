<?php

use App\Http\Middleware\LanguageSet;
use App\Http\Middleware\SessionPersist;
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
        $middleware->alias([ //Register alias so you do not need to import every time, just call name on the middleware
            "sessionpersist" => SessionPersist::class,
            "languageset" => LanguageSet::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
