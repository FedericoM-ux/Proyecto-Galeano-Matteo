<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, string $role): Response
{
    // 1. Si el usuario no está logueado, afuera directamente.
    if (!$request->user()) {
        abort(403, 'No tienes autorización.');
    }

    // 2. Sacamos el rol_id del usuario actual (que sabemos que es 2)
    $userRolId = $request->user()->rol_id;

    // 3. Comprobamos si coincide de cualquiera de las dos formas:
    //    - Si la ruta manda un "2" y el usuario tiene un 2
    //    - Si la ruta manda "cliente" y sabemos que "cliente" equivale al ID 2
    $esCliente = ($role == '2') || ($role == 'cliente' && $userRolId == 2);
    $esAdmin   = ($role == '1') || ($role == 'admin'   && $userRolId == 1);

    // 4. Si la ruta pide cliente pero el usuario NO es cliente (o viceversa para admin), rebota
    if (($role == 'cliente' || $role == '2') && !$esCliente) {
        abort(403, 'No tienes autorización para acceder a esta sección.');
    }
    
    if (($role == 'admin' || $role == '1') && !$esAdmin) {
        abort(403, 'No tienes autorización para acceder a esta sección.');
    }

    return $next($request);
}
}