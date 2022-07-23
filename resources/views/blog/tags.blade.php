@extends('layouts.blog')
@section('title')
    Tag
@endsection

@include('layouts._blog._hero')

@section('content')
    @forelse ($tags as $tag)
        <a href="{{ route('blog.posts.tag', ['slug' => $tag->slug]) }}">{{ $tag->title }}</a>
    @empty
        <p>no data</p>
    @endforelse
    <div class="">
        @if ($tags->hasPages())
            {{ $tags->links() }}
        @endif
    </div>
@endsection
