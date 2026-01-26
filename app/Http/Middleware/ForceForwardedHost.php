<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceForwardedHost
{
    public function handle(Request $request, Closure $next)
    {
        $forwardedUrl = env('FIREBASE_FORWARDED_URL');

        if ($forwardedUrl) {
            $parts = parse_url($forwardedUrl);

            if (!empty($parts['host'])) {
                $request->server->set('HTTP_HOST', $parts['host']);
                $request->server->set('SERVER_NAME', $parts['host']);
                $request->server->set('SERVER_PORT', 443);
                $request->server->set('HTTPS', 'on');

                $request->headers->set('X-Forwarded-Host', $parts['host']);
                $request->headers->set('X-Forwarded-Proto', 'https');
            }
        }

        return $next($request);
    }
}
