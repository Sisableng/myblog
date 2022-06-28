@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container mx-auto relative">
        <div class="absolute top-5 right-0 sm:right-0 flex items-center mr-5">
            <a href="{{ url('categories') }}" class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mb-5">
                <i class="fad fa-arrow-left w-3 h-3"></i>
            </a>
        </div>
        <div class="flex flex-col space-y-10 justify-center items-center">
            @if (file_exists(public_path($category->thumb)))
                <img src="{{ $category->thumb }}" alt="" class="w-full lg:h-[550px] rounded-3xl object-cover">
            @else
                <div class="flex justify-center items-center w-full py-40 bg-slate-100 hover:bg-slate-300 rounded-3xl">
                    <h1>{{ trans('categories.show.no_image') }}</h1>
                </div>
            @endif
            <div class="flex sm:flex-col sm:space-y-5 lg:justify-between lg:items-center w-full">
                <div>
                    <p class="text-sm text-slate-500">{{ trans('categories.form.title') }}</p>
                    <h1 class="text-4xl font-bold">{{ $category->title }}</h1>
                </div>
                <div>
                    <p class="text-sm text-slate-500">{{ trans('categories.form.crtd') }}</p>
                    <p class="text-lg text-slate-500">{{ $category->created_at->format('d F Y') }}</p>
                </div>
            </div>
            <div class="self-start w-full">
                <h1 class="text-slate-500 mb-5">{{ trans('categories.form.desc') }}</h1>
                <div class="block p-5 sm:p-2.5 border border-slate-300 rounded-3xl">
                    <p>{{ $category->desc }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
