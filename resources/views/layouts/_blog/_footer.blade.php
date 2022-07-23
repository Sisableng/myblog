<footer class="py-5 flex sm:flex-col-reverse justify-center items-center mx-auto lg:justify-between mt-10">
    <div class="text-slate-500">
        © {{ date('Y') }} <span class="text-green-500">Ciloa Media</span>, All right reserved.
    </div>
    <div class="flex items-center space-x-5">
        <!-- Set Lang -->
        <div>
            <button id="dropdownDefault" data-dropdown-toggle="setlang" data-dropdown-placement="bottom"
                class=" font-medium rounded-full text-base px-4 py-2.5 text-center inline-flex items-center focus:bg-slate-200 dark:focus:bg-slate-800 dark:text-slate-500"
                type="button">
                @if (app()->getLocale())
                @endif
                @switch(app()->getLocale())
                    @case('en')
                        <p>{{ trans('localization.en') }}</p>
                    @break

                    @case('id')
                        <p>{{ trans('localization.id') }}</p>
                    @break

                    @case('su')
                        <p>{{ trans('localization.su') }}</p>
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


        <div class="inline">
            <a href="">fb</a>
            <a href="">ig</a>
            <a href="">yt</a>
        </div>
    </div>
</footer>
<!-- Flowbite -->
<script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script type="text/javascript">
    window.onscroll = function() {
        const header = document.querySelector("header");
        const nav = document.querySelector("#nav");
        const drawer = document.querySelector("#drawer-mobile");
        const fixedNav = header.offsetTop;

        if (window.pageYOffset > fixedNav) {
            header.classList.add("navbar-fixed");
            nav.classList.add("py-4");
            nav.classList.remove("py-7");
            drawer.classList.toggle("mt-[4.4rem]");
        } else {
            header.classList.remove("navbar-fixed");
            nav.classList.remove("py-4");
            nav.classList.add("py-7");
        }
    };
</script>


{{-- Dark Mode --}}
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

<script>
    // Blog Auth Menu
    function authMenu() {
        document.querySelector("#auth-menu").classList.toggle("hidden");
    }
</script>
