<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SecurityHeaders
{
    /**
     * Handle an incoming request and add HTTP security headers.
     */
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Prevent clickjacking
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN');

        // Prevent MIME-type sniffing
        $response->headers->set('X-Content-Type-Options', 'nosniff');

        // Enable XSS filter in older browsers
        $response->headers->set('X-XSS-Protection', '1; mode=block');

        // Referrer policy — don't leak URL details to third-party sites
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // Permissions policy — disable unnecessary browser features
        $response->headers->set(
            'Permissions-Policy',
            'camera=(), microphone=(), geolocation=(), payment=()'
        );

        // Content Security Policy
        // - Allows self + CDNs explicitly used by the app
        // - 'unsafe-inline' is required because the project uses inline styles/scripts
        $response->headers->set(
            'Content-Security-Policy',
            implode('; ', [
                "default-src 'self'",
                "script-src 'self' 'unsafe-inline' 'unsafe-eval'"
                    . " https://cdn.jsdelivr.net"
                    . " https://ajax.googleapis.com"
                    . " https://maxcdn.bootstrapcdn.com"
                    . " https://cdnjs.cloudflare.com",
                "style-src 'self' 'unsafe-inline'"
                    . " https://fonts.googleapis.com"
                    . " https://cdn.jsdelivr.net"
                    . " https://maxcdn.bootstrapcdn.com"
                    . " https://cdnjs.cloudflare.com",
                "font-src 'self'"
                    . " https://fonts.gstatic.com"
                    . " https://cdnjs.cloudflare.com",
                "img-src 'self' data: blob:"
                    . " https://www.asrayaproperty.com"
                    . " https://asrayaproperty.com"
                    . " https://ui-avatars.com",
                "frame-src 'self'"
                    . " https://www.youtube.com"
                    . " https://www.youtube-nocookie.com",
                "media-src 'self' blob:",
                "connect-src 'self'",
                "object-src 'none'",
                "base-uri 'self'",
                "form-action 'self'",
                "upgrade-insecure-requests",
            ])
        );

        return $response;
    }
}
