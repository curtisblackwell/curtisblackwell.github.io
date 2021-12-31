<nav id="js-nav-menu" class="hidden nav-menu lg:hidden">
    <ul class="my-0">
        <li class="pl-4">
            <a
                title="Home"
                href="/"
                class="nav-menu__item hover:text-blue-500 {{ $page->isActive('/') ? 'active text-blue' : '' }}"
            >Home</a>
        </li>
        <li class="pl-4">
            <a
                title="{{ $page->siteName }} Blog"
                href="/blog"
                class="nav-menu__item hover:text-blue-500 {{ $page->isActive('/blog') ? 'active text-blue' : '' }}"
            >Blog</a>
        </li>
    </ul>
</nav>
