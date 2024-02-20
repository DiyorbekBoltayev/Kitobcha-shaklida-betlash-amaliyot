<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //check session have username
        if (!session()->has('username')) {
            return redirect()->route('login');
        }
        if (session('role') !== 'admin') {
            return redirect()->route('login')->withErrors('Sizda adminlik huquqi yo\'q');
        }
        return $next($request);
    }
}
