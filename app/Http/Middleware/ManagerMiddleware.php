<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ManagerMiddleware
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
        if (session('role') !== 'manager') {
            return redirect()->route('login')->withErrors('Sizda managerlik huquqi yo\'q');
        }
        return $next($request);
    }
}
