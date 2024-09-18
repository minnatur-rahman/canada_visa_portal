<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminGuard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!Auth::user()) return redirect()->route('login')->with('error', 'Unauthorized Access!');
        if(Auth::user()->role == 'admin') {
            return $next($request);
        }else{
            Auth::logout();
            return redirect()->route('login')->with('error', 'Unauthorized Access!');
        }
        
    }
}
