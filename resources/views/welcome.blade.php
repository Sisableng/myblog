<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro-v6@18657a9/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body class="antialiased">
    <header class="fixed w-full top-0 z-50">
        <nav id="nav" class="border-slate-200 px-2 sm:px-4 py-7 dark:bg-slate-800 transition-all duration-300 ease-in-out">
            <div class="container flex flex-wrap justify-between items-center mx-auto">
                <a href="https://flowbite.com" class="flex items-center">
                    <img src="{{ asset('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                    <span class="self-center text-xl font-light whitespace-nowrap text-white mr-2">Ciloa</span>
                    <span class="self-center text-xl font-bold whitespace-nowrap text-white">Media</span>
                </a>
                <div class="flex md:order-2">
                    <button type="button" class="hidden lg:block text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-3 md:mr-0">Get started</button>

                    <!-- Hamburger -->
                    <button data-collapse-toggle="mobile-menu-4" type="button" class="inline-flex items-center p-2 text-sm text-slate-500 rounded-lg md:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-600" aria-controls="mobile-menu-4" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                        </svg>
                        <svg class="hidden w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="mobile-menu-4">
                    <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white md:hover:bg-transparent md:border-0 md:hover:text-green-300 md:p-0 " aria-current="page">Home</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-slate-100 hover:bg-slate-50 md:hover:bg-transparent md:border-0 md:hover:text-green-300 md:p-0 md:dark:hover:text-white dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-slate-700">About</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-slate-100 hover:bg-slate-50 md:hover:bg-transparent md:border-0 md:hover:text-green-300 md:p-0 md:dark:hover:text-white dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-slate-700">Services</a>
                        </li>
                        <li>
                            <a href="#" class="block py-2 pr-4 pl-3 text-white border-b border-slate-100 hover:bg-slate-50 md:hover:bg-transparent md:border-0 md:hover:text-green-300 md:p-0 md:dark:hover:text-white dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-slate-700">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="relative h-auto bg-green-900 rounded-b-[60px]">
        <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d" class="grayscale object-cover object-top w-full h-[30rem] opacity-50 blur">
        <div class="absolute inset-x-1/2 inset-y-1/2 flex flex-col justify-center items-center">
            <h1 class="uppercase text-5xl font-bold text-slate-100">home</h1>
            <div class="mt-10 flex space-x-3 items-center">
                <p class="text-xl text-slate-300">Home</p>
                <a href="{{ 'login' }}"><i class="fad fa-arrow-right pt-1.5 text-slate-400"></i></a>
                <p class="text-xl text-slate-300">Blog</p>
            </div>
        </div>
    </div>

    <div class="container">
        <section class="mt-20">

            <div class="grid grid-cols-3 gap-10">
                <div class="col-span-2 bg-slate-200 p-5">
                    <h1 class="text-3xl uppercase font-semibold">Popular Post</h1>
                    <div class="mt-10 bg-slate-300 h-10 text-center">Post Content</div>
                </div>
                <div class="bg-slate-200 p-5">Sidebar
                    <div class="mt-10 bg-slate-300 h-10 text-center">widget</div>
                </div>
            </div>
            <div class="mt-20 bg-slate-200 p-5">
                <h1 class="text-3xl uppercase font-semibold">Berita terbaru</h1>
                <div class="mt-10 bg-slate-300 h-10 text-center">Post Content</div>
                <div class="h-10 bg-slate-400 w-28 mx-auto mt-10 text-center">Paginate</div>
            </div>
        </section>
        <section class=""></section>

        <footer class="py-5 flex justify-between mt-10">
            <div class="text-slate-500">
                © {{ date('Y') }} <span class="text-green-500">Ciloa Media</span>, All right reserved.
            </div>
            <div class="space-x-5">
                <a href="">fb</a>
                <a href="">ig</a>
                <a href="">yt</a>
            </div>
        </footer>
    </div>

    <script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript">
        window.onscroll = function() {
            const header = document.querySelector("header");
            const nav = document.querySelector("#nav");
            const fixedNav = header.offsetTop;

            if (window.pageYOffset > fixedNav) {
                header.classList.add("navbar-fixed");
                nav.classList.add("py-4");
                nav.classList.remove("py-7");
            } else {
                header.classList.remove("navbar-fixed");
                nav.classList.remove("py-4");
                nav.classList.add("py-7");
            }
        };
    </script>
</body>

</html>