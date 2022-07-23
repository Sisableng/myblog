@extends('layouts.auth')
<title>{{ __('auth.reset.title') }}</title>
@section('content')
    <div class="text-center">
        <h1>{{ __('auth.reset.title') }}</h1>
    </div>

    <div class="p-10 sm:p-5 border border-slate-200 dark:border-slate-800 rounded-3xl">
        @if (session('status'))
            <div id="toast-simple"
                class="absolute bottom-20 left-0 right-0 mx-auto flex items-center p-4 space-x-4 w-full max-w-xs text-gray-500 bg-white rounded-lg divide-x divide-gray-200 shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
                role="alert">
                <i class="fas fa-paper-plane w-5 text-emerald-500"></i>
                <div class="pl-4 text-sm font-normal">
                    {{ session('status') }}
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-10">
                <label for="email" class="text-slate-500">{{ __('auth.reset.email.title') }}</label>

                <div class="mt-5">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" placeholder="{{ __('auth.reset.email.placeholder') }}"
                        required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="flex items-center justify-end">

                <a href="{{ route('login') }}"
                    class="flex justify-center items-center w-10 h-10 p-3 mr-5 rounded-full text-slate-400 bg-slate-200 dark:text-slate-500 dark:bg-slate-800 dark:hover:bg-slate-700"><i
                        class="fa-solid fa-arrow-left"></i></a>

                <button type="submit" class="mybtn">
                    {{ __('auth.reset.submit') }}
                </button>

            </div>
        </form>
    </div>
@endsection
