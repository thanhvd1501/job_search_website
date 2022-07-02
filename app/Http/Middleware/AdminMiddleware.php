<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ( ! Auth ::guard('admin') -> check()) {
            dd(1);
            return redirect() -> route('login');
        }
        dd(2);

        return $next($request);
    }
}
