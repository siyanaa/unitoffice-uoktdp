<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TrackVisitors
{
    public function handle(Request $request, Closure $next)
    {
        $ipAddress = $request->ip();
        $userAgent = Hash::make($request->header('User-Agent'));

        $now = Carbon::now();

        // Check if the IP address has already been recorded today
        $visitor = Visitor::where('ip_address', $ipAddress)
                          ->whereDate('visited_at', $now->toDateString())
                          ->first();

        if (!$visitor) {
            // Record the visit
            Visitor::create([
                'ip_address' => $ipAddress,
                'user_agent' => $userAgent,
                'visited_at' => $now
            ]);
        }

        return $next($request);
    }
}