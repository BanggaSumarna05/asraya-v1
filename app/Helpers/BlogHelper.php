<?php

namespace App\Helpers;

class BlogHelper
{
    public static function convertMedia($content)
    {
        if (!$content) return $content;

        // 1) Embed YouTube
        $content = preg_replace_callback(
            '/https?:\/\/(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/|youtube\.com\/shorts\/)([\w-]+)/',
            function ($matches) {
                $videoId = $matches[1];
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

        // 2) Embed video lokal (mp4/webm)
        $content = preg_replace_callback(
            '/(https?:\/\/[^\s]+?\.(mp4|webm)|\/storage\/[^\s]+?\.(mp4|webm))/',
            function ($matches) {
                $url = $matches[1];
                return '
                <div class="my-4">
                    <video controls style="width:100%; border-radius:10px;">
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
