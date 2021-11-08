---
title: About
description: A little bit about the site
---
@extends('_layouts.master')

@section('body')
    @md
        # About
        <div class="grid grid-cols-4 gap-16">
            <section class="col-span-3" markdown="1">
                Hey there fellow human!

                My name is Curtis Blackwell 🐐. I write here about myself and my work. I intend to focus on my growth and share excerpts from my journaling that I find interesting.

                You can expect to find content related to [high sensitivity](https://hsperson.com/), my hobbies, software development, management, and thinking about things as systems/engines/I'm-not-great-at-articulating-this-yet. I'll bet a lot of it will be me processing what I learn from [people who inspire me](Inspiring%20People.md).
            </section>

            <aside markdown="1">
                ## Elsewhere
                - [My website](https://curtisblackwell.com/)
                - [Twitter](https://twitter.com/_cpb)
                - [Polywork](https://www.polywork.com/curtisblackwell)
            </aside>
        </div>


        ---


        # Reading {.text-2xl}
        - Geek Incentives, Kent Beck
        - Agile coaches' writing, Kent Beck, Ron Jeffries, and GeePaw Hill
        - Shape Up, Ryan Singer
        - Thinking in Services, Majid Iqbal (in progress)
        - First Break All The Rules, Gallup (in progress)
        - Design for Safety, Eva PenzeyMoog (up next)
        - Resilient Management, Lara Hogan (up next)

    @endmd
</div>
@endsection
