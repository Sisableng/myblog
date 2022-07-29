@extends('layouts.auth')
<title>{{ __('Login') }}</title>
@section('content')
    <div class="text-4xl text-center font-semibold text-slate-800 mb-10 dark:text-slate-300">
        {{ __('auth.login.title') }}
        <p class="text-base text-slate-500 mt-3">{{ __('auth.login.sub') }}</p>
    </div>

    <div class="container max-w-lg">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-5">
                <div class="">
                    <input placeholder="mail@mail.com" id="email" type="email"
                        class="form-login autofill:bg-yellow-200 @error('email') is-invalid @enderror" name="email"
                        value="{{ old('email') }}" data-tooltip-target="tooltip-1" data-tooltip-placement="top" required
                        autocomplete="email">
                    <div id="tooltip-1" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                        Email
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    @error('email')
                        <div id="toast-danger"
                            class="absolute top-10 lg:right-10 flex items-center w-full max-w-xs p-4 mb-4 text-slate-100 bg-red-500 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 transition-opacity duration-300 ease-in-out"
                            role="alert">
                            <div class="ml-3 text-sm font-normal">{{ $message }}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-slate-300 rounded-lg inline-flex h-8 w-8 dark:bg-gray-800 dark:hover:bg-gray-700"
                                data-dismiss-target="#toast-danger" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="col-md-6">
                    <div id="show_hide_password" class="flex items-center">
                        <input placeholder="••••••••" id="password" type="password"
                            class="form-login @error('password') is-invalid @enderror" name="password"
                            data-tooltip-target="tooltip-2" data-tooltip-placement="bottom" required
                            autocomplete="current-password">
                        <a href=""
                            class="group w-10 h-10 p-6 mb-3 ml-3 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center transition-all ease-in-out dark:bg-slate-700 dark:hover:bg-slate-800">
                            <i class="fad fa-eye text-slate-400 group-hover:text-slate-500"></i>
                        </a>
                    </div>
                    <div id="tooltip-2" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                        Password
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    @error('password')
                        <div id="toast-pw"
                            class="absolute top-10 lg:right-10 flex items-center w-full max-w-xs p-4 mb-4 text-slate-100 bg-red-500 rounded-lg shadow dark:text-gray-400 dark:bg-gray-800 transition-opacity duration-300 ease-in-out"
                            role="alert">
                            <div class="ml-3 text-sm font-normal">{{ $message }}</div>
                            <button type="button"
                                class="ml-auto -mx-1.5 -my-1.5 text-slate-300 rounded-lg inline-flex h-8 w-8 dark:bg-gray-800 dark:hover:bg-gray-700"
                                data-dismiss-target="#toast-pw" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    @enderror
                </div>
            </div>

            {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="flex items-center">
                                    <input class="form-check" type="checkbox" name="remember" id="remember"
                                        value="1" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

            <div class="flex justify-end mt-5">
                <div class="absolute bottom-28 inset-x-0 mx-auto text-center">
                    @if (Route::has('password.request'))
                        <a class="text-slate-500 text-sm hover:text-green-500" href="{{ route('password.request') }}">
                            {{ __('auth.login.forgot') }}
                        </a>
                    @endif
                </div>
                <div class="">
                    <button type="submit"
                        class="py-2.5 px-7 hover:bg-green-600 bg-green-500 rounded-full font-semibold text-slate-100">
                        {{ __('auth.login.submit') }}
                    </button>

                </div>
            </div>
        </form>
    </div>
@endsection
