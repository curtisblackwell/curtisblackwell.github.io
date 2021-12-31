---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.master')

@section('body')
    @md
        # Gettin' Better without Ron Funches
        <div class="grid grid-cols-4 gap-16">
            <section class="col-span-3" markdown="1">
                Hey there fellow human!

                My name is Curtis Blackwell 🐐. I write here about myself and my work. I intend to focus on my growth and share some of my journaling excerpts that I find interesting.

                You can expect to find content related to [high sensitivity](https://hsperson.com/), my hobbies, software development, management, and thinking about things as systems/engines/I'm-not-great-at-articulating-this-yet. I'll bet a lot of it will be me processing what I learn from [people who inspire me](/inspiring-people).
            </section>

            <aside markdown="1">
                ## Elsewhere
                - [Twitter](https://twitter.com/_cpb)
                - [Polywork](https://www.polywork.com/curtisblackwell)
            </aside>
        </div>


        ---


        # Reading {.text-2xl}
        - [Geek Incentives](https://geekincentives.substack.com), Kent Beck
        - Agile coaches' writing, [Kent Beck](https://twitter.com/KentBeck); [Ron Jeffries](https://ronjeffries.com); and [GeePaw Hill](https://twitter.com/GeePawHill)
        - [Shape Up](https://basecamp.com/shapeup/webbook), Ryan Singer
        - [Thinking in Services](https://www.bispublishers.com/thinking-in-services.html), Majid Iqbal (in progress)
        - [First, Break All the Rules: What the World's Greatest Managers Do Differently](https://store.gallup.com/p/en-us/10286/first-break-all-the-rules), Gallup (in progress)
        - [Design for Safety](https://abookapart.com/products/design-for-safety), Eva PenzeyMoog (up next)
        - [Resilient Management](https://abookapart.com/products/resilient-management), Lara Hogan (up next)
    @endmd

    <hr class="my-6 border-b">

    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')

        @if ($post != $pagination->items->last())
            <hr class="my-6 border-b">
        @endif
    @endforeach

    @if ($pagination->pages->count() > 1)
        <nav class="flex my-8 text-base">
            @if ($previous = $pagination->previous)
                <a
                    href="{{ $previous }}"
                    title="Previous Page"
                    class="px-5 py-3 mr-3 bg-gray-200 rounded hover:bg-gray-400"
                >&LeftArrow;</a>
            @endif

            @foreach ($pagination->pages as $pageNumber => $path)
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3 {{ $pagination->currentPage == $pageNumber ? 'text-blue-600' : 'text-blue-700' }}"
                >{{ $pageNumber }}</a>
            @endforeach

            @if ($next = $pagination->next)
                <a
                    href="{{ $next }}"
                    title="Next Page"
                    class="px-5 py-3 mr-3 bg-gray-200 rounded hover:bg-gray-400"
                >&RightArrow;</a>
            @endif
        </nav>
    @endif
@stop
