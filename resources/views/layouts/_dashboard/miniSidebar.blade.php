{{-- Layout miniSidebar 

    Blog Ponpes ciloa
    Creator : Wildan Maulana

    >Collapse Sidebar Menu --}}

<div id="collapse"
    class="invisible sm:hidden fixed top-0 bottom-0 lg:left-0 z-40 bg-white dark:bg-slate-800 w-28 flex-col space-y-20 px-3 py-5 justify-center">
    <p class="text-center font-normal p-2 bg-slate-200 dark:bg-slate-700 dark:text-slate-300 rounded-full">
        C<span class="font-bold">M</span>
    </p>
    <div class="text-xl text-center w-full">
        <ul class="text-slate-400 space-y-10">
            <li>
                <a href="{{ url('/dashboard') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="far fa-objects-column"></i>
                </a>
            </li>
            <li>
                <a href="{{ url('/posts') }}"
                    class="{{ Request::is('posts', 'posts/create', 'posts/*/edit', 'posts/*') ? 'active' : '' }}">
                    <i class="far fa-file-lines"></i>
                </a>
            </li>
            <li>
                <a href="{{ url('/tags') }}"
                    class="{{ Request::is('tags', 'tags/create', 'tags/*/edit') ? 'active' : '' }}">
                    <i class="far fa-tags"></i>
                </a>
            </li>
            <li>
                <a href="{{ url('/category') }}"
                    class="{{ Request::is('categories', 'categories/create', 'categories/*/edit', 'categories/*') ? 'active' : '' }}">
                    <i class="far fa-bookmark"></i>
                </a>
            </li>
            <li>
                <a href="{{ url('#') }}">
                    <i class="far fa-gears"></i>
                </a>
            </li>
        </ul>
    </div>
    <div class="cursor-pointer text-2xl text-center w-full" onclick="collaps()">
        <i class="fad fa-circle-play"></i>
    </div>
</div>


@push('javascript-internal')
    <script>
        // Sidebar dropdown
        function dropdown2() {
            document.querySelector("#submenu2").classList.toggle('sub2');
            document.querySelector("#arrow2").classList.toggle('rotate-180');
        }

        // Sidebar Collapse
        function collaps() {
            document.querySelector("#collapse").classList.toggle("invisible");
            document.querySelector("#contain").classList.toggle("lg:pl-[11rem]");
            document.querySelector("#topNav").classList.toggle("lg:pl-[11rem]");
            document.querySelector(".sidebar").classList.toggle("lg:transform-none");
        }


        // if set via local storage previously
        // if (localStorage.getItem('color-theme')) {
        //     if (localStorage.getItem('color-theme') === 'light') {
        //         document.documentElement.classList.add('dark');
        //         localStorage.setItem('color-theme', 'dark');
        //     } else {
        //         document.documentElement.classList.remove('dark');
        //         localStorage.setItem('color-theme', 'light');
        //     }

        // if NOT set via local storage previously
        // } else {
        //     if (document.documentElement.classList.contains('dark')) {
        //         document.documentElement.classList.remove('dark');
        //         localStorage.setItem('color-theme', 'light');
        //     } else {
        //         document.documentElement.classList.add('dark');
        //         localStorage.setItem('color-theme', 'dark');
        //     }
        // }
    </script>
@endpush
