<?php

namespace App\Http\Controllers;

use Closure;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        echo "I have just started<br>";
    }

    /**
     * Show a cool message
     * @return string
     */
    public function show(): string
    {
        return "I am the show method of this project";
    }

    /**
     * Get the middleware that should be assigned to the controller
     * @return void
     */
    public static function middleware(): array
    {
        return [
            function (Request $request, Closure $next)
            {
                return $next($request);
            }
        ];
    }
}
