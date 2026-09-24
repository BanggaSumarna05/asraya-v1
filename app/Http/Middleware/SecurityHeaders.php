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

        // Referrer policy
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        // HSTS — force HTTPS for 1 year, include subdomains
        $response->headers->set(
            'Strict-Transport-Security',
            'max-age=31536000; includeSubDomains'
        );

        // Cross-Origin-Opener-Policy — isolate browsing context
        $response->headers->set('Cross-Origin-Opener-Policy', 'same-origin-allow-popups');

        // Cross-Origin-Resource-Policy
        $response->headers->set('Cross-Origin-Resource-Policy', 'same-site');

        // Permissions policy — disable unnecessary browser features
        $response->headers->set(
            'Permissions-Policy',
            'camera=(), microphone=(), geolocation=(), payment=()'
        );

        // Content Security Policy
        $response->headers->set(
            'Content-Security-Policy',
            implode('; ', [
                "default-src 'self'",

                // Scripts: self + CDNs used by the app
                "script-src 'self' 'unsafe-inline' 'unsafe-eval'"
                    . " https://cdn.jsdelivr.net"
                    . " https://ajax.googleapis.com"
                    . " https://maxcdn.bootstrapcdn.com"
                    . " https://cdnjs.cloudflare.com",

                // Styles: self + Google Fonts + CDNs
                "style-src 'self' 'unsafe-inline'"
                    . " https://fonts.googleapis.com"
                    . " https://cdn.jsdelivr.net"
                    . " https://maxcdn.bootstrapcdn.com"
                    . " https://cdnjs.cloudflare.com",

                // Fonts: self + Google Fonts + Font Awesome
                "font-src 'self'"
                    . " https://fonts.gstatic.com"
                    . " https://cdnjs.cloudflare.com",

                // Images: self + data URIs + blob + own domain
                "img-src 'self' data: blob:"
                    . " https://www.asrayaproperty.com"
                    . " https://asrayaproperty.com"
                    . " https://ui-avatars.com"
                    . " https://maps.gstatic.com"
                    . " https://maps.googleapis.com",

                // Frames: YouTube embed + self
                "frame-src 'self'"
                    . " https://www.youtube.com"
                    . " https://www.youtube-nocookie.com",

                // Media: self + blob (for video)
                "media-src 'self' blob:",

                // Connect: self only (no external API calls from JS)
                "connect-src 'self'",

                // No plugins
                "object-src 'none'",

                "base-uri 'self'",
                "form-action 'self'",
                "upgrade-insecure-requests",
            ])
        );

        return $response;
    }
}
