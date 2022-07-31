<header class="fixed w-full top-0 z-50">
    <nav id="nav" class="border-slate-200 px-2 sm:px-4 py-7 transition-all duration-300 ease-in-out">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="{{ '/' }}" class="logo flex items-center text-white text-xl">
                <img src="{{ asset('images/logo.png') }}" class="mr-3 h-6 sm:h-9" alt="Logo">
                Ciloa<span class="font-semibold text-white">Media</span>
            </a>

            <div class="flex md:order-2">

                <!-- Dark mode switcher -->
                <button id="theme-toggle" type="button" class="text-slate-400 text-2xl dark:text-slate-400 mr-10">
                    <span id="theme-toggle-dark-icon" class="hidden">
                        <i class="fad fa-moon-cloud"></i>
                    </span>
                    <span id="theme-toggle-light-icon" class="hidden text-yellow-300 dark:text-yellow-300">
                        <i class="fad fa-cloud-sun"></i>
                    </span>
                </button>
                <!-- Dark mode switcher end -->

                <a href=""
                    class="hidden lg:block text-white bg-green-500 hover:bg-green-600 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-3 md:mr-0">
                    {{ __('blog.menu.register') }}
                </a>

                <!-- Hamburger -->
                <button id="hamburger" class="lg:hidden text-2xl py-1 text-white focus:text-emerald-500" type="button"
                    data-drawer-target="drawer-mobile" data-drawer-toggle="drawer-mobile" data-drawer-placement="left"
                    data-drawer-body-scrolling="false" aria-controls="drawer-mobile">
                    <i class="fa-duotone fa-bars-staggered"></i>
                </button>

            </div>

            <div class="hidden w-full md:block md:w-auto" id="navbar-multi-level">
                <ul class="flex flex-col mt-4 md:flex-row text-base md:space-x-8 md:mt-0 md:font-medium tracking-wider">
                    <li>
                        <a href="https://ponpesciloa.rf.gd" class="nav-item" aria-current="page"
                            target="_blank">{{ __('blog.menu.home') }}</a>
                    </li>

                    <li>
                        <button id="profil-link" data-dropdown-toggle="profil" class="nav-dropdown">
                            {{ __('blog.menu.profile') }}
                            <i class="fa-solid fa-caret-down ml-3 w-4"></i>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="profil"
                            class="hidden z-10 w-64 font-normal bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-800 dark:divide-slate-700">
                            <ul class="py-1 text-sm text-slate-700 dark:text-slate-400"
                                aria-labelledby="dropdownLargeButton">
                                <li>
                                    <a href="{{ route('blog.pages.sejarah') }}"
                                        class="nav-dropdown-item">{{ __('blog.menu.history') }}</a>
                                </li>
                                <li aria-labelledby="profil-link">
                                    <button id="doubleDropdownButton" data-dropdown-toggle="profil-sub"
                                        data-dropdown-placement="right-start" type="button"
                                        class="flex justify-between items-center text-base py-2 px-4 w-full hover:bg-slate-100 dark:hover:bg-slate-700 dark:hover:text-white">
                                        {{ __('Visi dan Misi') }}
                                        <i class="fa-solid fa-caret-right w-4 h-4"></i>
                                    </button>
                                    <div id="profil-sub"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-800">
                                        <ul class="py-1 text-sm text-slate-700 dark:text-slate-200"
                                            aria-labelledby="doubleDropdownButton">
                                            <li>
                                                <a href="{{ url('pesantren') }}" class="nav-dropdown-item">
                                                    {{ __('blog.menu.academic') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('mts') }}" class="nav-dropdown-item">
                                                    {{ __('Mts Ciloa') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ url('sma') }}" class="nav-dropdown-item">
                                                    {{ __('SMA IT Ciloa') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                            {{-- <div class="py-1">
                                <a href="{{ url('badan-otonom') }}"
                                    class="block py-2 px-4 text-slate-700 hover:bg-slate-100 dark:hover:bg-slate-700 dark:text-slate-400 dark:hover:text-white text-base">
                                    {{ __('Badan Otonom') }}
                                </a>
                            </div> --}}
                        </div>
                    </li>

                    <li>
                        <button id="study-link" data-dropdown-toggle="study" class="nav-dropdown">
                            {{ __('blog.menu.formal_edu') }}
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
                        <a href="{{ url('contact') }}" class="nav-item">
                            {{ __('blog.menu.contact') }}
                        </a>
                    </li>
                </ul>
            </div>


        </div>
    </nav>
</header>

<!-- drawer component -->

<div id="drawer-mobile"
    class="lg:hidden z-50 overflow-y-auto fixed p-4 py-10 w-80 h-screen bg-white dark:bg-slate-800 transition-transform left-0 top-0"
    tabindex="-1" aria-labelledby="mobile-menu-label">
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
        <ul class="space-y-5">
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal rounded-lg hover:text-emerald-500 dark:hover:text-emerald-500">
                    <span class="ml-3">{{ __('blog.menu.home') }}</span>
                </a>
            </li>
            <li>
                <button type="button"
                    class="flex items-center p-2 w-full text-base font-normal rounded-lg transition-all duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ __('blog.menu.profile') }}</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example" class="hidden py-2 space-y-2 transition-all left-0 top-0">
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('blog.menu.history') }}</a>
                    </li>
                    <li>
                        <button type="button"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition-all duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500"
                            aria-controls="dropdown-example" data-collapse-toggle="dropdown-example2">
                            <span class="flex-1 text-left whitespace-nowrap">{{ __('blog.menu.visi_misi') }}</span>
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <ul id="dropdown-example2" class="hidden py-2 space-y-2 transition-all left-0 top-0">
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-14 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('blog.menu.academic') }}</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-14 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('MTS Ciloa') }}</a>
                            </li>
                            <li>
                                <a href="#"
                                    class="flex items-center p-2 pl-14 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('SMA IT Ciloa') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('Badan Otonom') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <button type="button"
                    class="flex items-center p-2 w-full text-base font-normal rounded-lg transition-all duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500"
                    aria-controls="dropdown-example" data-collapse-toggle="dropdown-example3">
                    <span class="flex-1 ml-3 text-left whitespace-nowrap">{{ __('blog.menu.formal_edu') }}</span>
                    <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <ul id="dropdown-example3" class="hidden py-2 space-y-2 transition-all left-0 top-0">
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('blog.menu.academic') }}</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('MTS Ciloa') }}</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center p-2 pl-11 w-full text-base font-normal rounded-lg transition duration-75 group hover:text-emerald-500 dark:hover:text-emerald-500">{{ __('SMA IT Ciloa') }}</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"
                    class="flex items-center p-2 text-base font-normal rounded-lg hover:text-emerald-500 dark:hover:text-emerald-500">
                    <span class="flex-1 ml-3 whitespace-nowrap">{{ __('blog.menu.contact') }}</span>
                    <span
                        class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span>
                </a>
            </li>

        </ul>
    </div>
</div>
