@extends('layouts.auth')
<title>{{ __('auth.reset.title') }}</title>
@section('content')
    <div class="text-center">
        <h1>{{ __('auth.reset.title') }}</h1>
    </div>

    <div class="p-10 sm:p-5 border border-slate-200 dark:border-slate-800 rounded-3xl">
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="row mb-3">
                <label for="email" class="text-slate-500">{{ __('auth.reset.email.title') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email"
                        class="form-control mt-5 mb-10 @error('email') is-invalid @enderror" name="email"
                        value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div id="show_hide_password">
                <div class="row mb-3">
                    <label for="password" class="text-slate-500">{{ __('auth.reset.password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password"
                            class="form-control mt-5 mb-10 @error('password') is-invalid @enderror" name="password" required
                            autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="password-confirm" class="text-slate-500">{{ __('auth.reset.confirm_password') }}</label>

                    <div class="flex items-center mt-5 mb-10">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                            required autocomplete="new-password">
                        <a href=""
                            class="group w-10 h-10 p-6 ml-3 rounded-full bg-slate-200 hover:bg-slate-300 flex items-center justify-center transition-all ease-in-out dark:bg-slate-700 dark:hover:bg-slate-800">
                            <i class="fad fa-eye text-slate-400 group-hover:text-slate-500"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="flex justify-end">

                <button type="submit" class="mybtn">
                    {{ __('auth.reset.submit2') }}
                </button>

            </div>
        </form>
    </div>
@endsection
