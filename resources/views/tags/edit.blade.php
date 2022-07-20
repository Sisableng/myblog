@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <form action="{{ route('tags.update', ['tag' => $tag]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-10 p-10 sm:px-5 border border-slate-200 rounded-3xl relative">
                {{-- Back --}}
                <div class="absolute top-5 right-5 sm:right-0 flex items-center mr-5">
                    <a href="{{ url('tags') }}" class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mb-5">
                        <i class="fad fa-arrow-left w-3 h-3"></i>
                    </a>
                </div>

                {{-- Title --}}
                <div class="mb-10 mt-10 flex sm:flex-col items-start">
                    <label for="tags_title"
                        class="required text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ __('tags.create.form.title') }}</label>
                    <input id="tags_title" value="{{ old('title', $tag->title) }}" name="title" type="text"
                        class="form-control @error('title') is-invalid @enderror">

                    @error('title')
                        <div id="toast-title"
                            class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{{ $message }}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-title" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror
                </div>

                {{-- slug --}}
                <div class="mb-10 flex sm:flex-col items-start">
                    <label for="tags_slug"
                        class="text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('tags.create.form.slug') }}
                        <span class="text-slate-500 italic">(Permalink)</span></label>
                    <input id="tags_slug" value="{{ old('slug', $tag->slug) }}" name="slug" type="text"
                        class="block w-full rounded-full border-none bg-slate-300 p-2.5 pl-5 text-slate-900 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 @error('slug') is-invalid @enderror"
                        placeholder="{{ trans('tags.create.slug-placeholder') }}" readonly />

                    @error('slug')
                        <div id="toast-slug"
                            class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{!! $message !!}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-slug" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror
                </div>

            </div>
            <div class="w-full flex justify-end">
                <button type="submit"
                    class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-7 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700">{{ trans('tags.create.submit') }}</button>
            </div>
        </form>
    </div>
@endsection
@push('javascript-internal')
    <script>
        $(document).ready(function() {
            const generateSlug = (value) => {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "")
            }

            // Event : Slug
            $("#tags_title").change(function(event) {
                $('#tags_slug').val(generateSlug(event.target.value))
            });
        });
    </script>
@endpush
