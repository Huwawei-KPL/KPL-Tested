<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MasterKonsumsi
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
        $abc = Auth::user();
        if ($abc &&  ($abc->admin == 4 ||  $abc->admin == 3)) {
            return $next($request);
        }

        return back();
    }
}
