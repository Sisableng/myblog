@extends('layouts.blog')
@section('title')
    Blog
@endsection

@include('layouts._blog._hero')

@section('content')
    <section class="mt-20">

        <div class="grid grid-cols-3 gap-10">
            <div class="col-span-2 bg-slate-200 p-5">
                <h1 class="text-3xl uppercase font-semibold">Popular Post</h1>
                @forelse ($populars as $popular)
                    <div class="w-full my-5 flex flex-row items-start justify-start space-x-10">

                        {{-- Image --}}
                        @if (file_exists(public_path($popular->thumb)))
                            <div class="w-44 h-44 1/5 overflow-hidden">
                                <img src="{{ asset($popular->thumb) }}" alt="{{ $popular->title }}"
                                    class="w-full h-full object-cover">
                            </div>
                        @else
                            <p>no image</p>
                        @endif

                        <div class="basis-4/5">
                            {{-- Title --}}
                            <h1>{{ $popular->title }}</h1>
                            <p>{{ $popular->desc }}</p>

                            <div>
                                <a href="{{ route('blog.posts.detail', ['slug' => $popular->slug]) }}">Tempo</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>no data</p>
                @endforelse
            </div>
            <div class="bg-slate-200 p-5">Sidebar
                <div class="mt-10 bg-slate-300 h-10 text-center">
                    <form action="{{ route('blog.search') }}" method="GET">
                        <input name="keyword" value="{{ request()->get('keyword') }}" type="search" placeholder="search">
                    </form>
                </div>
                <a href="{{ route('blog.categories') }}">show all categories</a>
                <a href="{{ route('blog.tags') }}">show all tags</a>
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
@endsection
