<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckDay
{

    public function handle(Request $request, Closure $next)
    {
        $today = date('D');

        if($today=='Thu'){
        return $next($request);
        }
         
    }
}
