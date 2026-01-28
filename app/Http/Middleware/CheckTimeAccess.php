<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckTimeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $now = Carbon::now();
        $startTime = Carbon::createFromTime(7, 0, 0); // 7:00 AM
        $endTime = Carbon::createFromTime(20, 0, 0); // 8:00 PM
        if ($now->between($startTime, $endTime)) {
            return $next($request);
        } else {
            return response()->json([
                'message' => 'Access denied.',
                'current_time' => $now->toDateTimeString()
            ], 403);
        }
    }
}
