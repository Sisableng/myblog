<header class="fixed w-full top-0 z-50">
    <nav id="nav" class="border-slate-200 px-2 sm:px-4 py-7 transition-all duration-300 ease-in-out">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ '/' }}" class="logo flex items-center text-white text-xl">
                <img src="{{ asset('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Flowbite Logo">
                Ciloa<span class="self-center font-bold whitespace-nowrap text-white">Media</span>
            </a>

            <div class="flex md:order-2">

                <!-- Dark mode switcher -->
                <button id="theme-toggle" type="button" class="text-slate-400 text-2xl dark:text-slate-400 mr-5">
                    <span id="theme-toggle-dark-icon" class="hidden">
                        <i class="fad fa-moon-cloud"></i>
                    </span>
                    <span id="theme-toggle-light-icon" class="hidden text-yellow-300">
                        <i class="fad fa-sun-bright"></i>
                    </span>
                </button>
                <!-- Dark mode switcher end -->

                <a href=""
                    class="hidden lg:block text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-3 md:mr-0">
                    {{ __('Pendaftaran') }}
                </a>

                <!-- Hamburger -->
                <button id="hamburger"
                    class="lg:hidden text-2xl text-white px-3 py-1 focus:bg-slate-200 focus:text-slate-800 rounded-xl"
                    type="button" data-drawer-target="drawer-mobile" data-drawer-toggle="drawer-mobile"
                    data-drawer-placement="left" data-drawer-body-scrolling="false" aria-controls="drawer-mobile">
                    <i class="fa-duotone fa-bars-staggered"></i>
                </button>

            </div>

            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex flex-col mt-4 md:flex-row text-base md:space-x-8 md:mt-0 md:font-medium tracking-wider">
                    <li>
                        <a href="https://ponpesciloa.rf.gd" class="nav-item" aria-current="page"
                            target="_blank">{{ __('blog.home') }}</a>
                    </li>

                    <li>
                        <button id="profil-link" data-dropdown-toggle="profil" class="nav-dropdown">
                            {{ __('Profil') }}
                            <i class="fa-solid fa-caret-down ml-3 w-4"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="profil"
                            class="hidden z-10 w-64 font-normal bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700 dark:divide-slate-600">
                            <ul class="py-1 text-sm text-slate-700 dark:text-slate-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="nav-dropdown-item">Sejarah</a>
                                </li>
                                <li aria-labelledby="profil-link">
                                    <button id="doubleDropdownButton" data-dropdown-toggle="profil-sub"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex justify-between items-center text-base py-2 px-4 w-full hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                        {{ __('Visi dan Misi') }}
                                        <i class="fa-solid fa-caret-right w-4 h-4"></i>
                                    </button>
                                    <div id="profil-sub"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700">
                                        <ul class="py-1 text-sm text-slate-700 dark:text-slate-200"
                                            aria-labelledby="doubleDropdownButton">
                                            <li>
                                                <a href="#" class="nav-dropdown-item">
                                                    {{ __('Pesantren') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="nav-dropdown-item">
                                                    {{ __('Mts Ciloa') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#" class="nav-dropdown-item">
                                                    {{ __('SMA IT Ciloa') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            <div class="py-1">
                                <a href="#"
                                    class="block py-2 px-4 text-slate-700 hover:bg-slate-100 dark:hover:bg-slate-600 dark:text-slate-400 dark:hover:text-white text-base">
                                    {{ __('Badan Otonom') }}
                                </a>
                            </div>
                        </div>
                    </li>

                    <li>
                        <button id="study-link" data-dropdown-toggle="study" class="nav-dropdown">
                            {{ __('Pendidikan Formal') }}
                            <i class="fa-solid fa-caret-down ml-3 w-4"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="study"
                            class="hidden z-10 w-64 font-normal bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700 dark:divide-slate-600">
                            <ul class="py-1 text-slate-700 dark:text-slate-400" aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="#" class="nav-dropdown-item">{{ __('MTS Ciloa') }}</a>
                                </li>
                                <li>
                                    <a href="#" class="nav-dropdown-item">{{ __('SMA IT Ciloa') }}</a>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="#" class="nav-item">
                            {{ __('Kontak') }}
                        </a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
</header>

<!-- drawer component -->

<div id="drawer-mobile"
    class="lg:hidden z-50 overflow-y-auto fixed p-4 w-80 h-screen bg-white dark:bg-slate-800 transition-transform left-0 top-0"
    tabindex="-1" aria-labelledby="mobile-menu-label">
    <h5 id="mobile-menu-label" class="text-base font-semibold text-slate-500 uppercase dark:text-slate-400">Menu
    </h5>
    <button type="button" data-drawer-dismiss="drawer-mobile" aria-controls="drawer-mobile"
        class="text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 absolute top-2.5 right-2.5 inline-flex items-center dark:hover:bg-slate-600 dark:hover:text-white">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div class="overflow-y-auto py-4">
        <ul class="space-y-2">
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg aria-hidden="true"
                        class="w-6 h-6 text-slate-500 transition duration-75 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                    <span class="ml-3">Dashboard</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center p-2 w-full text-base font-normal text-slate-900 rounded-lg transition-all duration-75 group hover:bg-slate-100 dark:text-white dark:hover:bg-slate-700"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-slate-500 transition duration-75 group-hover:text-slate-900 dark:text-slate-400 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">E-commerce</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2 transition-all left-0 top-0">
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-slate-900 rounded-lg transition duration-75 group hover:bg-slate-100 dark:text-white dark:hover:bg-slate-700">Products</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-slate-900 rounded-lg transition duration-75 group hover:bg-slate-100 dark:text-white dark:hover:bg-slate-700">Billing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal text-slate-900 rounded-lg transition duration-75 group hover:bg-slate-100 dark:text-white dark:hover:bg-slate-700">Invoice</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-slate-500 transition duration-75 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Kanban</span>
                    <span
                        class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium text-slate-800 bg-slate-200 rounded-full dark:bg-slate-700 dark:text-slate-300">Pro</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-slate-500 transition duration-75 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                        </path>
                        <path
                            d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                        </path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Inbox</span>
                    <span
                        class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-slate-500 transition duration-75 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-slate-500 transition duration-75 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Products</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-slate-500 transition duration-75 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Sign In</span>
                </a>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal text-slate-900 rounded-lg dark:text-white hover:bg-slate-100 dark:hover:bg-slate-700">
                    <svg aria-hidden="true"
                        class="flex-shrink-0 w-6 h-6 text-slate-500 transition duration-75 dark:text-slate-400 group-hover:text-slate-900 dark:group-hover:text-white"
                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Sign Up</span>
                </a>
            </li>
        </ul>
    </div>
</div>
