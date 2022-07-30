<div class="relative bg-green-900 h-[30rem] overflow-hidden">
    <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
        class="grayscale w-full opacity-50 blur object-cover h-full">
    <div class="absolute inset-y-1/2 flex flex-col justify-center items-center w-full">
        <a href="{{ '/' }}">
            <h1 class="uppercase text-5xl font-bold text-slate-100">@yield('title')</h1>
        </a>
        <div class="mt-10 flex space-x-3 items-center">
            <p class="text-xl text-slate-300">{{ __('blog.title.home') }}</p>
            <a href="{{ 'login' }}" target="_blank"><i class="fad fa-arrow-right pt-1.5 text-slate-400"></i></a>
            <p class="text-xl text-slate-300">Blog</p>
            <div
                class="space-x-3 items-center {{ Request::is('category', 'tag', 'sejarah', 'pesantren', 'mts', 'sma', 'badan-otonom', 'contact') ? 'inline-flex' : 'hidden' }}">
                <i class="fad fa-arrow-right text-slate-400"></i>
                <p class="text-xl text-slate-300">@yield('title')</p>
            </div>
        </div>
    </div>
</div>
