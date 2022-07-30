@extends('layouts.blog')
@section('title')
    {{ __('blog.widget.categories') }}
@endsection
@section('content')
    @include('layouts._blog._hero')
    <section class="container mt-20">
        <h5 class="font-semibold text-xl text-center">{{ __('blog.title.category') }}</h5>
        <div class="grid grid-cols-3 sm:grid-cols-1 gap-20 mt-20">
            @forelse ($categories as $category)
                <div class="w-full flex flex-col items-center mx-auto">

                    {{-- Image --}}
                    <div class="w-24 h-24 overflow-hidden rounded-full">
                        @if (file_exists(public_path($category->thumb)))
                            <img src="{{ asset($category->thumb) }}" alt="{{ $category->title }}"
                                class="h-full object-cover object-center w-full">
                        @else
                            <p>no image</p>
                        @endif
                    </div>

                    <div class="mt-5">
                        {{-- Title --}}
                        <div class="text-center">
                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                class="text-xl font-semibold hover:text-emerald-500 dark:hover:text-emerald-500">{{ $category->title }}</a>
                            <p class="text-slate-500 px-20">{{ $category->desc }}</p>
                        </div>

                        <div class="w-full text-center mt-5">
                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                class="inline-block py-1 px-5 hover:text-white bg-slate-200 hover:bg-emerald-500 dark:hover:bg-emerald-500 dark:bg-slate-800 rounded-full">
                                {{ __('blog.link.read') }}
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
