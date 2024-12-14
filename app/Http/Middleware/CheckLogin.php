<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    // Check xem người dùng đã đăng nhập hay  chưa ;
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check()) {
            return $next($request);
        }

        return back() ;
    }
}