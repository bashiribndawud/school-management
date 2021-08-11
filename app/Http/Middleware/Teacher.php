<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Illuminate\Http\Request;

class Teacher
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        if(Auth::user()->role == 'admin') {
            return redirect()->route('dashboard');
        }

        if(Auth::user()->role == 'student') {
            return redirect()->route('dashboard_student');
            
        }

        if(Auth::user()->role == 'teacher') {
            return $next($request);
            
        }
    }
}
