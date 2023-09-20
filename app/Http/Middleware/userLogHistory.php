<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class userLogHistory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user_os = $_SERVER['HTTP_USER_AGENT'];

        DB::table('user_log_histories')->insert([
            'last_ip' => $request->ip(),
            'email' => $request->email,
            'device_info' => $user_os,
            'created_at' => now()
        ]);

        return $next($request);
    }
}
