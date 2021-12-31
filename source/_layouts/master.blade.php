<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="description" content="{{ $page->description ?? $page->siteDescription }}">

        <meta property="og:title" content="{{ $page->title ? $page->title . ' | ' : '' }}{{ $page->siteName }}"/>
        <meta property="og:type" content="{{ $page->type ?? 'website' }}" />
        <meta property="og:url" content="{{ $page->getUrl() }}"/>
        <meta property="og:description" content="{{ $page->description ?? $page->siteDescription }}" />

        <title>{{ $page->title ?  $page->title . ' | ' : '' }}{{ $page->siteName }}</title>

        <link rel="home" href="{{ $page->baseUrl }}">
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="/manifest.json">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#6c5c8d">
        <meta name="apple-mobile-web-app-title" content="🐐">
        <meta name="application-name" content="🐐">
        <meta name="theme-color" content="#6c5c8d">
        <link href="/blog/feed.atom" type="application/atom+xml" rel="alternate" title="{{ $page->siteName }} Atom Feed">

        @if ($page->production)
            <!-- Insert analytics code here -->
        @endif

        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,300i,400,400i,700,700i,800,800i" rel="stylesheet">
        <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    </head>

    <body class="flex flex-col justify-between min-h-screen font-sans leading-normal text-gray-800 bg-gray-100">
        <header class="flex items-center h-24 py-4 bg-white border-b shadow" role="banner">
            <div class="container flex items-center px-4 mx-auto max-w-8xl lg:px-8">
                <div class="flex items-center">
                    <a href="/" title="{{ $page->siteName }} home" class="inline-flex items-center">
                        <img
                            class="h-16 mr-3"
                            src="/assets/img/goat.svg"
                            alt="Simple line-drawing of a wide-eyed goat used as a logo"
                        />

                        <h1 class="my-0 text-lg font-semibold text-blue-800 md:text-2xl hover:text-blue-600">{{ $page->siteName }}
                        </h1>
                    </a>
                </div>

                <div id="vue-search" class="flex items-center justify-end flex-1">
                    <search></search>

                    @include('_nav.menu')

                    @include('_nav.menu-toggle')
                </div>
            </div>
        </header>

        @include('_nav.menu-responsive')

        <main role="main" class="container flex-auto w-full max-w-5xl px-6 py-16 mx-auto">
            @yield('body')
        </main>

        <footer class="relative py-4 mt-12 text-sm text-center bg-white">
            <ul class="flex flex-col justify-center space-x-4 list-none md:flex-row">
                <li><a href="./resume.pdf">Resumé</a></li>
                <li><a href="https://github.com/curtisblackwell">Github</a></li>
                <li><a href="/blog">Writing</a></li>
                <li>
                    <a href="&#x6d;&#97;&#105;&#x6c;&#116;&#111;&#x3a;&#x69;&#97;&#109;&#x40;&#99;&#117;&#x72;&#x74;&#105;s&#x62;&#108;&#97;&#x63;&#x6b;&#119;e&#x6c;&#108;&#46;&#x63;&#x6f;&#109;?&#x73;&#117;&#98;&#x6a;&#x65;&#99;&#x74;&#x3d;🐐&#38;&#x62;&#x6f;&#100;y&#x3d;&#73;&#37;&#x32;&#x30;&#119;a&#x6e;&#110;&#97;&#x25;&#x32;&#48;s&#x65;&#110;&#100;&#x25;&#x32;&#48;&#x79;&#x6f;&#117;&#37;&#x32;&#48;&#51;&#x30;&#x25;&#50;0🐐&#x73;&#44;%&#x32;&#48;&#98;&#x75;&#x74;&#37;2&#x30;&#102;&#105;&#x72;&#x73;&#116;&#x25;&#x32;&#48;&#73;&#x25;&#50;&#48;&#x6e;&#x65;&#101;&#100;&#x25;&#50;&#48;&#x79;&#x6f;&#117;r&#x25;&#50;&#48;&#x61;&#x64;&#100;r&#x65;&#115;&#115;&#x2e;"
                    >Email</a>
                </li>
            </ul>
        </footer>

        <script src="{{ mix('js/main.js', 'assets/build') }}"></script>
        @stack('scripts')
    </body>
</html>
