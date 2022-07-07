@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container mx-auto relative">
        <div class="absolute top-5 right-0 sm:right-0 flex items-center mr-5">
            <a href="{{ url('posts') }}" class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mb-5">
                <i class="fad fa-arrow-left w-3 h-3"></i>
            </a>
        </div>
        <div class="flex flex-col space-y-10 justify-center items-center">
            @if (file_exists(public_path($post->thumb)))
                <img src="{{ $post->thumb }}" alt="" class="w-full lg:h-[550px] rounded-3xl object-cover">
            @else
                <div class="flex justify-center items-center w-full py-40 bg-slate-100 hover:bg-slate-300 rounded-3xl">
                    <h1>{{ __('categories.show.no_image') }}</h1>
                </div>
            @endif
            <div class="flex sm:flex-col sm:space-y-10 lg:justify-between lg:items-start w-full">
                <div>
                    <p class="text-sm text-slate-500">{{ __('posts.detail.show.title') }}</p>
                    <h2 class="font-bold">{{ $post->title }}</h2>
                    <p class="text-slate-500 block mb-3">{{ $post->desc }}</p>
                </div>
                <div>
                    <p class="text-sm text-slate-500">{{ __('posts.detail.show.date') }}</p>
                    <p class="text-lg text-slate-500">{{ $post->created_at->format('d F Y') }}</p>
                </div>
            </div>
            <div class="flex justify-between items-center w-full">
                <div>
                    <p class="mb-3 text-sm text-slate-500">{{ __('posts.detail.show.category') }}</p>
                    @foreach ($categories as $category)
                        <span class="badge-green sm:mb-2">{{ $category->title }}</span>
                    @endforeach
                </div>
                <div>
                    <p class="mb-3 text-sm text-slate-500">{{ __('posts.detail.show.tag') }}</p>
                    @foreach ($tags as $tag)
                        <span class="badge-blue sm:mb-2">#{{ $tag->title }}</span>
                    @endforeach
                </div>
            </div>
            <div class="self-start w-full">
                <div class="relative border-4 bg-gray-300 border-slate-300 rounded-3xl">
                    <div
                        class="w-full h-10 bg-slate-300 absolute -top-1 rounded-t-3xl flex justify-between items-center px-5">
                        <div class="inline-flex space-x-3">
                            <span class="rounded-full w-2 h-2 p-2 bg-red-400"></span>
                            <span class="rounded-full w-2 h-2 p-2 bg-yellow-200"></span>
                            <span class="rounded-full w-2 h-2 p-2 bg-green-400"></span>
                        </div>
                        <div class="h-2 w-10 bg-slate-400 rounded-full"></div>
                        <p class="text-slate-500">{{ __('posts.detail.show.content') }}</p>
                    </div>
                    <div
                        class="p-5 sm:p-2.5 mt-10 overflow-y-auto sm:h-[650px] rounded-t-2xl rounded-b-3xl bg-gray-100  shadow-inner">
                        <p>{!! $post->content !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
