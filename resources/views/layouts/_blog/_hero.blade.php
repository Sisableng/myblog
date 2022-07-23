<div class="relative bg-green-900 rounded-b-[60px] h-[30rem] overflow-hidden">
    <img src="https://c.pxhere.com/photos/65/78/mosque_sunrise_architecture_landmark_islam_muslim_tower_building-541370.jpg!d"
        class="absolute -top-20 grayscale w-full opacity-50 blur">
    <div class="absolute inset-x-1/2 inset-y-1/2 flex flex-col justify-center items-center">
        <a href="{{ '/' }}">
            <h1 class="uppercase text-5xl font-bold text-slate-100">blog</h1>
        </a>
        <div class="mt-10 flex space-x-3 items-center">
            <p class="text-xl text-slate-300">{{ __('blog.home') }}</p>
            <a href="{{ 'login' }}"><i class="fad fa-arrow-right pt-1.5 text-slate-400"></i></a>
            <p class="text-xl text-slate-300">Blog</p>
            <div class="space-x-3 items-center {{ Request::is('category', 'tag') ? 'inline-flex' : 'hidden' }}">
                <i class="fad fa-arrow-right text-slate-400"></i>
                <p class="text-xl text-slate-300">@yield('title')</p>
            </div>
        </div>
    </div>
</div>
