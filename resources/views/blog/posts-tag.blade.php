@extends('layouts.blog')
@section('title')
    {{ __('blog.title.post_tag_title', ['title' => $tag->title]) }}
@endsection
@section('content')
    <section class="w-full">
        <div class="relative bg-green-900 rounded-b-[60px] h-[30rem] overflow-hidden">
            <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
                class="absolute -top-20 grayscale w-full opacity-50 blur">
            <div class="absolute inset-x-0 inset-y-1/2 w-full flex justify-center items-center">
                <h1 class="max-w-[50%] text-3xl text-slate-100">
                    {!! __('blog.title.post_tag', ['title' => $tag->title]) !!}
                </h1>
            </div>
        </div>
    </section>

    <section class="container mt-20">
        <div class="grid grid-cols-4 sm:grid-cols-1 gap-20">
            <div class="col-span-3">
                <div class="grid grid-cols-3 sm:grid-1 gap-5">
                    @forelse ($posts as $post)
                        <div
                            class="max-w-sm bg-white rounded-3xl border border-slate-200 dark:bg-slate-800 dark:border-slate-700">
                            <div class="h-44 overflow-hidden rounded-t-3xl">
                                <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}" class="">
                                    <img class="object-cover" src="{{ asset($post->thumb) }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="p-5 flex flex-col justify-between h-64 overflow-hidden">
                                <div>
                                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}">
                                        <h5
                                            class="mb-2 text-2xl font-semibold tracking-tight text-slate-900 dark:text-white">
                                            {{ $post->title }}
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-slate-700 dark:text-slate-400">
                                        {{ $post->title }}
                                    </p>
                                </div>
                                <div class="flex justify-end">
                                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}"
                                        class="inline-flex items-center py-2 px-5 text-sm font-medium text-center text-white rounded-full bg-emerald-500 hover:bg-emerald-600">
                                        {{ __('blog.link.read') }}
                                        <svg aria-hidden="true" class="ml-2 -mr-1 w-4 h-4" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>no data</p>
                    @endforelse
                </div>
                <div class="">
                    @if ($posts->hasPages())
                        {{ $posts->links() }}
                    @endif
                </div>
            </div>



            {{-- List Tags --}}
            <div class="col-span-1">
                <p class="text-xl font-semibold">{{ __('blog.widget.tags') }}</p>
                <div class="px-5 mt-5">
                    @forelse ($tags as $tag)
                        <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
                    @empty
                        <p>No Data</p>
                    @endforelse
                </div>
            </div>
        </div>
        <div class="">
            @if ($posts->hasPages())
                {{ $posts->links() }}
            @endif
        </div>
    </section>
@endsection
