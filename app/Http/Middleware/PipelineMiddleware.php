<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Pipeline;
use Symfony\Component\HttpFoundation\Response;

class PipelineMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user  = $request->user();
        return Pipeline::send($user)
        ->through([
            new CheckUserStatusMiddleware,
            new CheckUserSubscriptionMiddleware,
        ])->then(fn () => $next($request));

        return $next($request);
    }
}
