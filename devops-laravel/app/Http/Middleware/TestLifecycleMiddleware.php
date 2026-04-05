<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TestLifecycleMiddleware {
    public function handle($request, Closure $next) {
        \Log::info('🟡 Before Controller (Middleware)');
        $response = $next($request);
        \Log::info('🟢 After Controller (Middleware)');
        return $response;
    }
}
