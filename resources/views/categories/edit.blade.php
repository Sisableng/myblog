@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">

        <form action="{{ route('categories.update', ['category' => $category]) }}" method="POST">
            @method('PUT')
            @csrf
            <div class="mb-10 p-10 sm:px-5 border border-slate-200 rounded-3xl relative">
                <div class="absolute top-5 right-5 sm:right-0 flex items-center mr-5">
                    <a href="{{ url('categories') }}" class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mb-5">
                        <i class="fad fa-arrow-left w-3 h-3"></i>
                    </a>
                </div>
                {{-- Title --}}
                <div class="mb-10 mt-10 flex sm:flex-col items-start">
                    <label for="category_title"
                        class="required text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.title') }}</label>
                    <input id="category_title" value="{{ old('title', $category->title) }}" name="title" type="text"
                        class="form-control @error('title') is-invalid @enderror">

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

                {{-- slug --}}
                <div class="mb-10 flex sm:flex-col items-start">
                    <label for="category_slug"
                        class="text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.slug') }}
                        <span class="text-slate-500 italic">(Permalink)</span></label>
                    <input id="category_slug" value="{{ old('slug', $category->slug) }}" name="slug" type="text"
                        class="block w-full rounded-full border-none bg-slate-300 p-2.5 pl-5 text-slate-900 dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 @error('slug') is-invalid @enderror"
                        placeholder="{{ trans('categories.create.slug-placeholder') }}" readonly />

                    @error('slug')
                        <div id="toast-slug"
                            class="fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
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

                {{-- parent_category --}}
                <div class="mb-10 flex sm:flex-col items-start relative">
                    <label for="select_category_parent"
                        class="text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.create.parent-category-label') }}
                        <span class="text-red-500 italic">(Bugs)</span> </label>
                    <select id="select_category_parent" name="parent_category"
                        class="absolute w-full @error('parent_category') is-invalid @enderror"
                        data-placeholder="{{ __('Bugs Selected') }}" disabled>
                        @if (old('parent_category', $category->parent))
                            <option value="{{ old('parent_category', $category->parent)->id }}" selected>
                                {{ old('parent_category', $category->parent)->title }}
                            </option>
                        @endif
                    </select>

                    @error('parent_category')
                        <div id="toast-parent"
                            class="fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{{ $message }}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-parent" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror

                </div>

                {{-- desc --}}
                <div class="mb-10 flex sm:flex-col items-start">
                    <label for="descrypt"
                        class="required text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.desc') }}</label>
                    <textarea id="descrypt" type="text" value="" name="desc"
                        class="block w-full rounded-xl border-none bg-slate-100 p-2.5 pl-5 text-slate-900 focus:border-green-400 focus:ring-transparent dark:bg-slate-700 dark:text-white dark:placeholder-slate-400 dark:focus:border-green-500 dark:focus:ring-green-500 @error('desc') is-invalid @enderror"
                        maxlength="150">{{ old('desc', $category->desc) }}</textarea>

                    @error('desc')
                        <div id="toast-desc"
                            class="fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{{ $message }}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-desc" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror

                </div>

                {{-- thumb --}}
                <div class="flex sm:flex-col justify-center items-start w-full">
                    <label for=""
                        class="required text-gray-900 dark:text-gray-300 w-72 sm:pl-3 sm:mb-5">{{ trans('categories.form.thumb') }}</label>
                    <div class="w-full items-center">
                        <label for=""
                            class="flex flex-col justify-center items-center w-full h-64 bg-gray-50 rounded-3xl border-2 border-gray-300 border-dashed dark:bg-gray-700 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600 @error('thumb') is-invalid @enderror">
                            <div class="flex flex-col justify-center items-center pt-5 pb-6">
                                <button id="button_file" class="text-7xl mb-3 text-slate-500 hover:text-green-500"
                                    data-input="input-file" data-preview="holder">
                                    <i class="fad fa-cloud-arrow-up"></i>
                                </button>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                    {{ trans('categories.create.upload') }}</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)
                                </p>
                            </div>
                            <input id="input-file" type="text" name="thumb"
                                value="{{ old('thumb', asset($category->thumb)) }}"
                                class="border-none bg-transparent w-1/2 text-center" readonly>
                        </label>
                        <div id="holder" class="mt-5 p-3 border-2 border-dashed border-slate-300 rounded-xl"></div>
                    </div>

                    @error('thumb')
                        <div id="toast-thumb"
                            class="fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{{ $message }}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-thumb" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror

                </div>


            </div>
            <div class="w-full flex justify-end">
                <button type="submit"
                    class="text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-7 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700">{{ trans('categories.form.submit') }}</button>
            </div>
        </form>
    </div>
@endsection
