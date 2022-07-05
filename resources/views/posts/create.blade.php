@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container relative">
        <form action="{{ route('posts.store') }}" method="POST">

            <div class="w-full flex justify-between mb-10">
                <div class="flex items-center">
                    <a href="{{ url('posts') }}" class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300">
                        <i class="fad fa-arrow-left w-3 h-3"></i>
                    </a>
                </div>
                <button type="submit"
                    class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-7 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700">{{ trans('categories.form.submit') }}</button>
            </div>
            {{-- Left --}}
            <div class="grid lg:grid-cols-3 gap-10 sm:grid-cols-1 sm:gap-0">
                <div class="col-span-2">
                    {{-- Title --}}
                    <div class="mb-10 flex sm:flex-col items-start">
                        <input id="post_title" value="{{ old('title') }}" name="title" type="text"
                            class="text-slate-800 dark:text-white border-none bg-transparent text-5xl focus:ring-transparent block w-full p-2.5 @error('title') is-invalid @enderror"
                            placeholder="Title Here...">

                        @error('title')
                            <div id="toast-title"
                                class="fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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

                    {{-- Content --}}
                    <div>
                        <textarea id="input_post_content" name="content" rows="41"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Your message..."></textarea>
                        @error('content')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                {{-- Right --}}
                <div class="mb-10 p-5 sm:px-5 border border-slate-200 rounded-3xl sm:mt-7">

                    {{-- slug --}}
                    <div class="mb-10">
                        <label for="post_slug" class="text-gray-900 dark:text-gray-300">{{ __('Slug') }}
                            <span class="text-slate-500 italic">(Permalink)</span></label>
                        <input id="post_slug" value="{{ old('slug') }}" name="slug" type="text"
                            class="block w-full rounded-full border-transparent focus:border-transparent focus:ring-transparent bg-slate-300 p-2.5 pl-5 text-slate-900 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 mt-5 @error('slug') is-invalid @enderror"
                            placeholder="{{ __('Otomatis') }}" readonly />

                        @error('slug')
                            <div id="toast-slug"
                                class="fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                    <i class="fa-duotone fa-message-exclamation"></i>
                                </div>
                                <div class="ml-3 text-sm font-normal text-slate-900">{!! 'wew' !!}</div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                    data-dismiss-target="#toast-slug" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                                </button>
                            </div>
                        @enderror
                    </div>

                    {{-- catgeory --}}
                    <div class="mb-10">
                        <label for="input_post_category" class="font-weight-bold">
                            Category
                        </label>
                        <div
                            class="block w-full rounded-xl border-transparent bg-gray-100 p-2.5 pl-5 text-slate-900 focus:border-green-400 focus:ring-transparent dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-green-500 dark:focus:ring-green-500 overflow-auto mt-5 h-24 overflow-y-auto shadow-inner">
                            <!-- List category -->
                            <ul class="pl-1 my-1" style="list-style: none;">
                                @include('posts._category-list', [
                                    'categories' => $categories,
                                    'count' => 0,
                                ])
                            </ul>
                            <!-- List category -->
                        </div>
                    </div>

                    {{-- Tags --}}
                    <div class="mb-10">
                        <label for="select_post_tag" class="text-gray-900 dark:text-gray-300">Tags</label>
                        <select id="select_post_tag" name="select_post_tag"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-5"
                            multiple>
                            <option selected>Choose a country</option>
                            <option value="US">United States</option>
                        </select>
                    </div>

                    {{-- Thumb --}}
                    <div class="mb-10">
                        <label for="post_file" class="text-gray-900 dark:text-gray-300">Thumbnail</label>
                        <label for=""
                            class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-3xl border-2 border-gray-300 border-dashed dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 mt-5 @error('thumb') is-invalid @enderror">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <button id="post_thumb" class="text-7xl mb-3 text-slate-500 hover:text-green-500"
                                    data-input="post_file" data-preview="holder">
                                    <i class="fad fa-cloud-arrow-up"></i>
                                </button>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    {{ trans('categories.create.upload') }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <input id="post_file" type="text" name="thumb" value="{{ old('thumb') }}"
                                class="border-transparent focus:border-transparent focus:ring-transparent bg-transparent w-full"
                                readonly>
                        </label>
                        @error('thumb')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Status --}}
                    <div class="">
                        <label for="status" class="text-gray-900 dark:text-gray-300">Status</label>
                        <select id="status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mt-5">
                            <option selected>Publish</option>
                            <option value="US">Draft</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="w-full flex justify-end">
                <button type="submit"
                    class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-7 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700">{{ trans('categories.form.submit') }}</button>
            </div>

        </form>
    </div>
@endsection

@push('css-internal')
@endpush

@push('javascript-external')
    <script src="{{ asset('vendor/tinymce5/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/tinymce5/jquery.tinymce.min.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(document).ready(function() {

            // Generate Slug
            $("#post_title").change(function(event) {
                $("#post_slug").val(
                    event.target.value
                    .trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, "-")
                    .replace(/-+/g, "-")
                    .replace(/^-|-$/g, "")
                );
            });

            // Filemanager
            $('#post_thumb').filemanager('image');

            // tinymce
            $("#input_post_content").tinymce({
                relative_urls: false,
                language: "en",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table directionality",
                    "emoticons template paste textpattern",
                ],
                toolbar2: "link | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | undo redo",
            });

        });
    </script>
@endpush
