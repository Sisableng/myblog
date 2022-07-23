<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@18657a9/css/all.min.css" rel="stylesheet"
        type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

    @stack('css-external')
    @stack('css-internal')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        // It's best to inline this in `head` to avoid FOUC (flash of unstyled content) when changing pages or themes
        if (
            localStorage.getItem('color-theme') === 'dark' ||
            (!('color-theme' in localStorage) &&
                window.matchMedia('(prefers-color-scheme: dark)').matches)
        ) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

</head>

<body class="dark:bg-slate-900">
    <div id="app" class="">

        @if (Auth::check())
            <div class="relative">
                <div id="hamburger"
                    class="z-40 fixed text-slate-800 dark:text-slate-500 text-2xl top-8 left-7 peer transition cursor-pointer hidden sm:block"
                    onclick="Open()">
                    <p><i class="fad fa-bars-staggered"></i></p>
                </div>
                <div class="overlay hidden" onclick="Close()"></div>
                <asside
                    class="sidebar sm:shadow-2xl fixed top-0 bottom-0 lg:left-0 lg:transform-none transform -translate-x-96 pb-5 px-5 w-[250px] sm:w-[300px] bg-white dark:bg-slate-800 peer-focus:left-0 peer:transition-all ease-out duration-300 rounded-r-3xl shadow-xl shadow-slate-200 dark:shadow-black/30">


                    <div class="head w-full text-slate-700 text-xl mb-10 sticky top-3 z-50 bg-white dark:bg-slate-800 ">
                        <div class="relative p-2.5 pt-5 flex flex-col items-center">
                            <img src="{{ asset('images/logo.png') }}" class="w-13 h-10" alt="logo">
                            <h4 class="font-bold dark:text-slate-200 ml-3 mt-5 sm:text-[15px]">
                                <span class="font-normal">Ciloa</span>Media
                            </h4>
                            <div class="absolute top-3 right-3">
                                <i class="fa fa-xmark text-slate-300 active:text-emerald-500 lg:hidden"
                                    onclick="Close()"></i>
                            </div>
                        </div>
                    </div>

                    {{-- Sidebar Item --}}
                    <div>
                        <div class="group sidebar-items {{ Request::is('home') ? 'active' : '' }}">
                            <i class="far fa-objects-column w-[50px]"></i>
                            <a href="{{ url('home') }}" class="w-full  group-hover:text-emerald-500 ">
                                {{ trans('dashboard.menu.dashboard') }}
                            </a>
                        </div>

                        {{-- Post --}}
                        @can('manage_posts')
                            <div class="drop group z-20 bg-white drak:focus:bg-slate-700 dark:bg-slate-800 sidebar-items cursor-pointer select-none {{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'active' : '' }}"
                                onclick="dropdown()">
                                <i class="far fa-file-lines w-[50px]"></i>
                                <div class="flex justify-between w-full items-center">
                                    <span class=" group-hover:text-emerald-500 ">{{ trans('dashboard.menu.post') }}</span>
                                    <span class="text-sm" id="arrow">
                                        <i class="fas fa-caret-down text-emerald-500"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="z-10 transition-all text-left text-sm mt-2 w-[90%] mx-auto px-4 py-3 bg-gray-100 dark:bg-slate-700 rounded-xl {{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'visible' : 'sub' }}"
                                id="submenu">
                                <div class="flex flex-col">
                                    <a href="{{ url('posts') }}"
                                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('posts', 'posts/create', 'posts/*') ? 'active' : '' }}">
                                        {{ trans('dashboard.menu.data') }}
                                    </a>
                                    <a href="{{ url('posts?status=draft') }}"
                                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500">
                                        {{ trans('dashboard.menu.trash') }}
                                    </a>
                                </div>
                            </div>
                        @endcan

                        {{-- Tags --}}
                        @can('manage_tags')
                            <div
                                class="group sidebar-items {{ Request::is('tags', 'tags/create', 'tags/*/edit') ? 'active' : '' }}">
                                <i class="far fa-tags w-[50px]"></i>
                                <a href="{{ url('tags') }}"
                                    class="w-full  group-hover:text-emerald-500 ">{{ trans('dashboard.menu.tags') }}</a>
                            </div>
                        @endcan

                        {{-- Categories --}}
                        @can('manage_categories')
                            <div
                                class="group sidebar-items {{ Request::is('categories', 'categories/create', 'categories/*/edit', 'categories/*') ? 'active' : '' }}">
                                <i class="far fa-bookmark w-[50px]"></i>
                                <a href="{{ url('categories') }}" class="w-full  group-hover:text-emerald-500 ">
                                    {{ trans('dashboard.menu.category') }}
                                </a>
                            </div>
                        @endcan



                        {{-- Settings --}}
                        <div class="drop group z-20 bg-white dark:bg-slate-800 sidebar-items cursor-pointer select-none {{ Request::is('settings/general', 'filemanager/index', 'roles', 'roles/*', 'users', 'users/create') ? 'active' : '' }}"
                            onclick="dropdown2()">
                            <i class="far fa-gears w-[50px]"></i>
                            <div class="flex justify-between w-full items-center">
                                <span class=" group-hover:text-emerald-500 ">
                                    {{ trans('dashboard.menu.settings') }}
                                </span>
                                <span class="text-sm" id="arrow2">
                                    <i class="fas fa-caret-down text-emerald-500"></i>
                                </span>
                            </div>
                        </div>

                        <div class="z-10 transition-all text-left text-sm mt-2 w-[90%] mx-auto px-4 py-3 bg-gray-100 dark:bg-slate-700 rounded-xl {{ Request::is('settings/general', 'filemanager/index', 'roles', 'roles/*', 'users', 'users/create') ? 'block' : 'sub2' }}"
                            id="submenu2">
                            <div class="flex flex-col">
                                <a href="{{ url('settings/general') }}"
                                    class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('settings/general') ? 'active' : '' }}">
                                    {{ trans('dashboard.menu.general') }}
                                </a>

                                {{-- Users --}}
                                @can('manage_users')
                                    <a href="{{ route('users.index') }}"
                                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('users', 'users/create') ? 'active' : '' }}">
                                        {{ trans('dashboard.menu.user') }}
                                    </a>
                                @endcan

                                {{-- Roles --}}
                                @can('manage_roles')
                                    <a href="{{ route('roles.index') }}"
                                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('roles', 'roles/*') ? 'active' : '' }}">
                                        {{ trans('dashboard.menu.roles') }}
                                    </a>
                                @endcan

                                <a href="{{ route('filemanager.index') }}"
                                    class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('filemanager/index') ? 'active' : '' }}">
                                    {{ trans('dashboard.menu.filemanager') }}
                                </a>

                            </div>
                        </div>
                    </div>
                    {{-- End Sidebar Item --}}

                    <div
                        class="head sticky bottom-0 top-full inset-x-0 mx-auto w-full bg-white dark:bg-slate-800 py-5 px-5 flex justify-end">
                        <div class="sm:hidden cursor-pointer" onclick="collaps()">
                            <i class="fas fa-circle-caret-left text-3xl text-slate-300"></i>
                        </div>
                    </div>

                </asside>

                <div id="collapse"
                    class="invisible sm:hidden fixed top-0 bottom-0 lg:left-0 z-40 bg-white dark:bg-slate-800 w-16 flex-col space-y-20 px-3 py-5 justify-center">
                    <p
                        class="text-center font-normal p-2 bg-slate-200 dark:bg-slate-700 dark:text-slate-300 rounded-full">
                        C<span class="font-bold">M</span>
                    </p>
                    <div class="text-xl text-center w-full">
                        <ul class="text-slate-400 space-y-10">
                            <li>
                                <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                                    <i class="far fa-objects-column"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/posts') }}"
                                    class="{{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'active' : '' }}">
                                    <i class="far fa-file-lines"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/tags') }}"
                                    class="{{ Request::is('tags', 'tags/create', 'tags/*/edit') ? 'active' : '' }}">
                                    <i class="far fa-tags"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/category') }}"
                                    class="{{ Request::is('categories', 'categories/create', 'categories/*/edit', 'categories/*') ? 'active' : '' }}">
                                    <i class="far fa-bookmark"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('#') }}">
                                    <i class="far fa-gears"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="cursor-pointer text-2xl text-center w-full" onclick="collaps()">
                        <i class="fad fa-circle-play"></i>
                    </div>
                </div>

            </div>
        @endif

        <div id="contain" class="lg:pl-[22rem] transition-spacing max-w-8xl mx-auto lg:px-16 sm:px-6 md:px-8">
            @if (Auth::check())
                <div id="topNav"
                    class="fixed left-0 top-0 w-full z-30 flex justify-between sm:justify-end py-5 lg:pl-[22rem] lg:pr-16 sm:pr-5 transition-spacing bg-white dark:bg-slate-900">

                    @guest
                        <ul class="hidden">
                            <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="nav-item hidden">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif



                        </ul>
                    @else
                        <div class="flex items-center space-x-5 sm:hidden">
                            <h1 class="text-xl font-semibold">{{ $title }}</h1>
                            <span>-</span>
                            <p class="text-slate-500">{{ date('d M Y') }}</p>
                        </div>
                        <div class="flex items-center space-x-5">

                            <!-- Dark mode switcher -->
                            <button id="theme-toggle" type="button" class="text-gray-500 text-2xl dark:text-gray-400">
                                <span id="theme-toggle-dark-icon" class="hidden">
                                    <i class="fad fa-moon-cloud"></i>
                                </span>
                                <span id="theme-toggle-light-icon" class="hidden text-yellow-300">
                                    <i class="fad fa-sun-bright"></i>
                                </span>
                            </button>
                            <!-- Dark mode switcher end -->

                            <!-- Set Lang -->
                            <div>
                                <button id="dropdownDefault" data-dropdown-toggle="setlang"
                                    data-dropdown-placement="bottom"
                                    class=" font-medium rounded-full text-base px-4 py-2.5 text-center inline-flex items-center focus:bg-slate-200 dark:focus:bg-slate-800 dark:text-slate-500"
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

                            <div>
                                <button type="button"
                                    class="flex text-xl bg-slate-800 rounded-full md:mr-0 ring-4 ring-slate-300 dark:ring-slate-700 focus:ring-emerald-500 focus:ring-4 dark:focus:ring-slate-600"
                                    id="user-menu-button" aria-expanded="false" type="button"
                                    data-dropdown-toggle="mydropdown" data-dropdown-placement="left">
                                    <span class="sr-only">Open user menu</span>
                                    <img src="{{ Auth::user()->avatar }}" class="w-8 h-8 rounded-full" alt="">
                                </button>
                                <!-- Dropdown menu -->
                                <div class="hidden z-50 my-4 text-base list-none bg-slate-200 rounded-lg divide-y divide-slate-300 shadow dark:bg-slate-700 dark:divide-slate-600"
                                    id="mydropdown">
                                    <div class="py-3 px-4">
                                        <span
                                            class="block text-sm text-slate-900 dark:text-white">{{ Auth::user()->name }}</span>
                                        <span
                                            class="block text-sm font-medium text-slate-500 truncate dark:text-slate-400">{{ Auth::user()->email }}</span>
                                    </div>
                                    <ul class="py-1" aria-labelledby="dropdown">
                                        <li>
                                            <a href="{{ url('settings/general') }}"
                                                class="block py-2 px-4 text-sm text-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 dark:text-slate-200 dark:hover:text-white">{{ trans('dashboard.menu.settings') }}</a>
                                        </li>
                                        <li>
                                            <a class="block py-2 px-4 text-sm text-slate-700 hover:bg-slate-300 dark:hover:bg-slate-600 dark:text-slate-200 dark:hover:text-white"
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ trans('dashboard.menu.logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endguest
                    </div>
                </div>

                <main class="mt-28 py-4">
                    @yield('content')
                </main>
            @endif
        </div>
        <main>
            @yield('auth')
        </main>
    </div>
    <script>
        // Sidebar dropdown
        function dropdown() {
            document.querySelector("#submenu").classList.toggle('sub');
            document.querySelector("#arrow").classList.toggle('rotate-180');
        }

        function dropdown2() {
            document.querySelector("#submenu2").classList.toggle('sub2');
            document.querySelector("#arrow2").classList.toggle('rotate-180');
        }

        // Sidebar Collapse
        function collaps() {
            document.querySelector("#collapse").classList.toggle("invisible");
            document.querySelector("#contain").classList.toggle("lg:pl-[8rem]");
            document.querySelector("#topNav").classList.toggle("lg:pl-[8rem]");
            document.querySelector(".sidebar").classList.toggle("lg:transform-none");
        }

        // Sidebar
        function Open() {
            document.querySelector(".sidebar").classList.toggle("transform-none");
            document.querySelector(".overlay").classList.toggle("hidden");
        }

        function Close() {
            document.querySelector(".sidebar").classList.toggle("transform-none");
            document.querySelector(".overlay").classList.toggle("hidden");
        }

        // Fixed Top Nav
        window.onscroll = function() {
            const header = document.querySelector("#topNav");
            const hmbgr = document.querySelector("#hamburger");
            const fixedNav = header.offsetTop;

            if (window.pageYOffset > fixedNav) {
                header.classList.add("myShadow");
                header.classList.remove("py-5");
                header.classList.add("py-3");
                hmbgr.classList.remove("top-8");
                hmbgr.classList.add("top-6");
            } else {
                header.classList.remove("myShadow");
                header.classList.add("py-5");
                header.classList.remove("py-3");
                hmbgr.classList.add("top-8");
                hmbgr.classList.remove("top-6");
            }
        };
    </script>

    <script>
        // Select2 Parent Category
        $(function() {
            // Generate Slug
            function generateSlug(value) {
                return value.trim()
                    .toLowerCase()
                    .replace(/[^a-z\d-]/gi, '-')
                    .replace(/-+/g, '-').replace(/^-|-$/g, "");
            }

            // Select parent category
            $('#select_category_parent').select2({
                placeholder: $(this).attr('data-placeholder'),
                language: "{{ app()->getLocale() }}",
                allowClear: true,
                ajax: {
                    url: "{{ route('categories.select') }}",
                    dataType: 'json',
                    delay: 250,
                    processResults: function(data) {
                        return {
                            results: $.map(data, function(item) {
                                return {
                                    text: item.title,
                                    id: item.id
                                }
                            })
                        };
                    }
                }
            });

            // Input title
            $('#category_title').change(function() {
                let title = $(this).val();
                let parent_category = $('#select_category_parent').val() ?? "";
                $('#category_slug').val(generateSlug(title + " " + parent_category));
            });

            // input select parent category
            $('#select_category_parent').change(function() {
                let title = $('#category_title').val();
                let parent_category = $(this).val() ?? "";
                $('#category_slug').val(generateSlug(title + " " + parent_category));
            });

            // Event:Thumbnail
            $('#button_file').filemanager('image');
        });

        $(document).ready(function() {
            // Show Hide Password
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                    $('#show_hide_password a').removeClass("show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                    $('#show_hide_password a').addClass("show");
                }
            });
        });
    </script>

    {{-- DarkMode --}}
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            if (/general/.test(window.location.href)) {
                themeToggleBtnDark.classList.toggle('theme-active');
                themeToggleBtnLight.classList.toggle('theme-active');
            }

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
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>
    @stack('javascript-external')
    @stack('javascript-internal')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js" defer></script>
    <!-- Flowbite -->
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <!-- Select2 Js -->
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>
