@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container space-y-7">
        <div class="flex justify-between items-center content-center sm:flex-col sm:space-y-5">
            <div>
                <a href="{{ route('posts.create') }}" class="mybtn">
                    <i class="fad fa-plus mr-2 -ml-1"></i>
                    {{ __('posts.index.addBtn') }}
                </a>

                <div
                    class="inline-flex text-sm font-medium text-center border-b border-gray-200 dark:border-gray-700 mt-7 ml-3">
                    <ul class="flex flex-wrap -mb-px">
                        <li class="mr-2">
                            <a href="#"
                                class="tabs inline-block p-2 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300 active">{{ __('posts.index.tabs.publish') }}</a>
                        </li>
                        <li class="mr-2">
                            <a href="#"
                                class="tabs inline-block p-2 text-slate-500 rounded-t-lg border-b-2 border-transparent hover:text-gray-600 hover:border-gray-300"
                                aria-current="page">{{ __('posts.index.tabs.draft') }}</a>
                        </li>
                    </ul>
                </div>

            </div>
            <div>
                <form class="flex items-center mb-0 mt-5">
                    <label for="simple-search" class="sr-only">{{ __('posts.index.search') }}</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fad fa-magnifying-glass"></i>
                        </div>
                        <input type="text" id="simple-search" class="search-form"
                            placeholder="{{ __('posts.index.search') }}" required="">
                    </div>
                    <button type="submit" class="search-btn"><i class="fad fa-magnifying-glass"></i></button>
                </form>

            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg rounded-3xl">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-slate-200 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[30rem]">
                            {{ __('posts.index.table.title') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('posts.index.table.author') }}
                        </th>
                        <th scope="col" class="px-6 py-3">
                            {{ __('posts.index.table.date') }}
                        </th>
                        <th scope="col" class="px-6 py-3 w-28">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr
                            class=" dark:bg-gray-800 odd:bg-white even:bg-gray-50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                <h4 class="text-lg">{{ $post->title }}</h4>
                                <p class="text-slate-500">{{ $post->desc }}</p>
                            </th>
                            <td class="px-6 py-4">
                                {{ $post->user_id = Auth::user()->name }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $post->created_at->format('d M Y - h:i') }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex space-x-7 justify-end items-center">
                                    <a href="{{ route('posts.show', ['post' => $post]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="mb-0" action="" method="POST">
                                        <button type="submit" class="">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center py-7">Data belum ada</p>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- <div class="">
            <ul class="bg-green-500">
                @forelse ($posts as $post)
                    <div class="card">
                        <div class="card-body">
                            <h5>{{ $post->title }}</h5>
                            <p>
                                {{ $post->desc }}
                            </p>
                            <div class="flex space-x-7 bg-slate-300 w-full justify-end">
                                <!-- detail -->
                                <a href="#" class="" role="button">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <!-- edit -->
                                <a class="" role="button">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <!-- delete -->
                                <form class="d-inline" action="" method="POST">
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    Data belum ada
                @endforelse
            </ul>
        </div> --}}
    </div>
@endsection
