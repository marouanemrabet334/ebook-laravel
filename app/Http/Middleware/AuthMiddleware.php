<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{

    public function handle(Request $request, Closure $next,string $userType): Response
    {
         if (!$request->user()) {
            return redirect()->route('user.login.index');
        }

        if ($request->user()->user_type === $userType) {
            return $next($request);
        }

        // Redirect based on user type
        if ($request->user()->user_type === 'admin') {
            return redirect()->route('admin.dashboard.index');
        } else {
            return redirect()->route('user.dashboard.index');
        }


    }
}