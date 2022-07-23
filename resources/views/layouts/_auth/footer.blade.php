<div class="absolute bottom-10 inset-x-0 mx-auto">

    <div class=" divide-x divide-slate-200 flex items-center justify-center dark:divide-slate-800">

        {{-- Kiri --}}
        <div class="pr-10">
            <!-- Set Lang -->
            <div>
                <button id="dropdownDefault" data-dropdown-toggle="setlang" data-dropdown-placement="bottom"
                    class=" font-medium rounded-full text-base text-center inline-flex items-center" type="button">
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

                    <p class="ml-2 text-slate-500 uppercase">({{ app()->getLocale() }})</p>
                    <i class="fas fa-caret-down w-4 h-4 ml-2 "></i>
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
        </div>

        {{-- Kanan --}}
        <div class="pl-10">

            <!-- Dark mode switcher -->
            <button id="theme-toggle" type="button"
                class="flex items-center text-gray-500 text-2xl dark:text-gray-400">
                <p class="text-base text-slate-500 mr-5">{{ __('auth.login.theme') }}</p>
                <span id="theme-toggle-dark-icon" class="hidden">
                    <i class="fad fa-moon-cloud"></i>
                </span>
                <span id="theme-toggle-light-icon" class="hidden text-yellow-300">
                    <i class="fad fa-sun-bright"></i>
                </span>
            </button>
            <!-- Dark mode switcher end -->
        </div>
    </div>
</div>


<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Flowbite -->
<script src="{{ asset('js/flowbite.js') }}"></script>
