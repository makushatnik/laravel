<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogMiddleware
{
    private const LOG_TAG = 'LogMiddleware';

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        info($this::LOG_TAG . ' - ' . $request->url(),
            ['Content-Type' => $request->header('Content-Type')]);
        return $next($request);
    }
}
