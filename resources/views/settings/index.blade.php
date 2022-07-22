@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <div class="space-y-20">

            {{-- Language --}}
            <div>
                <h1>Language</h1>

                <p class="mt-5 mb-10 text-slate-400">Pengaturan bahasa pada website, silahkan pilih sesuai kebutuhan.</p>

                <ul>
                    <li class="setting-items">
                        <p class="text-slate-500">pilih bahasa</p>
                        <!-- Set Lang -->
                        <div class="">
                            <button id="dropdownDefault" data-dropdown-toggle="setlang" data-dropdown-placement="bottom"
                                class="bg-slate-200 font-medium rounded-full text-base px-4 py-2.5 text-center inline-flex items-center focus:bg-slate-200 dark:focus:bg-slate-700 dark:text-slate-500 dark:bg-slate-800"
                                type="button">
                                @if (app()->getLocale())
                                @endif
                                @switch(app()->getLocale())
                                    @case('en')
                                        <p>English</p>
                                    @break

                                    @case('id')
                                        <p>Indonesia</p>
                                    @break

                                    @case('su')
                                        <p>Sunda</p>
                                    @break

                                    @default
                                @endswitch

                                <p class="ml-2 text-slate-400 uppercase">({{ app()->getLocale() }})</p>
                                <i class="fas fa-caret-down w-4 h-4 ml-2 pt-[2px]"></i>
                            </button>
                            <!-- Dropdown menu -->
                            <div id="setlang"
                                class="z-10 hidden bg-gray-100 rounded-lg shadow-xl w-[150px] dark:bg-slate-700">
                                <ul class="text-base sm:text-lg text-center text-slate-700 dark:text-slate-200"
                                    aria-labelledby="dropdownDefault">
                                    <li>
                                        <a href="{{ route('localization.switch', ['language' => 'en']) }}"
                                            class="text-base block px-4 py-2 hover:bg-slate-200 hover:rounded-t-lg dark:hover:bg-slate-600 dark:hover:text-white">
                                            {{ trans('localization.en') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('localization.switch', ['language' => 'id']) }}"
                                            class="text-base block px-4 py-2 hover:bg-slate-200 dark:hover:bg-slate-600 dark:hover:text-white">
                                            {{ trans('localization.id') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('localization.switch', ['language' => 'su']) }}"
                                            class="text-base block px-4 py-2 hover:bg-slate-200 hover:rounded-b-lg dark:hover:bg-slate-600 dark:hover:text-white">
                                            {{ trans('localization.su') }}
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Set -->
                    </li>
                </ul>

            </div>

            {{-- Theme --}}
            <div>
                <h1>Theme</h1>
                <p class="mt-5 mb-10 text-slate-400">
                    Tersedia tema Terang dan Gelap,
                    <br>
                    Jika mata kamu mudah lelah ubah tema ke warna gelap sehingga dapat
                    membuat mata kamu nyaman kembali.
                </p>
                <div class="grid grid-cols-2 gap-5 p-10 sm:p-5 bg-gray-100 dark:bg-slate-800 rounded-3xl">
                    <div class="">
                        <button id="theme-settings-light" class="w-full h-48 bg-slate-200 rounded-3xl dark:text-slate-600">
                            <i class="fa-duotone fa-cloud-sun text-7xl mb-5"></i>
                            <p>I'm Light</p>
                        </button>
                    </div>
                    <div class="">
                        <button id="theme-settings-dark" class="w-full h-48 bg-slate-700 rounded-3xl text-slate-300">
                            <i class="fa-duotone fa-moon-stars text-7xl mb-5"></i>
                            <p>I'm Dark</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('javascript-internal')
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Button Light
        var themeToggleBtnLight = document.getElementById('theme-settings-light');
        var themeToggleBtnDark = document.getElementById('theme-settings-dark');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleBtnLight.classList.remove('theme-active');
            themeToggleBtnDark.classList.add('theme-active');

            // Attribute
            themeToggleBtnLight.removeAttribute("disabled", "true");
            themeToggleBtnDark.setAttribute("disabled", "true");

            // Top Nav Icon
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleBtnDark.classList.remove('theme-active');
            themeToggleBtnLight.classList.add('theme-active');

            // Attribute
            themeToggleBtnLight.setAttribute("disabled", "true");
            themeToggleBtnDark.removeAttribute("disabled", "true");

            // Top Nav Icon
            themeToggleDarkIcon.classList.remove('hidden');
        }

        // Event Light
        themeToggleBtnLight.addEventListener('click', function() {


            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Remove disabled attribute for dark button
            var themeToggleBtnDark = document.getElementById('theme-settings-dark');
            themeToggleBtnDark.removeAttribute("disabled", "true");
            themeToggleBtnDark.classList.remove('theme-active');


            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            }

            themeToggleBtnLight.setAttribute("disabled", "true");
            themeToggleBtnLight.classList.add('theme-active');
        });

        // Event Dark
        themeToggleBtnDark.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // Remove disabled attribute for light button
            var themeToggleBtnLight = document.getElementById('theme-settings-light');
            themeToggleBtnLight.removeAttribute("disabled", "true");
            themeToggleBtnLight.classList.remove('theme-active');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            }

            themeToggleBtnDark.setAttribute("disabled", "true");
            themeToggleBtnDark.classList.add('theme-active');

        });
    </script>
@endpush
