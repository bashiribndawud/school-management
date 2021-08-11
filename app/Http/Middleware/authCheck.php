<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class authCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  \string  $authCheck
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $authCheck)
    {
        if($authCheck == "admin" && auth()->user->role_id != 1){
            abort(403);
        }

        if($authCheck == "employee" && auth()->users->role_id != 2){
            abort(403);
        }

        if($authCheck == "student" && auth()->users->role_id != 3){
            abort(403);
        }
        return $next($request);
    }
}
