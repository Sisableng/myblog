@extends('layouts.blog')
@section('title')
    Blog
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

    <div class="container sm:px-7">

        <section class="mt-20">
            <div class="grid lg:grid-rows-2 sm:grid-cols-1 lg:grid-flow-col gap-7">
                @forelse ($hero as $item)
                    <div
                        class="group relative first:row-span-2 first:h-full first:sm:h-96 first:lg:text-3xl text-xl row-span-0 h-52  bg-slate-100 bg-cover bg-no-repeat bg-center text-white rounded-3xl overflow-hidden">

                        <a href="{{ route('blog.posts.detail', ['slug' => $item->slug]) }}"
                            class="absolute inset-y-0 inset-x-0 flex items-end px-20 py-10 z-10 bg-gradient-to-b from-transparent to-slate-900">
                            <p class="group-hover:-translate-y-5 group-hover:translate-x-5 transition-all">
                                {{ $item->title }}</p>
                        </a>

                        <img src="{{ $item->thumb }}" alt=""
                            class="w-full h-full object-cover transform group-hover:scale-110 group-hover:blur-sm transition-transform">
                    </div>
                @empty
                    <p>no data</p>
                @endforelse
            </div>
        </section>

        <section class="mt-20">

            <div class="grid grid-cols-3 sm:grid-cols-1 gap-10">
                <div class="col-span-2">
                    <div class="">
                        <h1 class="text-3xl uppercase font-semibold">Popular Post</h1>
                    </div>
                    <div>
                        @forelse ($populars as $popular)
                            <div class="group w-full h-56 my-10 flex flex-row items-start justify-start space-x-5">

                                {{-- Image --}}
                                <div class="basis-3/12 w-full h-full">
                                    @if (file_exists(public_path($popular->thumb)))
                                        <img src="{{ asset($popular->thumb) }}" alt="{{ $popular->title }}"
                                            class="w-full h-full rounded-3xl object-cover">
                                    @else
                                        <p>no image</p>
                                    @endif
                                </div>

                                {{-- Title & Desc --}}
                                <div class="flex w-full h-full p-5 pr-0 bg-white border border-slate-200 rounded-3xl">
                                    <div class="w-full">
                                        <div class="space-y-5">
                                            <div class="mb-3">
                                                @foreach ($popular->categories as $category)
                                                    <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                                        class="pr-2 text-emerald-500">
                                                        {{ $category->title }}
                                                    </a>
                                                @endforeach
                                            </div>
                                            <a href="{{ route('blog.posts.detail', ['slug' => $popular->slug]) }}"
                                                class="text-3xl">{{ $popular->title }}</a>
                                            <p class="text-slate-400">{{ $popular->desc }}</p>
                                        </div>

                                    </div>

                                    <div class="w-full basis-20">
                                        <div class="flex items-end h-full pb-5">
                                            <a href="{{ route('blog.posts.detail', ['slug' => $popular->slug]) }}"
                                                class="text-lg text-slate-300 group-hover:text-emerald-500
                                            w-10 h-10 p-4 flex items-center justify-center rounded-full group-hover:bg-gray-100">
                                                <i class="far fa-arrow-right-long"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>no data</p>
                        @endforelse
                    </div>
                </div>

                <div class="p-5 mb-10">
                    <div class="">
                        <form action="{{ route('blog.search') }}" method="GET">
                            <input name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                placeholder="search" class="w-full rounded-full">
                        </form>
                    </div>

                    {{-- Category List --}}
                    <div>

                        @forelse ($categories as $category)
                            <a href="" class="block my-10">{{ $category->title }}</a>
                        @empty
                            <p>no data</p>
                        @endforelse
                        <a href="{{ route('blog.categories') }}">show all categories</a>
                    </div>

                    {{-- Tags List --}}
                    <div class="mt-10">
                        <div class="mb-10 flex flex-wrap">
                            @forelse ($tags as $tag)
                                <a href="" class="block py-2 px-5 m-2.5 ml-0 bg-slate-200">{{ $tag->title }}</a>
                            @empty
                                <p>no data</p>
                            @endforelse
                        </div>
                        <a href="{{ route('blog.tags') }}">show all tags</a>
                    </div>
                </div>
            </div>


            <div class="mt-20 bg-slate-200 p-5">
                <h1 class="text-3xl uppercase font-semibold">Berita terbaru</h1>
                @forelse ($news as $new)
                    <div class="py-5">
                        @if (file_exists(public_path($new->thumb)))
                            <div class="w-44 h-44 overflow-hidden">
                                <img src="{{ asset($new->thumb) }}" alt="" class="w-full h-full object-cover">
                            </div>
                        @else
                            <p>no image</p>
                        @endif

                        <div class="">
                            {{-- Title --}}
                            <h1>{{ $new->title }}</h1>
                            <p>{{ $new->desc }}</p>

                            <div>
                                <a href="{{ route('blog.posts.detail', ['slug' => $new->slug]) }}">Tempo</a>
                            </div>
                        </div>
                    </div>

                @empty
                    <p>no data</p>
                @endforelse
                <div class="">
                    @if ($news->hasPages())
                        {{ $news->links() }}
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection
