@extends('layouts.blog')
@section('title')
    {{ request()->get('keyword') }}
@endsection
@section('content')
    <section class="absolute top-0 left-0 right-0 mx-auto w-full">
        <div class="relative bg-green-900 rounded-b-[60px] h-[30rem] overflow-hidden">
            <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
                class="absolute -top-20 grayscale w-full opacity-50 blur">
            <div class="absolute inset-x-0 inset-y-1/2 w-full flex justify-center items-center">
                <h1 class="max-w-[50%] text-3xl font-semibold text-slate-100">{!! __('blog.title.search', ['keyword' => request()->get('keyword')]) !!}</h1>
            </div>
        </div>
    </section>

    <section class="mt-[35rem] min-h-[100vh]">
        @forelse ($posts as $post)
            <div class="w-full my-5 flex flex-row items-start justify-start space-x-10">

                {{-- Image --}}
                @if (file_exists(public_path($post->thumb)))
                    <div class="w-44 h-44 1/5 overflow-hidden">
                        <img src="{{ asset($post->thumb) }}" alt="{{ $post->title }}" class="w-full h-full object-cover">
                    </div>
                @else
                    <p>no image</p>
                @endif

                <div class="basis-4/5">
                    {{-- Title --}}
                    <a href="{{ route('blog.posts.detail', ['slug' => $post->slug]) }}">{{ $post->title }}</a>
                    <p>{{ $post->desc }}</p>

                    <div>uwaw</div>
                </div>
            </div>
        @empty
            <p>no data</p>
        @endforelse

        @if ($posts->hasPages())
            {{ $posts->links() }}
        @endif
    </section>
@endsection
