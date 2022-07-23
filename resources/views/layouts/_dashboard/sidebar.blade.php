{{-- Layout Sidebar 

    Blog Ponpes ciloa
    Creator : Wildan Maulana

    >Main menu / Sidebar Items --}}

<div id="hamburger"
    class="z-40 fixed text-slate-800 dark:text-slate-500 text-2xl top-8 left-7 peer transition cursor-pointer hidden sm:block"
    onclick="Open()">
    <p><i class="fad fa-bars-staggered"></i></p>
</div>
<div class="overlay hidden" onclick="Close()"></div>
<asside
    class="sidebar sm:shadow-2xl fixed top-0 bottom-0 lg:left-0 lg:transform-none transform -translate-x-96 pb-5 px-5 w-[250px] sm:w-[300px] bg-white dark:bg-slate-900 peer-focus:left-0 peer:transition-all ease-out duration-300 rounded-r-3xl shadow-xl shadow-slate-200 dark:shadow-black/30">


    <div class="head w-full text-slate-700 text-xl mb-10 sticky top-3 z-50 bg-white dark:bg-slate-900 ">
        <div class="relative p-2.5 pt-5 flex flex-col items-center">
            <img src="{{ asset('images/logo.png') }}" class="w-13 h-10" alt="logo">
            <h4 class="font-bold dark:text-slate-200 ml-3 mt-5 sm:text-[15px]">
                <span class="font-normal">Ciloa</span>Media
            </h4>
            <div class="absolute top-3 right-3">
                <i class="fa fa-xmark text-slate-300 active:text-emerald-500 lg:hidden" onclick="Close()"></i>
            </div>
        </div>
    </div>

    {{-- Sidebar Item --}}

    {{-- Dashboard --}}
    <div>
        <div class="group sidebar-items {{ Request::is('dashboard') ? 'active' : '' }}">
            <i class="far fa-objects-column w-[50px]"></i>
            <a href="{{ url('dashboard') }}" class="w-full  group-hover:text-emerald-500 ">
                {{ trans('dashboard.menu.dashboard') }}
            </a>
        </div>

        {{-- Post --}}
        @can('manage_posts')
            <div class="drop group z-20 bg-white drak:focus:bg-slate-700 dark:bg-slate-800 sidebar-items cursor-pointer select-none {{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'active' : '' }}"
                onclick="dropdown()">
                <i class="far fa-file-lines w-[50px]"></i>
                <div class="flex justify-between w-full items-center">
                    <span class=" group-hover:text-emerald-500 ">{{ trans('dashboard.menu.post') }}</span>
                    <span class="text-sm" id="arrow">
                        <i class="fas fa-caret-down text-emerald-500"></i>
                    </span>
                </div>
            </div>

            <div class="z-10 transition-all text-left text-sm mt-2 w-[90%] mx-auto px-4 py-3 bg-gray-100 dark:bg-slate-800 rounded-xl {{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'visible' : 'sub' }}"
                id="submenu">
                <div class="flex flex-col">
                    <a href="{{ url('posts') }}"
                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('posts', 'posts/create', 'posts/*') ? 'active' : '' }}">
                        {{ trans('dashboard.menu.data') }}
                    </a>
                    <a href="{{ url('posts?status=draft') }}"
                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500">
                        {{ trans('dashboard.menu.trash') }}
                    </a>
                </div>
            </div>
        @endcan

        {{-- Tags --}}
        @can('manage_tags')
            <div class="group sidebar-items {{ Request::is('tags', 'tags/create', 'tags/*/edit') ? 'active' : '' }}">
                <i class="far fa-tags w-[50px]"></i>
                <a href="{{ url('tags') }}"
                    class="w-full  group-hover:text-emerald-500 ">{{ trans('dashboard.menu.tags') }}</a>
            </div>
        @endcan

        {{-- Categories --}}
        @can('manage_categories')
            <div
                class="group sidebar-items {{ Request::is('categories', 'categories/create', 'categories/*/edit', 'categories/*') ? 'active' : '' }}">
                <i class="far fa-bookmark w-[50px]"></i>
                <a href="{{ url('categories') }}" class="w-full  group-hover:text-emerald-500 ">
                    {{ trans('dashboard.menu.category') }}
                </a>
            </div>
        @endcan



        {{-- Settings --}}
        <div class="drop group z-20 bg-white dark:bg-slate-800 sidebar-items cursor-pointer select-none {{ Request::is('settings/general', 'filemanager/index', 'roles', 'roles/*', 'users', 'users/create') ? 'active' : '' }}"
            onclick="dropdown2()">
            <i class="far fa-gears w-[50px]"></i>
            <div class="flex justify-between w-full items-center">
                <span class=" group-hover:text-emerald-500 ">
                    {{ trans('dashboard.menu.settings') }}
                </span>
                <span class="text-sm" id="arrow2">
                    <i class="fas fa-caret-down text-emerald-500"></i>
                </span>
            </div>
        </div>

        <div class="z-10 transition-all text-left text-sm mt-2 w-[90%] mx-auto px-4 py-3 bg-gray-100 dark:bg-slate-800 rounded-xl {{ Request::is('settings/general', 'filemanager/index', 'roles', 'roles/*', 'users', 'users/create') ? 'block' : 'sub2' }}"
            id="submenu2">
            <div class="flex flex-col">
                <a href="{{ url('settings/general') }}"
                    class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('settings/general') ? 'active' : '' }}">
                    {{ trans('dashboard.menu.general') }}
                </a>

                {{-- Users --}}
                @can('manage_users')
                    <a href="{{ route('users.index') }}"
                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('users', 'users/create') ? 'active' : '' }}">
                        {{ trans('dashboard.menu.user') }}
                    </a>
                @endcan

                {{-- Roles --}}
                @can('manage_roles')
                    <a href="{{ route('roles.index') }}"
                        class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('roles', 'roles/*') ? 'active' : '' }}">
                        {{ trans('dashboard.menu.roles') }}
                    </a>
                @endcan

                <a href="{{ route('filemanager.index') }}"
                    class="py-3  dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-500 {{ Request::is('filemanager/index') ? 'active' : '' }}">
                    {{ trans('dashboard.menu.filemanager') }}
                </a>

            </div>
        </div>
    </div>
    {{-- End Sidebar Item --}}

    <div
        class="head sticky bottom-0 top-full inset-x-0 mx-auto w-full bg-white dark:bg-slate-900 py-5 px-5 flex justify-end">
        <div class="sm:hidden cursor-pointer" onclick="collaps()">
            <i class="fas fa-circle-caret-left text-3xl text-slate-300"></i>
        </div>
    </div>

</asside>

@push('javascript-internal')
    <script>
        // Sidebar dropdown
        function dropdown() {
            document.querySelector("#submenu").classList.toggle('sub');
            document.querySelector("#arrow").classList.toggle('rotate-180');
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
    </script>
@endpush
