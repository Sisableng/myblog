@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">

        <a href="{{ route('users.create') }}" class="mybtn">{{ __('users.index.addBtn') }}</a>

        <div class="mt-7 overflow-x-auto relative shadow-2xl shadow-slate-200 rounded-3xl sm:rounded-lg">
            <div class="flex justify-between items-center py-4 px-5 bg-emerald-500 dark:bg-gray-900">
                <div>
                    <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                        class="inline-flex items-center text-white bg-white/30 focus:border-0 focus:bg-emerald-600 font-medium rounded-full text-sm px-3 py-1.5"
                        type="button">
                        Action
                        <svg class="ml-2 w-3 h-3" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    {{-- Dropdown menu --}}
                    <div id="dropdownAction"
                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm dark:text-slate-200" aria-labelledby="dropdownActionButton">
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Super
                                    Amin</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Admin</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Editor</a>
                            </li>
                        </ul>
                        {{-- <div class="py-1">
                            <a href="#"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete
                                User</a>
                        </div> --}}
                    </div>
                </div>

                {{-- Search --}}
                <div class="relative">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-white dark:text-gray-400" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search-users"
                        class="block p-2 pl-10 w-80 text-sm text-white bg-white/30 rounded-full border-0 placeholder:text-white/50 focus:border-0 focus:ring-0 focus:bg-emerald-600"
                        placeholder="{{ __('users.index.search.placeholder') }}">
                </div>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white/50 uppercase border-b border-slate-200 dark:text-gray-400 bg-emerald-500">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-emerald-600 border-0 rounded-full bg-white/50 focus:ring-white/50 focus:ring-offset-0 focus:border-0 cursor-pointer">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('users.index.table.name') }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('users.index.table.roles') }}
                        </th>
                        <th scope="col" class="py-3 px-6">
                            {{ __('users.index.table.status.title') }}
                        </th>
                        <th scope="col" class="py-3 px-6 w-36">

                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr class="bg-white  dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-emerald-500 border-0 rounded-full bg-slate-200 focus:ring-emerald-200 focus:ring-offset-0 focus:border-0 cursor-pointer">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="flex items-center py-4 px-6 text-slate-700 whitespace-nowrap dark:text-white">
                                <img class="w-10 h-10 rounded-full" src="{{ $user->avatar }}" alt="Jese image">
                                <div class="pl-3">
                                    <p class="text-base font-semibold">{{ $user->name }}</p>
                                    <p class="font-normal text-gray-500">{{ $user->email }}</p>
                                </div>
                            </th>
                            <td class="py-4 px-6">
                                {{ $user->roles->first()->name }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-400 mr-2"></div> Online
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex space-x-3">
                                    <a href="#"
                                        class="font-medium text-blue-600 dark:text-blue-500 p-2 rounded-full hover:bg-slate-200">
                                        <i class="fad fa-eye"></i>
                                    </a>
                                    <a href="{{ route('users.edit', ['user' => $user]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 p-2 rounded-full hover:bg-slate-200">
                                        <i class="fad fa-pencil"></i>
                                    </a>
                                    <form action="" method="" class="m-0">
                                        <button type="submit"
                                            class="font-medium text-blue-600 dark:text-blue-500 p-2 rounded-full hover:bg-slate-200">
                                            <i class="fad fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p>No Data</p>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection
