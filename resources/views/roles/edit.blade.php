@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container relative mb-10">
        <form action="{{ route('roles.update', ['role' => $role]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex items-center justify-end">
                <a href="{{ url('roles') }}" class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mr-5">
                    <i class="fad fa-arrow-left"></i>
                </a>
                <button type="submit" class="mybtn">{{ __('roles.edit.submit') }}</button>
            </div>
            <div>
                <label for="role_name" class="text-slate-500 mb-1">{{ __('roles.detail.name') }}</label>
                <input id="role_name" type="text" name="name" value="{{ old('name', $role->name) }}"
                    placeholder="{{ __('roles.create.name') }}"
                    class="block text-3xl bg-transparent border-0 border-b border-slate-200 focus:border-green-500 focus:ring-transparent w-full placeholder:text-slate-400 @error('name') is-invalid @enderror">
                @error('name')
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
            <div id="role_permission"
                class="grid grid-cols-3 sm:grid-cols-1 sm:gap-5 gap-7 justify-items-stretch mt-10 rounded-xl @error('permissions') is-invalid @enderror">
                @forelse ($authorities as $manageName => $permissions)
                    <ul class="sm:w-full p-5 bg-gray-100 rounded-xl">
                        <li class="mb-5 pb-5 border-b border-slate-200">
                            <p class="text-center">{{ __("permissions.{$manageName}") }}</p>
                        </li>
                        @foreach ($permissions as $permission)
                            <li class="py-2">
                                <div>
                                    @if (old('permissions', $permissionChecked))
                                        <input id="{{ $permission }}"
                                            class="mr-3 cursor-pointer rounded-full border-0 bg-slate-300" type="checkbox"
                                            value="{{ $permission }}" name="permissions[]"
                                            {{ in_array($permission, old('permissions', $permissionChecked)) ? 'checked' : null }}>
                                    @else
                                        <input id="{{ $permission }}"
                                            class="mr-3 cursor-pointer rounded-full border-0 bg-slate-300" type="checkbox"
                                            value="{{ $permission }}" name="permissions[]">
                                    @endif
                                    <label for="{{ $permission }}"
                                        class="select-none cursor-pointer">{{ __("permissions.{$permission}") }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @empty
                    <p>{{ __('No data yet') }}</p>
                @endforelse
            </div>
            @error('permissions')
                <div id="toast-permissions"
                    class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                    role="alert">
                    <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                        <i class="fa-duotone fa-message-exclamation"></i>
                    </div>
                    <div class="ml-3 text-sm font-normal text-slate-900">{{ $message }}</div>
                    <button type="button"
                        class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                        data-dismiss-target="#toast-permissions" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                    </button>
                </div>
            @enderror
        </form>
    </div>
@endsection
