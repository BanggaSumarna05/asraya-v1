<?php

namespace App\Helpers;

class BlogHelper
{
    /**
     * Allowed HTML tags for blog content output.
     * Script, iframe, object, embed, etc. are intentionally excluded.
     */
    private const ALLOWED_TAGS = [
        'p', 'br', 'strong', 'b', 'em', 'i', 'u', 's', 'del',
        'h1', 'h2', 'h3', 'h4', 'h5', 'h6',
        'ul', 'ol', 'li', 'blockquote', 'pre', 'code',
        'a', 'img', 'figure', 'figcaption',
        'table', 'thead', 'tbody', 'tfoot', 'tr', 'th', 'td',
        'div', 'span', 'section', 'article',
        // video divs injected by convertMedia are safe — added via our own code
    ];

    /**
     * Sanitize raw blog HTML content to remove dangerous tags,
     * then process media embeds.
     */
    public static function convertMedia($content)
    {
        if (!$content) return $content;

        // 1) Strip disallowed tags (keep allowed ones)
        $allowedTagString = '<' . implode('><', self::ALLOWED_TAGS) . '>';
        $content = strip_tags($content, $allowedTagString);

        // 2) Neutralise javascript: and data: URI schemes in href/src attributes
        $content = preg_replace(
            '/\s(href|src|action)\s*=\s*["\']?\s*(javascript:|data:|vbscript:)[^"\'>\s]*/i',
            ' $1="#"',
            $content
        );

        // 3) Remove on* event handler attributes (onclick, onerror, onload, etc.)
        $content = preg_replace('/\s+on\w+\s*=\s*(?:"[^"]*"|\'[^\']*\'|[^\s>]*)/i', '', $content);

        // 4) Embed YouTube links
        $content = preg_replace_callback(
            '/https?:\/\/(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/shorts\/)([\w-]+)/',
            function ($matches) {
                $videoId = htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8');
                return '
                <div class="ratio ratio-16x9 my-4">
                    <iframe src="https://www.youtube.com/embed/' . $videoId . '"
                        title="YouTube video"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen
                        style="width:100%; height:100%; border:0;">
                    </iframe>
                </div>';
            },
            $content
        );

        // 5) Embed local video files (mp4/webm) — URL is escaped
        $content = preg_replace_callback(
            '/(https?:\/\/[^\s]+?\.(mp4|webm)|\/storage\/[^\s]+?\.(mp4|webm))/',
            function ($matches) {
                $url = htmlspecialchars($matches[1], ENT_QUOTES, 'UTF-8');
                return '
                <div class="ratio ratio-16x9 my-4">
                    <video controls>
                        <source src="' . $url . '" type="video/mp4">
                        Browser kamu tidak mendukung video.
                    </video>
                </div>';
            },
            $content
        );

        return $content;
    }
}
