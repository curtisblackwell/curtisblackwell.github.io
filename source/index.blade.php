@extends('_layouts.master')

@section('body')
    <div class="grid grid-cols-3 gap-16">
        <div class="col-span-2">
            @include('_home-content')
        </div>

        <div>
            <h2>Featured Writin's</h2>
            @foreach ($posts->where('featured')->sortBy('featured') as $featuredPost)
                <div class="w-full mb-6">
                    @if ($featuredPost->cover_image)
                        <img src="{{ $featuredPost->cover_image }}" alt="{{ $featuredPost->title }} cover image" class="mb-6">
                    @endif

                    <p class="my-2 font-medium text-gray-700">
                        {{ $featuredPost->getDate()->format('Y.m.d') }}
                    </p>

                    <h2 class="mt-0 text-3xl">
                        <a href="{{ $featuredPost->getUrl() }}" title="Read {{ $featuredPost->title }}" class="font-extrabold text-gray-900">
                            {{ $featuredPost->title }}
                        </a>
                    </h2>

                    <p class="mt-0 mb-4">{!! $featuredPost->getExcerpt() !!}</p>

                    <a href="{{ $featuredPost->getUrl() }}" title="Read - {{ $featuredPost->title }}" class="mb-4 tracking-wide uppercase">
                        Read
                    </a>
                </div>

                @if (! $loop->last)
                    <hr class="my-6 border-b">
                @endif
            @endforeach
        </div>
    </div>
@stop
