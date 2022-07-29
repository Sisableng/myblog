@extends('layouts.blog')
@section('title')
    {{ $post->title }}
@endsection
@section('description')
    {{ $post->desc }}
@endsection
@section('content')
    <section class="relative w-full">
        <div class="relative bg-green-900 h-[30rem] overflow-hidden">
            <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
                class="absolute -top-20 grayscale w-full opacity-50 blur">
        </div>
        <div class="absolute -bottom-52 w-full h-[30rem] overflow-hidden lg:px-20">
            <img src="{{ asset($post->thumb) }}" alt=""
                class="w-full h-full  border-8 border-white rounded-3xl object-cover object-center">
        </div>
    </section>
    <section class="container mt-72 lg:px-10 space-y-20">

        <div class="space-x-5">
            {{-- Kategori --}}
            @foreach ($post->categories as $category)
                <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                    class="text-emerald-500">{{ $category->title }}</a>
            @endforeach
        </div>

        <div class="space-y-3">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->desc }}</p>
        </div>




        {{-- Tag --}}
        <div class="flex justify-between items-center">
            <div>
                @foreach ($post->tags as $tag)
                    <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}"
                        class="p-1 px-5 bg-slate-200 dark:bg-slate-800 hover:bg-emerald-500 hover:text-white dark:hover:bg-emerald-500 rounded-full">{{ $tag->title }}</a>
                @endforeach
            </div>
            <p>{{ $post->updated_at->format('d M Y') }}</p>
        </div>


        <div class="px-20 sm:px-5 mt-20">{!! $post->content !!}</div>

        <div class="px-20 sm:px-5">
            <p class="uppercase text-xl">{{ __('blog.post.posted') }} <span class="ml-5 normal-case text-lg">
                    {{-- Kategori --}}
                    @foreach ($post->categories as $category)
                        <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                            class="text-emerald-500">{{ $category->title }}</a>
                    @endforeach
                </span></p>
        </div>
    </section>
@endsection

{{-- Menampilkan kategori dan tag Cara 1 --}}
{{-- <p>{{ $post->tags->first()->title }}</p>
     <p>{{ $post->categories->first()->title }}</p> --}}
