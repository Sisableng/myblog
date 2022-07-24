@extends('layouts.blog')
@section('title')
    Kategori
@endsection
@section('content')
    @forelse ($categories as $category)
        <div class="w-full my-5 flex flex-row items-start justify-start space-x-10">

            {{-- Image --}}
            @if (file_exists(public_path($category->thumb)))
                <div class="w-44 h-44 1/5 overflow-hidden">
                    <img src="{{ asset($category->thumb) }}" alt="{{ $category->title }}" class="w-full h-full object-cover">
                </div>
            @else
                <p>no image</p>
            @endif

            <div class="basis-4/5">
                {{-- Title --}}
                <a href="{{ route('blog.posts.category', ['slug' => $category->slug]) }}">{{ $category->title }}</a>
                <p>{{ $category->desc }}</p>

                <div>uwaw</div>
            </div>
        </div>
    @empty
        <p>no data</p>
    @endforelse

    <div class="">
        @if ($categories->hasPages())
            {{ $categories->links() }}
        @endif
    </div>
@endsection
