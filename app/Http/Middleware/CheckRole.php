<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

    //     if(Auth::check() && Auth::user()->hasRole('minister')){
    //         return redirect()->route('minister');
    //     }elseif (Auth::check() && Auth::user()->hasRole('permsec')) {
    //         return redirect()->route('permsec');
    //     }
    //     else{
    //         return redirect('/home'); 
    //     }

    //     // return $next($request);
    // }
}
