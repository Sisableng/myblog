@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">

        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="flex justify-between mb-10">
                <div class="flex items-center mr-5">
                    <a href="{{ url('users') }}" class="p-4 bg-slate-200 text-sm rounded-full hover:bg-slate-300">
                        <i class="fad fa-arrow-left w-3 h-3"></i>
                    </a>
                </div>
                <button type="submit" class="mybtn">Submit</button>
            </div>
            <div class="grid gap-10 mb-10 md:grid-cols-2">
                <div>
                    <label for="first_name"
                        class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                    <input name="name" value="{{ old('name') }}" type="text" id="first_name"
                        class="form-control @error('name') is-invalid @enderror" placeholder="John">

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
                <div>
                    <label for="email"
                        class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-300">Email</label>
                    <input name="email" value="{{ old('email') }}" type="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Doe">

                    @error('email')
                        <div id="toast-email"
                            class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{!! $message !!}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-email" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>

            <div id="show_hide_password" class="grid gap-10 mb-10 md:grid-cols-2">
                <div>
                    <label for="password"
                        class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-300">Password
                        <span class="italic text-sm text-slate-400 ml-3">(Max 8 Character)</span></label>
                    <input name="password" value="{{ old('password') }}" type="password" id="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="•••••••••">

                    @error('password')
                        <div id="toast-password"
                            class="z-50 fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{!! $message !!}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-password" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror
                </div>

                <div>
                    <label for="password_confirmation"
                        class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-300">Confirm
                        password</label>
                    <div class="flex items-center">
                        <input name="password_confirmation" value="{{ old('password_confirmation') }}" type="password"
                            id="password_confirmation"
                            class="form-control mr-3 @error('password_confirmation') is-invalid @enderror"
                            placeholder="•••••••••">
                        <a href=""
                            class="group w-10 h-10 p-6 rounded-full bg-slate-200 hover:bg-emerald-500 flex items-center justify-center transition-all ease-in-out">
                            <i class="fad fa-eye text-slate-400 group-hover:text-white"></i>
                        </a>
                    </div>

                    @error('password_confirmation')
                        <div id="z-50 toast-confirm-password"
                            class="fixed top-10 right-10 flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-red-200 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
                            role="alert">
                            <div class="inline-flex items-center justify-center flex-shrink-0 pt-1 text-2xl text-red-700">
                                <i class="fa-duotone fa-message-exclamation"></i>
                            </div>
                            <div class="ml-3 text-sm font-normal text-slate-900">{!! $message !!}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-red-700 rounded-lg p-1.5 hover:bg-red-300 inline-flex h-8 w-8"
                                data-dismiss-target="#toast-confirm-password" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <i class="fas fa-xmark w-5 h-5 pt-1"></i>
                            </button>
                        </div>
                    @enderror

                </div>
            </div>

            <div class="mb-10">
                <label for="role_user"
                    class="block mb-5 ml-5 text-sm font-medium text-gray-900 dark:text-gray-400">Role</label>
                <select name="role" id="role_user" class="form-control @error('role') is-invalid @enderror"
                    data-placeholder="{{ __('categories.create.parent-category-placeholder') }}">
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
            <div class="flex justify-end">
                <button type="submit" class="mybtn">Submit</button>
            </div>
        </form>

    </div>
@endsection

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
        });
    </script>
@endpush
