<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

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
        if (Auth::user()->role->prefix == "admin") {
            return $next($request);
        }
        else if (Auth::user()->role->prefix == "moderator") {
            return redirect()->route("index");
        }

        abort(404);
    }
}
