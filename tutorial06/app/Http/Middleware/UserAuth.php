<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //--Do something before the request
        //path() everything after root
        if($request->path() === "login" && session()->has("user"))
        {
            return redirect("/products");
        }

        //Keeps the normal requst
        return $next($request);
    }
}
