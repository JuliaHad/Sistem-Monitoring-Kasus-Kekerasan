<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class OperatorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || auth()->user()->role !== 'operator') {
            abort(403);
        }

        return $next($request);
    }
}