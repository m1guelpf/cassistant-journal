<?php

use Illuminate\Support\Carbon;

return [
    'baseUrl' => env('APP_URL', ''),
    'production' => env('NODE_ENV', 'development') == 'production',
    'siteName' => 'Cassistant Journal',
    'siteDescription' => 'Generate an elegant blog with Jigsaw',
    'siteAuthor' => 'Miguel Piedrafita',

    // collections
    'collections' => [
        'posts' => [
            'extends' => '_layouts.post',
            'section' => 'content',
            'path' => 'journal/{date}',
            'sort' => '-date',
            'author' => 'Miguel Piedrafita',
        ],
    ],

    // helpers
    'getDate' => function ($page) {
        return Carbon::createFromFormat('d/m/Y', $page->date);
    },
    'getExcerpt' => function ($page, $length = 255) {
        $content = $page->excerpt ?? $page->getContent();
        $cleaned = strip_tags(
            preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content),
            '<code>'
        );

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return ends_with(trimPath($page->getPath()), trimPath($path));
    },
];
