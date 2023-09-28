<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Session::has('type') && Session::get('type') === 'Admin') {
            return $next($request);
        }


        // If the user is not an Admin, you can return a response or redirect as needed.
        return redirect()->back()->with('error', 'Not an Admin');
    }
}