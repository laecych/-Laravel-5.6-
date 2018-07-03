<?php

namespace App\Http\Middleware;

use Closure;

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
        // dd($request->user()); //除錯用

        if (!$request->user()->hasAnyPermission('後台管理')) {
            abort(403);
        }

        return $next($request);
    }
}
