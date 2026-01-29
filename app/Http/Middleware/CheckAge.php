<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->is('age') || $request->is('login') || $request->is('register')) {
            return $next($request);
        }
        $user = session()->has('user');
        if (!$user) {
            return redirect('login');
        }
        $age = session('age');
        if (!$age) {
            return redirect('age');
        } else if ($age < 18) {
            return response()->json([
                'message' => 'Access denied. You must be at least 18 years old to access this resource.',
                'age' => $age
            ], 403);
        } else {
            return $next($request);
        }
    }
}
