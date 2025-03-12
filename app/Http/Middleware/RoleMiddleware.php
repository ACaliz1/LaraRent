<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            abort(403, 'No tienes permiso para acceder.');
        }

        return $next($request);
    }
}
