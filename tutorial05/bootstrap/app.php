<?php

use App\Http\Middleware\CanViewPost;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\LanguageSet;
use App\Http\Middleware\SessionPersist;
use App\Http\Middleware\auth2;

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
            "can-view-post" => CanViewPost::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
