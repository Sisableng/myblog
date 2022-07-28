{{-- Layout Navbar 

    Blog Ponpes ciloa
    Creator : Wildan Maulana

    >Fixed Top Navigation Bar --}}

<div id="topNav"
    class="fixed left-0 top-0 w-full z-30 flex justify-between sm:justify-end py-5 lg:pl-[22rem] lg:pr-16 sm:pr-5 transition-spacing bg-white dark:bg-slate-900">

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
            <button id="dropdownDefault" data-dropdown-toggle="setlang" data-dropdown-placement="bottom"
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
            <div id="setlang" class="z-10 hidden bg-gray-100 rounded-lg shadow-xl w-[150px] dark:bg-slate-700">
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


        {{-- User Info --}}
        <div>
            <button type="button"
                class="flex text-xl bg-slate-800 rounded-full md:mr-0 ring-4 ring-slate-300 dark:ring-slate-700 focus:ring-emerald-500 focus:ring-4 dark:focus:ring-slate-600"
                id="user-menu-button" aria-expanded="false" type="button" data-dropdown-toggle="mydropdown"
                data-dropdown-placement="left">
                <span class="sr-only">Open user menu</span>
                <img src="{{ Auth::user()->avatar }}" class="w-8 h-8 rounded-full" alt="">
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 text-base list-none bg-slate-200 rounded-lg divide-y divide-slate-300 shadow dark:bg-slate-700 dark:divide-slate-600"
                id="mydropdown">
                <div class="py-3 px-4">
                    <span class="block text-sm text-slate-900 dark:text-white">{{ Auth::user()->name }}</span>
                    <span class="block text-sm text-slate-500 mb-3">{{ Auth::user()->roles->first()->name }}</span>
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

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>

@push('javascript-internal')
    <script>
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
@endpush
