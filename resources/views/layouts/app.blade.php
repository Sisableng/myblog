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
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
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

</head>

<body class="dark:bg-slate-900">
    <div id="app" class="">
        @if (Auth::check())
            <div>
                <div id="hamburger"
                    class="z-40 fixed text-slate-800 text-2xl top-8 left-7 peer transition cursor-pointer hidden sm:block"
                    onclick="Open()">
                    <p><i class="fad fa-bars-staggered"></i></p>
                </div>
                <div class="overlay hidden" onclick="Close()"></div>
                <asside
                    class="sidebar sm:shadow-2xl fixed top-0 bottom-0 lg:left-0 lg:transform-none transform -translate-x-96 p-2 px-5 w-[250px] sm:w-[300px] bg-white dark:bg-slate-800 peer-focus:left-0 peer:transition-all ease-out duration-300 border-r border-slate-100">
                    <div class="text-slate-700 text-xl mb-3 sticky top-0 z-50 bg-white">
                        <div class="p-2.5 mt-1 flex items-center">
                            <img src="{{ asset('images/logo.png') }}" class="w-10 h-7" alt="logo">
                            <h1 class="font-bold dark:text-slate-200 text-2xl ml-3 sm:text-[15px]">
                                <span class="font-normal">Ciloa</span>Media
                            </h1>
                            <i class="fa fa-xmark ml-28 lg:hidden" onclick="Close()"></i>
                        </div>
                        <div class="mt-1 bg-slate-100 mx-auto w-[90%] dark:bg-slate-800 h-[1px]"></div>
                    </div>
                    <div class="group sidebar-items {{ Request::is('home') ? 'active' : '' }}">
                        <i class="far fa-chart-tree-map w-[50px]"></i>
                        <a href="{{ url('home') }}"
                            class="text-[15px] w-full text-slate-700 group-hover:text-green-500 dark:text-slate-200 font-semibold">
                            {{ trans('dashboard.menu.dashboard') }}
                        </a>
                    </div>

                    {{-- Dropdown --}}
                    <div class="group z-20 bg-white sidebar-items cursor-pointer select-none {{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'active' : '' }}"
                        onclick="dropdown()">
                        <i class="far fa-file-lines w-[50px]"></i>
                        <div class="flex justify-between w-full items-center">
                            <span
                                class="text-[15px] text-slate-700 group-hover:text-green-500 dark:text-slate-200 font-semibold">{{ trans('dashboard.menu.post') }}</span>
                            <span class="text-sm" id="arrow">
                                <i class="fas fa-caret-down text-green-500"></i>
                            </span>
                        </div>
                    </div>
                    <div class="z-10 transition-all text-left text-sm mt-2 w-[90%] mx-auto px-4 py-3 bg-slate-200 dark:bg-slate-700 rounded-xl {{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'visible' : 'sub' }}"
                        id="submenu">
                        <div class="flex flex-col">
                            <a href="{{ url('posts') }}"
                                class="py-3 text-slate-700 dark:text-slate-300 hover:text-green-500 {{ Request::is('posts', 'posts/create', 'posts/*') ? 'active' : '' }}">
                                {{ trans('dashboard.menu.data') }}
                            </a>
                            <a href="" class="py-3 text-slate-700 dark:text-slate-300 hover:text-green-500">
                                {{ trans('dashboard.menu.trash') }}
                            </a>
                        </div>
                    </div>

                    <div
                        class="group sidebar-items {{ Request::is('tags', 'tags/create', 'tags/*/edit') ? 'active' : '' }}">
                        <i class="far fa-tags w-[50px]"></i>
                        <a href="{{ url('tags') }}"
                            class="text-[15px] w-full text-slate-700 group-hover:text-green-500 dark:text-slate-200 font-semibold">{{ trans('dashboard.menu.tags') }}</a>
                    </div>
                    <div
                        class="group sidebar-items {{ Request::is('categories', 'categories/create', 'categories/*/edit', 'categories/*') ? 'active' : '' }}">
                        <i class="far fa-bookmark w-[50px]"></i>
                        <a href="{{ url('categories') }}"
                            class="text-[15px] w-full text-slate-700 group-hover:text-green-500 dark:text-slate-200 font-semibold">
                            {{ trans('dashboard.menu.category') }}
                        </a>
                    </div>

                    {{-- Dropdown2 --}}
                    <div class="group z-20 bg-white sidebar-items cursor-pointer select-none {{ Request::is('filemanager/index', 'roles', 'roles/*') ? 'active' : '' }}"
                        onclick="dropdown2()">
                        <i class="far fa-gears w-[50px]"></i>
                        <div class="flex justify-between w-full items-center">
                            <span
                                class="text-[15px] text-slate-700 group-hover:text-green-500 dark:text-slate-200 font-semibold">
                                {{ trans('dashboard.menu.settings') }}
                            </span>
                            <span class="text-sm" id="arrow2">
                                <i class="fas fa-caret-down text-green-500"></i>
                            </span>
                        </div>
                    </div>
                    <div class="z-10 transition-all text-left text-sm mt-2 w-[90%] mx-auto px-4 py-3 bg-slate-200 dark:bg-slate-700 rounded-xl {{ Request::is('filemanager/index', 'roles', 'roles/*') ? 'block' : 'sub2' }}"
                        id="submenu2">
                        <div class="flex flex-col">
                            <a href="{{ url('posts') }}"
                                class="py-3 text-slate-700 dark:text-slate-300 hover:text-green-500">
                                {{ trans('dashboard.menu.general') }}
                            </a>
                            <a href="#" class="py-3 text-slate-700 dark:text-slate-300 hover:text-green-500">
                                {{ trans('dashboard.menu.user') }}
                            </a>
                            <a href="{{ route('roles.index') }}"
                                class="py-3 text-slate-700 dark:text-slate-300 hover:text-green-500 {{ Request::is('roles', 'roles/*') ? 'active' : '' }}">
                                {{ trans('dashboard.menu.roles') }}
                            </a>
                            <a href="{{ route('filemanager.index') }}"
                                class="py-3 text-slate-700 dark:text-slate-300 hover:text-green-500 {{ Request::is('filemanager/index') ? 'active' : '' }}">
                                {{ trans('dashboard.menu.filemanager') }}
                            </a>
                        </div>
                    </div>

                    <div class="sm:hidden group sidebar-items cursor-pointer" onclick="collaps()">
                        <i class="fas fa-circle-caret-left text-xl text-slate-300"></i>
                    </div>

                </asside>

                <div id="collapse"
                    class="invisible sm:hidden fixed top-0 bottom-0 lg:left-0 z-40 bg-white w-16 flex-col space-y-20 px-3 py-5 justify-center">
                    <p class="text-center font-normal p-2 bg-slate-200 rounded-full">C<span class="font-bold">M</span>
                    </p>
                    <div class="text-xl text-center w-full">
                        <ul class="text-slate-400 space-y-10">
                            <li>
                                <a href="{{ url('/home') }}" class="{{ Request::is('home') ? 'active' : '' }}">
                                    <i class="far fa-chart-tree-map"></i>
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
        <div id="contain" class="lg:pl-[20rem] transition-spacing max-w-8xl mx-auto lg:px-16 sm:px-6 md:px-8">
            @if (Auth::check())
                <div id="topNav"
                    class="fixed left-0 top-0 w-full z-30 flex justify-between sm:justify-end py-5 lg:pl-[20rem] lg:pr-16 sm:pr-5 transition-spacing bg-white">

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
                            <h1 class="text-xl font-bold">{{ $title }}</h1>
                            <span>-</span>
                            <p class="text-slate-500">{{ date('d M Y') }}</p>
                        </div>
                        <div class="flex items-center space-x-1">

                            <!-- Set Lang -->
                            <div>
                                <button id="dropdownDefault" data-dropdown-toggle="setlang"
                                    data-dropdown-placement="bottom"
                                    class=" font-medium rounded-full text-base px-4 py-2.5 text-center inline-flex items-center focus:bg-slate-200"
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
                                    class="z-10 hidden bg-slate-200 rounded-lg shadow w-[150px] dark:bg-slate-700">
                                    <ul class="text-base sm:text-lg text-center text-slate-700 dark:text-slate-200"
                                        aria-labelledby="dropdownDefault">
                                        <li>
                                            <a href="{{ route('localization.switch', ['language' => 'en']) }}"
                                                class="text-base block px-4 py-2 hover:bg-slate-300 hover:rounded-t-lg dark:hover:bg-slate-600 dark:hover:text-white">
                                                {{ trans('localization.en') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('localization.switch', ['language' => 'id']) }}"
                                                class="text-base block px-4 py-2 hover:bg-slate-300 dark:hover:bg-slate-600 dark:hover:text-white">
                                                {{ trans('localization.id') }}
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('localization.switch', ['language' => 'su']) }}"
                                                class="text-base block px-4 py-2 hover:bg-slate-300 hover:rounded-b-lg dark:hover:bg-slate-600 dark:hover:text-white">
                                                {{ trans('localization.su') }}
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- End Set -->
                            <div>
                                <button type="button"
                                    class="flex text-xl bg-slate-800 rounded-full md:mr-0 focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600"
                                    id="user-menu-button" aria-expanded="false" type="button"
                                    data-dropdown-toggle="mydropdown" data-dropdown-placement="left">
                                    <span class="sr-only">Open user menu</span>
                                    <i class="fad fa-user w-8 h-8 text-base pt-1 text-white"></i>
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
                                            <a href="#"
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
