<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Check the request to see if the Authenticated user has
     * the correct user typ for the area they are trying to access/request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::user()->role === 'admin') {
            return $next($request);
        }
        return redirect()->route('home')->with('error','You don\'t have admin permission');
    }
}
