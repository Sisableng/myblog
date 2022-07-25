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

        {{-- Hero --}}
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

        {{-- Popular Post --}}
        <section class="mt-20">

            <div class="grid grid-cols-3 sm:grid-cols-1 gap-14">
                <div class="col-span-2">
                    <div class="">
                        <h1 class="text-3xl uppercase font-semibold">Popular Post</h1>
                    </div>
                    <div>
                        @forelse ($populars as $popular)
                            <div
                                class="group w-full lg:h-56 sm:h-[30rem] my-10 flex flex-row sm:flex-col items-start justify-start lg:space-x-5">

                                {{-- Image --}}
                                <div class="lg:basis-3/12 w-full h-full lg:rounded-3xl sm:rounded-t-3xl overflow-hidden">
                                    @if (file_exists(public_path($popular->thumb)))
                                        <img src="{{ asset($popular->thumb) }}" alt="{{ $popular->title }}"
                                            class="w-full h-full object-cover transform group-hover:scale-110 transition-transform">
                                    @else
                                        <p>no image</p>
                                    @endif
                                </div>

                                {{-- Title & Desc --}}
                                <div
                                    class="flex w-full h-full p-5 pr-0 bg-white border border-slate-200 lg:rounded-3xl sm:rounded-b-3xl">
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
                                                class="text-3xl sm:text-2xl group-hover:text-emerald-500 ">{{ $popular->title }}</a>
                                            <p class="text-slate-400">{{ $popular->desc }}</p>
                                        </div>

                                    </div>

                                    <div class="w-full basis-20 sm:basis-16">
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

                <div class="lg:p-5 mb-10 sm:col-span-2">
                    <div class="">
                        <form action="{{ route('blog.search') }}" method="GET">
                            <label for="keyword">Search Post</label>
                            <input id="keyword" name="keyword" value="{{ request()->get('keyword') }}" type="search"
                                placeholder="search"
                                class="w-full rounded-full border-0 mt-5 py-3 px-5 bg-gray-100 focus:ring-2 focus:ring-emerald-500">
                        </form>
                    </div>

                    {{-- Category List --}}
                    <p class="mt-7 text-xl font-semibold">Categories</p>
                    <div class="px-5">

                        @forelse ($categories as $category)
                            <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}"
                                class="block my-7 hover:text-emerald-500">{{ $category->title }}</a>
                        @empty
                            <p>no data</p>
                        @endforelse
                        <a href="{{ route('blog.categories') }}" class="text-sm text-slate-300 hover:text-emerald-500">show
                            all categories <i class="fa-solid fa-caret-right"></i></a>
                    </div>

                    {{-- Tags List --}}
                    <p class="mt-7 text-xl font-semibold">Tags</p>

                    <div class="my-7 flex flex-wrap">
                        @forelse ($tags as $tag)
                            <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}"
                                class="block py-2 px-5 m-2.5 ml-0 bg-slate-200 rounded-full hover:bg-emerald-500 hover:text-white">{{ $tag->title }}</a>
                        @empty
                            <p>no data</p>
                        @endforelse
                    </div>
                    <a href="{{ route('blog.tags') }}" class="text-sm text-slate-300 hover:text-emerald-500">show all
                        tags <i class="fa-solid fa-caret-right"></i></a>

                </div>
            </div>
        </section>

        {{-- News Post --}}
        <section class="mt-20">
            <div class="grid grid-cols-4 grid-flow-col gap-4">
                <div class="col-span-1">
                    <h1 class="text-3xl uppercase font-semibold">Berita terbaru</h1>
                </div>
                <div class="col-span-3">

                    <div class="w-full">

                        <div class="slideshow-container flex">

                            @forelse ($news as $new)
                                <div class="mySlides fade">
                                    <div class="numbertext">1 / 3</div>
                                    @if (file_exists(public_path($new->thumb)))
                                        <img src="{{ asset($new->thumb) }}" class="w-full h-56">
                                    @else
                                        <p>no image</p>
                                    @endif
                                    <div class="text">Caption Text</div>
                                </div>
                            @empty
                                <p>no data</p>
                            @endforelse

                            <a class="prev" onclick="plusSlides(-1)">❮</a>
                            <a class="next" onclick="plusSlides(1)">❯</a>

                        </div>

                    </div>

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
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        let slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            let i;
            let slides = document.getElementsByClassName("mySlides");
            let dots = document.getElementsByClassName("dot");
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }

            // Non Active
            for (i = 0; i < slides.length; i++) {
                slides[i].classList.add("hide");
                slides[i].classList.remove("show");
            }

            // Active
            slides[slideIndex - 1].classList.add("show");
            slides[slideIndex - 1].classList.remove("hide");
        }
    </script>
@endpush
