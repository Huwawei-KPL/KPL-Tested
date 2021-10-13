<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterUser
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
        $authenticate = Auth::user();
        if ($authenticate &&  $authenticate->admin == 2 ||  $authenticate->admin == 3) {
            return $next($request);
        }

        return back();
    }
}
