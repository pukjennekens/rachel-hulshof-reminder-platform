<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckWelcomePage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If the user has visited the welcome page before, redirect them to the dashboard
        if(!$request->session()->has('visited_welcome')) {
            $request->session()->put('visited_welcome', true);
            return redirect()->route('welcome');
        }

        return $next($request);
    }
}
