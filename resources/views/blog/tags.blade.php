@extends('layouts.blog')
@section('title')
    {{ __('blog.widget.tags') }}
@endsection

@section('content')
    @include('layouts._blog._hero')

    <section class="container mt-20 space-y-20">
        <p class="text-xl text-center font-semibold">{{ __('blog.title.tag') }}</p>
        <div class="w-1/2 mx-auto">
            <div class="flex items-center justify-center space-x-5 w-full">

                @forelse ($tags as $tag)
                    <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}"
                        class="block px-5 py-2 rounded-full bg-slate-200 hover:bg-emerald-500 hover:text-white dark:hover:bg-emerald-500 dark:bg-slate-800 dark:text-white">{{ $tag->title }}</a>
                @empty
                    <p>no data</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection
