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
        // switch (Auth::user()->role) {
        //     case 'minister':
        //         return redirect()->route('minister');
        //         break;
        //     case 'permsec':
        //         return redirect()->route('permsec');
        //         break;
        //     default:
        //         return redirect('/home');
        // }
        

        // return $next($request);
    }
}
