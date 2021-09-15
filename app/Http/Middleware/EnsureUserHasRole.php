<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @param null $permission
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role, $permission = null)
    {
        if(!$request->user()->hasRole($role)) {
            abort(403);
        }

        if($permission !== null && !$request->user()->can($permission)) {
            abort(403);
        }

        return $next($request);
    }
}
