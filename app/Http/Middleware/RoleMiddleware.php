<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Maneja la solicitud entrante.
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!auth()->check() || auth()->user()->tipo !== $role) {
            abort(403, 'No tienes permiso para acceder a esta página.');
        }

        return $next($request);
    }
}
