<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->role === 'manager') {
            return $next($request);
        }
        return response()->redirectTo('/', 403);
    }
}
