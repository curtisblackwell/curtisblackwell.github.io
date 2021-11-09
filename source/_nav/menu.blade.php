<nav class="items-center justify-end hidden text-lg lg:flex">
    <a title="Home" href="/"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/') ? 'active text-blue-600' : '' }}">
        Home
    </a>

    <a title="{{ $page->siteName }} Blog" href="/blog"
        class="ml-6 text-gray-700 hover:text-blue-600 {{ $page->isActive('/blog') ? 'active text-blue-600' : '' }}">
        Blog
    </a>
</nav>
