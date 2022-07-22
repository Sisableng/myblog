@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">

        <a href="{{ route('users.create') }}" class="mybtn">{{ __('users.index.addBtn') }}</a>

        <div
            class="mt-7 overflow-x-auto relative shadow-2xl shadow-slate-200 dark:shadow-black/30 rounded-3xl sm:rounded-lg">
            <div class="flex justify-between items-center py-4 px-5 bg-emerald-500">
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
                <form action="{{ route('users.index') }}" method="GET" class="m-0">
                    <div class="relative">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fa-duotone fa-magnifying-glass text-white"></i>
                        </div>
                        <input id="myInput" type="search" name="keyword" value="{{ request()->get('keyword') }}"
                            class="block p-2 pl-10 w-80 text-sm text-white bg-white/30 rounded-full border-0 placeholder:text-white/50 focus:border-0 focus:ring-0 focus:bg-emerald-600"
                            placeholder="{{ __('users.index.search.placeholder') }}">
                    </div>
                </form>
            </div>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-white/50 uppercase bg-emerald-500">
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
                        <th scope="col" class="py-3 px-6 w-28">

                        </th>
                    </tr>
                </thead>
                @forelse ($users as $user)
                    <tbody>
                        <tr class="bg-white dark:bg-slate-800 hover:bg-gray-100 dark:hover:bg-slate-700">
                            <td class="p-4 w-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-emerald-500 border-0 rounded-full bg-slate-200 dark:bg-slate-600 focus:ring-emerald-200 dark:focus:ring-emerald-500/30 focus:ring-offset-0 focus:border-0 cursor-pointer">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row" class="flex items-center py-4 px-6 text-slate-700 dark:text-slate-300">
                                <img class="w-10 h-10 rounded-full" src="{{ $user->avatar }}" alt="Jese image">
                                <div class="pl-3">
                                    <p class="text-base font-bold">{{ $user->name }}</p>
                                    <p class="font-normal text-slate-500">{{ $user->email }}</p>
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
                                    <a href="{{ route('users.edit', ['user' => $user]) }}"
                                        class="font-medium text-blue-600 dark:text-blue-500 p-2 rounded-full hover:bg-slate-200 dark:hover:bg-slate-600">
                                        <i class="fad fa-pencil"></i>
                                    </a>
                                    <form action="{{ route('users.destroy', ['user' => $user]) }}" method="POST"
                                        class="m-0" role="alert" alert-title="{{ __('users.alert.delete.title') }}"
                                        alert-text="{!! __('users.alert.delete.message.confirm', ['title' => $user->name]) !!}"
                                        alert-btn-yes="{{ __('users.alert.btn.confirm') }}"
                                        alert-btn-cancel="{{ __('users.alert.btn.cancel') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="font-medium text-blue-600 dark:text-blue-500 p-2 rounded-full hover:bg-slate-200 dark:hover:bg-slate-600">
                                            <i class="fad fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                @empty
                    @if (request()->get('keyword'))
                        <div id="toast-notif"
                            class="fixed top-10 right-10 z-[99999] flex items-center justify-between p-4 space-x-4 w-full max-w-xs text-slate-300 bg-slate-700 rounded-lg divide-slate-200 shadow dark:bg-slate-800"
                            role="alert">
                            <div>
                                <i class="fa-solid fa-face-sad-tear text-yellow-300 pr-2"></i>
                                <p class="pl-4 text-sm font-normal inline-flex border-l border-slate-500">
                                    {!! __('users.index.search.null', ['keyword' => request()->get('keyword')]) !!}</p>
                            </div>
                            <button type="button" class="text-slate-500" data-dismiss-target="#toast-notif"
                                aria-label="Close">
                                <i class="fas fa-xmark"></i>
                            </button>
                        </div>
                    @else
                        <div id="toast-notif"
                            class="fixed top-10 right-10 z-[99999] flex items-center justify-between p-4 space-x-4 w-full max-w-xs text-slate-300 bg-slate-700 rounded-lg divide-slate-200 shadow dark:bg-slate-800"
                            role="alert">
                            <div>
                                <i class="fa-solid fa-face-sad-cry text-yellow-300 pr-2"></i>
                                <p class="pl-4 text-sm font-normal inline-flex border-l border-slate-500">
                                    {!! __('No data Yet') !!}</p>
                            </div>
                            <button type="button" class="text-slate-500" data-dismiss-target="#toast-notif"
                                aria-label="Close">
                                <i class="fas fa-xmark"></i>
                            </button>
                        </div>
                    @endif
                @endforelse
            </table>
        </div>

        @if ($users->hasPages())
            <div class="flex justify-end mt-10">
                {{ $users->links() }}
            </div>
        @endif

    </div>
@endsection

@push('javascript-internal')
    <script>
        $(document).ready(function() {
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });

            });
        });
    </script>
@endpush
