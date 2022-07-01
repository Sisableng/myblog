@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container space-y-7">
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
                    <button type="submit" class="search-btn"><i class="fad fa-magnifying-glass"></i></button>
                </form>

            </div>
        </div>

        <div class="relative overflow-x-auto shadow-md rounded-xl">
            <table class="w-full text-sm text-left  text-slate-500 dark:text-slate-400">
                <thead class="text-xs text-slate-700 uppercase bg-slate-200 dark:bg-slate-700 dark:text-slate-400">
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
                            <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
