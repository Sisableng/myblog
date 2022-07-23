@extends('layouts.blog')
@section('title')
    {{ __('Post Tag :title', ['title' => $tag->title]) }}
@endsection
@section('content')
    <section class="absolute top-0 left-0 right-0 mx-auto w-full">
        <div class="relative bg-green-900 rounded-b-[60px] h-[30rem] overflow-hidden">
            <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
                class="absolute -top-20 grayscale w-full opacity-50 blur">
            <div class="absolute inset-x-0 inset-y-1/2 w-full flex justify-center items-center">
                <h1 class="max-w-[50%] text-3xl font-semibold text-slate-100">
                    {{ __('Post Tags :title', ['title' => $tag->title]) }}
                </h1>
            </div>
        </div>
    </section>

    <section class="mt-[35rem] min-h-[100vh]">
        @forelse ($posts as $post)
            <div class="flex">
                <img src="{{ asset($post->thumb) }}" alt="" class="w-44 h-44">
                <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                <p>{{ $post->desc }}</p>
            </div>
        @empty
            <p>no data</p>
        @endforelse
        <div class="">
            @if ($posts->hasPages())
                {{ $posts->links() }}
            @endif
        </div>


        {{-- List Category --}}
        <div>
            <p>header</p>
            @foreach ($tags as $tag)
                <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
            @endforeach
        </div>
    </section>
@endsection
