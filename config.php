<?php

use Illuminate\Support\Str;

return [
    'baseUrl'         => '',
    'production'      => false,
    'siteName'        => 'Curtis Blackwell',
    'siteDescription' => 'Writings about my personal and professional growth.',
    'siteAuthor'      => 'Curtis Blackwell',

    // collections
    'collections' => [
        'posts' => [
            'author' => 'Curtis Blackwell', // Default author, if not provided in a post
            'sort'   => '-date' ,
            'path'   => 'blog/{filename}' ,
            'filter' => fn ($post) => $post->published,
        ],
        'categories' => [
            'path'  => '/blog/categories/{filename}',
            'posts' => function ($page, $allPosts) {
                return $allPosts->filter(function ($post) use ($page) {
                    return $post->categories ? in_array($page->getFilename(), $post->categories, true) : false;
                });
            },
        ],
    ],

    // helpers
    'getDate' => function ($page) {
        return $page->date
            ? Datetime::createFromFormat('U', $page->date)
            : Datetime::createFromFormat('Y-m-d', substr($page->getFilename(), 0, 10));
    },
    'getExcerpt' => function ($page, $length = 255) {
        if ($page->excerpt) {
            return $page->excerpt;
        }

        $content = preg_split('/<!-- more -->/m', $page->getContent(), 2);
        $cleaned = trim(
            strip_tags(
                preg_replace(['/<pre>[\w\W]*?<\/pre>/', '/<h\d>[\w\W]*?<\/h\d>/'], '', $content[0]),
                '<code>'
            )
        );

        if (count($content) > 1) {
            return $cleaned;
        }

        $truncated = substr($cleaned, 0, $length);

        if (substr_count($truncated, '<code>') > substr_count($truncated, '</code>')) {
            $truncated .= '</code>';
        }

        return strlen($cleaned) > $length
            ? preg_replace('/\s+?(\S+)?$/', '', $truncated) . '...'
            : $cleaned;
    },
    'isActive' => function ($page, $path) {
        return $path === '/'
            ? $page->getPath() === ''
            : Str::endsWith(trimPath($page->getPath()), trimPath($path));
    },
];
