@extends('layouts.blog')
@section('title')
    {{ $post->title }}
@endsection
@section('description')
    {{ $post->desc }}
@endsection
@section('content')
    {{-- <section class="absolute top-0 left-0 right-0 mx-auto w-full">
        <div class="relative bg-green-900 rounded-b-[60px] h-[30rem] overflow-hidden">
            <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
                class="absolute -top-20 grayscale w-full opacity-50 blur">
            <div class="absolute inset-x-0 inset-y-1/2 w-full flex justify-center items-center">
                <h1 class="max-w-[50%] text-3xl font-semibold text-slate-100 text-center">
                    {{ $post->title }}
                </h1>
            </div>
        </div>
    </section> --}}
    <section class="">
        <img src="{{ asset($post->thumb) }}" alt="" class="w-full h-96 object-cover">
        <p>{{ $post->title }}</p>
        <p>{{ $post->desc }}</p>

        {{-- Kategori --}}
        @foreach ($post->categories as $category)
            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
        @endforeach


        {{-- Tag --}}
        @foreach ($post->tags as $tag)
            <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
        @endforeach

        <p class="mt-20">{!! $post->content !!}</p>
    </section>
@endsection

{{-- Menampilkan kategori dan tag Cara 1 --}}
{{-- <p>{{ $post->tags->first()->title }}</p>
     <p>{{ $post->categories->first()->title }}</p> --}}
