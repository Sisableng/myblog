@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container">

        <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="flex justify-between mb-10">
                <div class="flex items-center mr-5">
                    <a href="{{ url('users') }}"
                        class="p-4 bg-slate-200 dark:bg-slate-700 dark:hover:bg-slate-600 dark:text-slate-300 text-sm rounded-full hover:bg-slate-300">
                        <i class="fad fa-arrow-left w-3 h-3"></i>
                    </a>
                </div>
                <button type="submit" class="mybtn">{{ __('users.edit.submit') }}</button>
            </div>

            <div class="grid lg:grid-cols-3 gap-10">

                {{-- Kiri --}}
                <div class="sm:col-span-2">

                    {{-- avatar --}}
                    <div>
                        <div
                            class="w-full flex flex-col justify-center p-10 bg-slate-200 rounded-3xl dark:bg-slate-800 @error('avatar') is-invalid @enderror">
                            <div id="holder"
                                class="preview mx-auto w-32 h-32 bg-slate-300 dark:bg-slate-700 ring-8 ring-slate-300/50 dark:ring-slate-700 rounded-full overflow-hidden">
                                <img src="{{ $user->avatar }}" alt="">
                            </div>

                            <input type="text" id="user-file" value="{{ old('avatar', asset($user->avatar)) }}"
                                name="avatar" class="hidden my-7 border-0 bg-transparent text-slate-400 focus:ring-0"
                                readonly>

                            <div class="mt-10">
                                <button id="user_file" data-input="user-file" data-preview="holder"
                                    class="block bg-emerald-500 mx-auto p-2.5 px-5 text-white font-bold rounded-full">{{ __('users.create.avatarBtn') }}</button>
                            </div>
                        </div>

                        @error('avatar')
                            <div id="toast-avatar"
                                class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                    <i class="fa-duotone fa-message-exclamation"></i>
                                </div>
                                <div class="ml-3 text-sm font-normal text-slate-900">{{ $message }}</div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                    data-dismiss-target="#toast-avatar" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                                </button>
                            </div>
                        @enderror
                    </div>

                    {{-- Role --}}
                    <div class="mt-10">
                        <label for="role_user"
                            class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-400">{{ __('users.create.role.title') }}</label>
                        <select name="role" id="role_user" class="form-control @error('role') is-invalid @enderror"
                            data-placeholder="{{ __('users.create.role.placeholder') }}">
                            @if ($roleSelected)
                                <option value="{{ $roleSelected->id }}" selected>
                                    {{ $roleSelected->name }}
                                </option>
                            @endif
                        </select>

                        @error('role')
                            <div id="toast-role"
                                class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                    <i class="fa-duotone fa-message-exclamation"></i>
                                </div>
                                <div class="ml-3 text-sm font-normal text-slate-900">{!! $message !!}</div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                    data-dismiss-target="#toast-role" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                                </button>
                            </div>
                        @enderror
                    </div>

                </div>

                {{-- Kanan --}}
                <div class="col-span-2">

                    <div class="mb-10">
                        <label for="first_name"
                            class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('users.create.name') }}</label>
                        <input name="name" value="{{ old('name', $user->name) }}" type="text" id="first_name"
                            class="form-control @error('name') is-invalid @enderror">

                        @error('name')
                            <div id="toast-name"
                                class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                    <i class="fa-duotone fa-message-exclamation"></i>
                                </div>
                                <div class="ml-3 text-sm font-normal text-slate-900">{!! $message !!}</div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                    data-dismiss-target="#toast-name" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                                </button>
                            </div>
                        @enderror
                    </div>

                    <div class="mb-10">
                        <label for="email"
                            class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-300">{{ __('users.create.email') }}</label>
                        <input name="email" value="{{ old('email', $user->email) }}" type="email" id="email"
                            class="form-control @error('email') is-invalid @enderror">

                        @error('email')
                            <div id="toast-email"
                                class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                                role="alert">
                                <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                    <i class="fa-duotone fa-message-exclamation"></i>
                                </div>
                                <div class="ml-3 text-sm font-normal text-slate-900 dark:text-slate-300">{!! $message !!}
                                </div>
                                <button type="button"
                                    class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                    data-dismiss-target="#toast-email" aria-label="Close">
                                    <span class="sr-only">Close</span>
                                    <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                                </button>
                            </div>
                        @enderror
                    </div>
                    {{-- <div class="flex justify-end">
                        <button type="submit" class="mybtn">Submit</button>
                    </div> --}}
                </div>
            </div>
        </form>
    </div>
@endsection

@push('css-external')
    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">
@endpush

@push('javascript-external')
    <!-- Select2 Js -->
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
@endpush

@push('javascript-internal')
    <script>
        $(function() {
            // Select Role
            $('#role_user').select2({
                placeholder: $(this).attr('data-placeholder'),
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('roles.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.name,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });
            // Filemanager
            $('#user_file').filemanager('image');
        });
    </script>
@endpush
