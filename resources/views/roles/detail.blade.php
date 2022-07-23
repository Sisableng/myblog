@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container relative mb-10">
        {{-- Back --}}
        <div class="float-right flex items-center">
            <a href="{{ url('roles') }}"
                class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mb-5 dark:bg-slate-600 dark:hover:bg-slate-700 dark:text-slate-300">
                <i class="fad fa-arrow-left w-3 h-3"></i>
            </a>
        </div>

        <div>
            <p class="text-slate-500">{{ __('roles.detail.name') }}</p>
            <p class="text-4xl dark:text-slate-300">{{ $role->name }}</p>
            <div class="grid grid-cols-3 sm:grid-cols-1 sm:gap-5 gap-7 justify-items-stretch mt-10">
                @forelse ($authorities as $manageName => $permissions)
                    <ul class="sm:w-full p-5 bg-gray-100 rounded-xl dark:bg-slate-800 dark:text-slate-300">
                        <li class="mb-5 pb-5 border-b border-slate-200 dark:border-slate-700">
                            <p class="text-center">{{ __("permissions.{$manageName}") }}</p>
                        </li>
                        @foreach ($permissions as $permission)
                            <li class="py-2">
                                <div>
                                    <input class="mr-3 rounded-full border-0 bg-slate-300 dark:bg-slate-700" type="checkbox"
                                        value="" onclick="return false;"
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
    </div>
@endsection
