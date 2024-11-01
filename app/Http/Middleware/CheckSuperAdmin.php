<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSuperAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(!Auth::user()->isSuperAdmin ){
                return redirect()->back();
            }
        }
        return $next($request);
    }
}
