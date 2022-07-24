<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description')">

    {{-- Head --}}
    @include('layouts._blog._head')

</head>

<body class="antialiased dark:bg-slate-900">
    {{-- Navbar --}}
    @include('layouts._blog._navbar')

    @yield('content')
    {{-- Footer --}}
    @include('layouts._blog._footer')

    @auth
        <div class="fixed top-[35%] left-2 z-[99999] sm:top-[90%] sm:left-[20%]">
            <div id="auth-menu"
                class="hidden w-14 sm:w-auto h-auto bg-slate-200/50 dark:bg-slate-800/50 backdrop-blur shadow-xl rounded-full">
                <div
                    class="text-2xl lg:space-y-7 sm:space-x-10 px-3 py-5 sm:py-2.5 sm:px-5 w-full flex flex-col sm:flex-row justify-center items-center">

                    <div class="lg:border-b sm:border-0 border-slate-400 w-full pb-5 sm:pb-0">
                        <a href="{{ route('dashboard.index') }}" data-tooltip-target="user" data-tooltip-placement="right"
                            class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600 w-full">
                            <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->avatar }}" alt="user photo">
                        </a>

                        <div id="user" role="tooltip"
                            class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700 w-auto">
                            {{ Auth::user()->name }}
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>

                    <a href="{{ route('posts.index') }}" data-tooltip-target="post" data-tooltip-placement="right">
                        <i class="fa-solid fa-file-plus"></i>
                    </a>

                    <div id="post" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700 w-full">
                        Post
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <a href="{{ route('dashboard.index') }}" data-tooltip-target="settings" data-tooltip-placement="right">
                        <i class="fas fa-cog"></i>
                    </a>

                    <div id="settings" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                        Dashboard
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                    <a href="" data-tooltip-target="refresh" data-tooltip-placement="right">
                        <i class="fa-solid fa-arrows-rotate"></i>
                    </a>

                    <div id="refresh" role="tooltip"
                        class="inline-block absolute invisible z-10 py-2 px-3 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 transition-opacity duration-300 tooltip dark:bg-gray-700">
                        Refresh
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                </div>
            </div>
        </div>

        <div class="fixed bottom-5 left-2">
            <div class="cursor-pointer" onclick="authMenu()">
                Open
            </div>
        </div>
    @endauth

</body>

</html>
