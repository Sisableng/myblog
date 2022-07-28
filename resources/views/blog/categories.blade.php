@extends('layouts.blog')
@section('title')
    Kategori
@endsection
@section('content')
    <div class="relative bg-green-900 rounded-b-[60px] h-[30rem] overflow-hidden">
        <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
            class="grayscale w-full opacity-50 blur object-cover h-full">
        <div class="absolute inset-x-1/2 inset-y-1/2 flex flex-col justify-center items-center">
            <a href="{{ '/' }}">
                <h1 class="uppercase text-5xl font-bold text-slate-100">blog</h1>
            </a>
            <div class="mt-10 flex space-x-3 items-center">
                <p class="text-xl text-slate-300">{{ __('blog.home') }}</p>
                <a href="{{ 'login' }}" target="_blank"><i class="fad fa-arrow-right pt-1.5 text-slate-400"></i></a>
                <p class="text-xl text-slate-300">Blog</p>
                <div class="space-x-3 items-center {{ Request::is('category', 'tag') ? 'inline-flex' : 'hidden' }}">
                    <i class="fad fa-arrow-right text-slate-400"></i>
                    <p class="text-xl text-slate-300">@yield('title')</p>
                </div>
            </div>
        </div>
    </div>
    <section class="container mt-20">
        <h5 class="font-semibold">List Category</h5>
        <div class="grid grid-cols-3 sm:grid-cols-1 gap-5 mt-10">
            @forelse ($categories as $category)
                <div class="w-full flex flex-col items-center mx-auto">

                    {{-- Image --}}
                    <div class="w-44 h-44 overflow-hidden rounded-full">
                        @if (file_exists(public_path($category->thumb)))
                            <img src="{{ asset($category->thumb) }}" alt="{{ $category->title }}"
                                class="h-full object-cover">
                        @else
                            <p>no image</p>
                        @endif
                    </div>

                    <div class="mt-5">
                        {{-- Title --}}
                        <div class="text-center">
                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                class="text-xl font-semibold">{{ $category->title }}</a>
                            <p class="text-slate-500">{{ $category->desc }}</p>
                        </div>

                        <div class="w-full text-center mt-5">
                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                class="inline-block py-1 px-5 text-emerald-500 bg-slate-200 dark:bg-slate-800 rounded-full">
                                Lihat
                            </a>
                        </div>
                    </div>
                </div>

            @empty
                <p>no data</p>
            @endforelse
        </div>

        <div class="">
            @if ($categories->hasPages())
                {{ $categories->links() }}
            @endif
        </div>
    </section>
@endsection
