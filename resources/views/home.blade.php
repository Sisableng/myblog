@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body space-y-10 p-0 m-0">
                        <h1 class="font-bold text-4xl">{{ trans('dashboard.index.welcome') }}, <span
                                class="text-slate-500">{{ Auth::user()->name }}</span></h1>
                        <div>
                            <a href="https://www.youtube.com/watch?v=AGBdKpGlOpg&list=PLhG9IAaB9ArrTsTAOWNTi0D2jkLQ6vA5f&index=41&ab_channel=Ilmukita"
                                class="text-green-500" target="_blank">Hanca : 41 (Proses hapus data kategori)</a>
                        </div>

                        <div class="flex justify-between content-center sm:flex-col sm:space-y-5">
                            <div>
                                <button type="button" class="mybtn">
                                    <i class="fad fa-plus mr-2 -ml-1"></i>
                                    Add Post
                                </button>
                            </div>
                            <div>
                                <form class="flex items-center mb-0">
                                    <label for="simple-search" class="sr-only">Search</label>
                                    <div class="relative w-full">
                                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                            <i class="fad fa-magnifying-glass"></i>
                                        </div>
                                        <input type="text" id="simple-search" class="search-form"
                                            placeholder="{{ trans('dashboard.index.search') }}" required="">
                                    </div>
                                    <button type="submit" class="search-btn"><i
                                            class="fad fa-magnifying-glass"></i></button>
                                </form>

                            </div>
                        </div>

                        <div class="relative overflow-x-auto shadow-md rounded-xl">
                            <table class="w-full text-sm text-left  text-slate-500 dark:text-slate-400">
                                <thead
                                    class="text-xs text-slate-700 uppercase bg-slate-200 dark:bg-slate-700 dark:text-slate-400">
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            {{ trans('categories.table.title') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ trans('categories.table.slug') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ trans('categories.table.desc') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            {{ trans('categories.table.crtd') }}
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr
                                        class="bg-slate-100 border-b dark:bg-slate-800 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600">

                                        <td class="px-6 py-4">
                                            WEW
                                        </td>
                                        <td class="px-6 py-4">
                                            Laptop
                                        </td>
                                        <td class="px-6 py-4">
                                            Laptop
                                        </td>
                                        <td class="px-6 py-4">
                                            $2999
                                        </td>
                                        <td class="px-6 py-4 text-right" width="150px">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-3">Edit</a>
                                            <a href="#"
                                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="toast-top-right"
        class="absolute top-5 right-5 w-full max-w-xs p-4 text-gray-900 bg-slate-300/30 backdrop-blur rounded-lg shadow-2xl dark:bg-gray-800 dark:text-gray-300"
        role="alert">
        <div class="flex items-center mb-3">
            <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">New notification</span>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 text-gray-900 hover:text-green-500 p-1.5 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white"
                data-dismiss-target="#toast-top-right" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="fas fa-xmark w-5 h-5"></i>
            </button>
        </div>
        <div class="flex items-center">
            <div class="relative inline-block shrink-0">
                <img class="w-12 h-12 rounded-full"
                    src="https://www.gravatar.com/avatar/bd3bf537ce5a0c6a8bdc1e674fd39a65.jpg?s=320&d=monsterid"
                    alt="Jese Leos image">
                <span
                    class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-green-500 rounded-full">
                    <i class="fas fa-message-lines w-4 h-4 text-white text-[12px] pt-[2px] pl-[2px]"></i>
            </div>
            <div class="ml-3 text-sm font-normal">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Admin - <span
                        class="text-slate-500 font-normal">Wildan Maulana</span></h4>
                <div class="text-sm font-normal">Disarankan Menggunakan PC/Laptop ya lur!!</div>
                <span class="text-xs font-medium text-green-500 dark:text-blue-500">a few seconds ago</span>
            </div>
        </div>
    </div>
@endsection
