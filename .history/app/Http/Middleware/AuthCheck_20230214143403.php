<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!Session()->has('loginID')) {
    //         return redirect('login')->with('fail', 'Vous devez vous connecter.');
    //     }
    //     return $next($request);
    // }
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
        if (!Session()->has('loginID')) {
            return redirect('login')->with('fail', 'Vous devez vous connecter.');
        }
    }
}
