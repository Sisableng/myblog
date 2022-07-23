@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container relative mb-10">
        <form action="{{ route('roles.store') }}" method="POST">
            @csrf
            <div class="flex items-center justify-end">
                <a href="{{ url('roles') }}"
                    class="p-3 bg-slate-200 text-sm rounded-full hover:bg-slate-300 mr-5 dark:bg-slate-600 dark:hover:bg-slate-700 dark:text-slate-300">
                    <i class="fad fa-arrow-left"></i>
                </a>
                <button type="submit" class="mybtn">{{ __('roles.create.submit') }}</button>
            </div>
            <div>
                <label for="role_name" class="text-slate-500 mb-1">{{ __('roles.detail.name') }}</label>
                <input id="role_name" type="text" name="name" value="{{ old('name') }}"
                    placeholder="{{ __('roles.create.name') }}"
                    class="block text-3xl bg-transparent border-0 border-b border-slate-200 dark:border-slate-700 focus:border-green-500 focus:ring-transparent w-full placeholder:text-slate-500 dark:text-slate-300 @error('name') is-invalid @enderror">
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

            <div class="mt-10">
                <label for="select_all" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" type="checkbox" name="select_all" id="select_all" class="sr-only peer">
                    <div
                        class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-500">
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Check All</span>
                </label>
            </div>

            <div id="role_permission"
                class="grid grid-cols-3 sm:grid-cols-1 sm:gap-5 gap-7 justify-items-stretch mt-10 rounded-xl @error('permissions') is-invalid @enderror">
                @forelse ($authorities as $manageName => $permissions)
                    <ul class="sm:w-full p-5 bg-gray-100 rounded-xl dark:text-slate-300 dark:bg-slate-800">
                        <li class="flex items-center mb-5 pb-5 border-b border-slate-200 dark:border-slate-700">
                            <div class="w-full text-center">
                                <p class="">{{ __("permissions.{$manageName}") }}</p>
                            </div>
                        </li>
                        @foreach ($permissions as $permission)
                            <li class="py-2">
                                <div>
                                    @if (old('permissions'))
                                        <input id="{{ $permission }}"
                                            class="text-emerald-500 mr-3 cursor-pointer rounded-full focus:ring-2 focus:ring-emerald-500/50 focus:ring-offset-0 border-0 bg-slate-300 dark:bg-slate-700"
                                            type="checkbox" value="{{ $permission }}" name="permissions[]"
                                            {{ in_array($permission, old('permissions')) ? 'checked' : null }}>
                                    @else
                                        <input id="{{ $permission }}"
                                            class="text-emerald-500 mr-3 cursor-pointer rounded-full focus:ring-2 focus:ring-emerald-500/50 focus:ring-offset-0 border-0 bg-slate-300 dark:bg-slate-700"
                                            type="checkbox" value="{{ $permission }}" name="permissions[]">
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
@push('javascript-internal')
    <script>
        // Check All
        $('#select_all').click(function(event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;
                });
            }
        });
    </script>
@endpush
