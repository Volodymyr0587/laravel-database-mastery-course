@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-linear-to-b from-gray-900 to-gray-800 text-gray-200">

        {{-- Header --}}
        <div class="max-w-5xl mx-auto px-6 pt-16 pb-10">
            <h1 class="text-5xl md:text-6xl font-extrabold text-center text-white drop-shadow-lg">
                New Articles...
            </h1>
        </div>

        {{-- Posts --}}
        <div class="max-w-4xl mx-auto px-6 space-y-16 pb-20">

            @forelse($posts as $post)
                <article class="space-y-4">

                    {{-- Title --}}
                    <h2 class="text-3xl md:text-4xl font-bold text-white hover:text-gray-300 transition">
                        <a href="{{ route('posts.show', $post->id) }}">
                            {{ $post->title }}
                        </a>
                    </h2>

                    {{-- Excerpt --}}
                    <p class="text-lg text-gray-400 leading-relaxed">
                        {{ $post->excerpt }}
                    </p>

                    {{-- Meta --}}
                    <div class="flex items-center space-x-3 text-sm text-gray-500">
                        <span>
                            {{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}
                        </span>

                        <span class="text-red-500">•</span>

                        <span>
                            {{ $post->min_to_read }} min read
                        </span>
                    </div>

                    {{-- Category badge (optional) --}}
                    {{-- @if ($post->category)
                        <div>
                            <span class="inline-block bg-red-600 text-white text-xs font-semibold px-3 py-1 rounded-full">
                                {{ $post->category->name }}
                            </span>
                        </div>
                    @endif --}}

                    {{-- Divider --}}
                    <hr class="border-gray-700 mt-8">
                </article>

            @empty
                <p class="text-center text-gray-400 text-lg">
                    No posts found.
                </p>
            @endforelse

            {{-- Pagination --}}
            <div class="pt-10">
                {{ $posts->links() }}
            </div>

        </div>
    </div>
@endsection
