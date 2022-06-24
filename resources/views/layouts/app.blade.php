<!doctype html>
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
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@18657a9/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Select2 Css -->
    <link rel="stylesheet" href="{{ asset('vendor/select2/css/select2.min.css') }}">

</head>

<body>
    <div id="app" class="">
        @if (Auth::check())
        <div>
            <span class="fixed text-white text-lg top-6 left-7 cursor-pointer hidden sm:block" onclick="Open()">
                <i class="fad fa-bars-staggered px-3 py-3 bg-slate-900 rounded-full"></i>
            </span>
            <asside class="sidebar shadow-2xl fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[250px] sm:w-[300px] overflow-y-auto  overflow-x-hidden dark:bg-slate-900 sm:bg-slate-100">
                <div class="dark:text-slate-100 text-xl">
                    <div class="p-2.5 mt-1 flex items-center">
                        <img src="{{ asset('images/logo.png') }}" class="w-10 h-7" alt="logo">
                        <h1 class="font-bold dark:text-slate-200 text-2xl ml-3 sm:text-[15px]">{{ config('app.name', 'Laravel') }}</h1>
                        <i class="fa fa-xmark ml-28 lg:hidden" onclick="Close()"></i>
                    </div>
                    <div class="my-5 bg-slate-200 dark:bg-slate-800 h-[1px]"></div>
                </div>
                <div class="group sidebar-items {{ Request::is('home') ? 'active':''; }}">
                    <i class="fad fa-chart-tree-map w-[50px]"></i>
                    <a href="{{ url('home') }}" class="text-[15px] w-full text-slate-800 group-hover:text-green-500 dark:text-slate-200 font-semibold">
                        {{ trans('dashboard.menu.dashboard') }}
                    </a>
                </div>
                <div class="group sidebar-items cursor-pointer" onclick="dropdown()">
                    <i class="fad fa-file-lines w-[50px]"></i>
                    <div class="flex justify-between w-full items-center">
                        <span class="text-[15px] w-full text-slate-800 group-hover:text-green-500 focus:text-green-500 dark:text-slate-200 font-semibold">{{ trans('dashboard.menu.post') }}</span>
                        <span class="text-sm rotate-180" id="arrow">
                            <i class="fas fa-caret-down text-green-500"></i>
                        </span>
                    </div>
                </div>
                <div class="text-left text-sm mt-2 w-4/5 mx-auto flex flex-col" id="submenu">
                    <a href="" class="p-2 mt-2 text-slate-600 dark:text-slate-300">
                        {{ trans('dashboard.menu.data') }}
                    </a>
                    <a href="" class="p-2 mt-2 text-slate-600 dark:text-slate-300">
                        {{ trans('dashboard.menu.trash') }}
                    </a>
                </div>
                <div class="group sidebar-items">
                    <i class="fad fa-tags w-[50px]"></i>
                    <span class="text-[15px] w-full text-slate-800 group-hover:text-green-500 dark:text-slate-200 font-semibold">{{ trans('dashboard.menu.tags') }}</span>
                </div>
                <div class="group sidebar-items {{ Request::is(['categories', 'categories/create']) ? 'active':''; }}">
                    <i class="fas fa-bookmark w-[50px]"></i>
                    <a href="{{ url('categories') }}" class="text-[15px] w-full text-slate-800 group-hover:text-green-500 dark:text-slate-200 font-semibold">
                        {{ trans('dashboard.menu.category') }}
                    </a>
                </div>
                <div class="group sidebar-items">
                    <i class="fad fa-gears w-[50px]"></i>
                    <span class="text-[15px] w-full text-slate-800 group-hover:text-green-500 dark:text-slate-200 font-semibold">{{ trans('dashboard.menu.settings') }}</span>
                </div>
                <div class="bottom-0 absolute w-full left-3 sm:left-10 right-0 px-2">
                    <div class="group mb-5 flex items-center justify-center w-52 rounded-full bg-green-500 p-2.5 px-4 text-slate-100 duration-300 hover:text-green-300 focus:text-green-600 dark:text-white">
                        <a href="{{ '/' }}" target="_blank">
                            <i class="fad fa-arrow-up-right-from-square"></i>
                            <span class="text-[15px] ml-4 text-slate-100 group-hover:text-green-300 dark:text-slate-200 font-semibold">{{ trans('dashboard.menu.view_site') }}</span>
                        </a>
                    </div>
                </div>
            </asside>
        </div>
        @endif
        <div class="lg:pl-[20rem] max-w-8xl mx-auto lg:px-20 sm:px-6 md:px-8">
            <div class="container w-full flex justify-between sm:justify-end mt-5">


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
                        <button id="dropdownDefault" data-dropdown-toggle="setlang" data-dropdown-placement="bottom" class=" font-medium rounded-full text-base px-4 py-2.5 text-center inline-flex items-center focus:bg-slate-200" type="button">
                            @if(app()->getLocale())
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
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="setlang" class=" z-10 hidden bg-slate-100 rounded-lg shadow w-[150px] dark:bg-slate-700">
                            <ul class="text-base sm:text-lg text-center text-slate-700 dark:text-slate-200" aria-labelledby="dropdownDefault">
                                <li>
                                    <a href="{{ route('localization.switch', ['language' => 'en']) }}" class="block px-4 py-2 hover:bg-slate-200 hover:rounded-t-lg dark:hover:bg-slate-600 dark:hover:text-white">
                                        {{ trans('localization.en') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('localization.switch', ['language' => 'id']) }}" class="block px-4 py-2 hover:bg-slate-200 dark:hover:bg-slate-600 dark:hover:text-white">
                                        {{ trans('localization.id') }}
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('localization.switch', ['language' => 'su']) }}" class="block px-4 py-2 hover:bg-slate-200 hover:rounded-b-lg dark:hover:bg-slate-600 dark:hover:text-white">
                                        {{ trans('localization.su') }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Set -->
                    <div>
                        <button type="button" class="flex text-xl bg-slate-800 rounded-full md:mr-0 focus:ring-4 focus:ring-slate-300 dark:focus:ring-slate-600" id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="mydropdown" data-dropdown-placement="left">
                            <span class="sr-only">Open user menu</span>
                            <i class="fad fa-user w-8 h-8 text-base pt-1 text-white"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div class="hidden z-50 my-4 text-base list-none bg-slate-100 rounded-lg divide-y divide-slate-200 shadow dark:bg-slate-700 dark:divide-slate-600" id="mydropdown">
                            <div class="py-3 px-4">
                                <span class="block text-sm text-slate-900 dark:text-white">{{ Auth::user()->name }}</span>
                                <span class="block text-sm font-medium text-slate-500 truncate dark:text-slate-400">{{ Auth::user()->email }}</span>
                            </div>
                            <ul class="py-1" aria-labelledby="dropdown">
                                <li>
                                    <a href="#" class="block py-2 px-4 text-sm text-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 dark:text-slate-200 dark:hover:text-white">{{ trans('dashboard.menu.settings') }}</a>
                                </li>
                                <li>
                                    <a class="block py-2 px-4 text-sm text-slate-700 hover:bg-slate-200 dark:hover:bg-slate-600 dark:text-slate-200 dark:hover:text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ trans('dashboard.menu.logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @endguest
                </div>
            </div>
            @if(Auth::check())
            <main class="mt-10 py-4">
                @yield('content')
            </main>
            @endif
        </div>
        <main class="py-4">
            @yield('auth')
        </main>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        // Sidebar app.blade.php
        function dropdown() {
            document.querySelector("#submenu").classList.toggle("hidden");
            document.querySelector("#arrow").classList.toggle("rotate-0");
        }
        dropdown();

        function Open() {
            document.querySelector(".sidebar").classList.toggle("left-[-300px]");
        }

        function Close() {
            document.querySelector(".sidebar").classList.toggle("left-[-300px]");
        }
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
                placeholder: "{{ trans('categories.create.parent-category-placeholder') }}",
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
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Flowbite -->
    <script src="{{ asset('js/flowbite.js') }}"></script>
    <!-- Select2 Js -->
    <script src="{{ asset('vendor/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/js/i18n/' . app()->getLocale() . '.js') }}"></script>
    <script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
    @include('sweetalert::alert')
</body>

</html>