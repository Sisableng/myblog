@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container relative mb-10">
        {{-- Back --}}
        <div class="float-right flex items-center">
            <a href="{{ url('roles') }}" class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mb-5">
                <i class="fad fa-arrow-left w-3 h-3"></i>
            </a>
        </div>

        <div>
            <p class="text-slate-500">{{ __('roles.detail.name') }}</p>
            <p class="text-4xl">{{ $role->name }}</p>
            <div class="grid grid-cols-3 sm:grid-cols-1 sm:gap-5 gap-7 justify-items-stretch mt-10">
                @forelse ($authorities as $manageName => $permissions)
                    <ul class="sm:w-full p-5 bg-gray-100 rounded-xl">
                        <li class="mb-5 pb-5 border-b border-slate-200">
                            <p class="text-center">{{ __("permissions.{$manageName}") }}</p>
                        </li>
                        @foreach ($permissions as $permission)
                            <li class="py-2">
                                <div>
                                    <input class="mr-3 rounded-full border-0 bg-slate-300" type="checkbox" value=""
                                        onclick="return false;"
                                        {{ in_array($permission, $rolePermissions) ? 'checked' : null }}>
                                    <label>{{ __("permissions.{$permission}") }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @empty
                    <p>{{ __('No data yet') }}</p>
                @endforelse
            </div>
        </div>



        {{-- <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6" width="250">
                            Nama
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Color
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Category
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Accesories
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Available
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Available
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            Magic Keyboard
                        </th>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-3" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-3" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-3" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-3" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="py-4 px-6">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-3" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-3" class="sr-only">checkbox</label>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> --}}



    </div>
@endsection
