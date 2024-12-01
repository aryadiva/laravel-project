<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class CheckHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // login implementation is pending
        Log::debug("Custom middleware is called...");
        Log::debug($request->header());
        $ua = $request->header('User-Agent'); // Use the header() method
        if (str_contains($ua, 'Mozillaaa')) {
            return redirect('unauth');
        }
        return $next($request);
    }
}
