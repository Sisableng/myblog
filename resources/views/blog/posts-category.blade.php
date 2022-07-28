@extends('layouts.blog')
@section('title')
    {{ __('Post Category :title', ['title' => $category->title]) }}
@endsection
@section('content')
    <section class="w-full">
        <div class="relative bg-green-900 rounded-b-[60px] h-[30rem] overflow-hidden">
            <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
                class="absolute -top-20 grayscale w-full opacity-50 blur">
            <div class="absolute inset-x-0 inset-y-1/2 w-full flex justify-center items-center">
                <h1 class="max-w-[50%] text-3xl font-semibold text-slate-100">
                    {{ __('Post Category :title', ['title' => $category->title]) }}
                </h1>
            </div>
        </div>
    </section>

    <section class="container mt-20">
        <div class="grid grid-cols-4 sm:grid-cols-1 gap-5">
            <div class="col-span-3">
                <div class="grid grid-cols-3 sm:grid-1 gap-5">
                    @forelse ($posts as $post)
                        <div
                            class="max-w-sm bg-white rounded-3xl border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="h-44 overflow-hidden rounded-t-3xl">
                                <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}" class="">
                                    <img class="object-cover" src="{{ asset($post->thumb) }}" alt="{{ $post->title }}">
                                </a>
                            </div>
                            <div class="p-5 flex flex-col justify-between h-44">
                                <div>
                                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                                            {{ $post->title }}
                                        </h5>
                                    </a>
                                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                        {{ $post->title }}
                                    </p>
                                </div>
                                <div class="inline-block">
                                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}"
                                        class="inline-flex items-center py-2 px-3 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Lihat
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



            {{-- List Category --}}
            <div class="col-span-1">
                <p>Sub Category</p>
                <ul>
                    <li>
                        @if ($category->slug == $categoryRoot->slug)
                            {{ $categoryRoot->title }}
                        @else
                            <a href="{{ route('blog.posts.category', ['slug' => $categoryRoot->slug]) }}">
                                {{ $categoryRoot->title }}
                            </a>
                        @endif

                        {{-- Category Descendant --}}
                        @if ($categoryRoot->descendants)
                            @include('blog.sub-categories', [
                                'categoryRoot' => $categoryRoot->descendants,
                                'category' => $category,
                            ])
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </section>
@endsection
