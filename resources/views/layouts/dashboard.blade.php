{{-- Head of Content 

    Blog Ponpes ciloa
    Creator : Wildan Maulana

    Copyright --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layouts._dashboard.head')

</head>

<body class="dark:bg-slate-900">
    <div id="app" class="">
        <div class="relative">
            <!-- Sidebar -->
            @include('layouts._dashboard.sidebar')
            <!-- end Sidebar -->

            <!-- miniSidebar -->
            @include('layouts._dashboard.miniSidebar')
            <!-- end miniSidebar -->
        </div>

        <div id="contain" class="lg:pl-[22rem] transition-spacing max-w-8xl mx-auto lg:px-16 sm:px-6 md:px-8">
            <!-- top nav -->
            @include('layouts._dashboard.navbar')
            <!-- end top nav -->

            <!-- content -->
            <main class="mt-28 py-4">
                @yield('content')
            </main>
            <!-- end content -->
        </div>

        <!-- footer -->
        <div>
            @include('layouts._dashboard.footer')
        </div>
    </div>
</body>

</html>
