@extends('layouts.blog')
@section('title')
    {{ __('blog.menu.contact') }}
@endsection
@section('content')
    @include('layouts._blog._hero')
    <section class="container mt-20 sm:px-5 space-y-20">

        <div class="space-y-10">
            <h1 class="uppercase font-semibold">{{ __('blog.menu.contact') }}</h1>
            <div class="flex sm:flex-col lg:items-center sm:space-y-5 lg:divide-x divide-slate-200">
                <div class="lg:pr-10">
                    <p>No Telp</p>
                    <a href="" class="block mt-3"><i class="fa-solid fa-phone mr-3"></i>082321072859</a>
                </div>
                <div class="lg:pl-10">
                    <p>Email</p>
                    <a href="mailto:almunawwarohciloa@gmail.com" class="block mt-3"><i
                            class="fa-solid fa-envelope mr-3"></i>almunawwarohciloa@gmail.com</a>
                </div>
            </div>
        </div>

        <div class="w-full space-y-5">
            <h1 class="block mb-5 uppercase font-semibold">{{ __('Alamat') }}</h1>
            <p class="block mb-5">
                Jl.Veteran Kp.Ciloa 01/15,
                <br>
                Kec.Limbangan Timur, Garut Jawa Barat 44186
            </p>
            <a href="https://goo.gl/maps/E8YCFzjAn1QPFGrR7"
                class="inline-flex items-center py-3 px-5 rounded-full bg-slate-200 hover:bg-emerald-500 hover:text-white dark:bg-slate-800 dark:hover:bg-emerald-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 92.3 132.3">
                    <path fill="#1a73e8" d="M60.2 2.2C55.8.8 51 0 46.1 0 32 0 19.3 6.4 10.8 16.5l21.8 18.3L60.2 2.2z" />
                    <path fill="#ea4335" d="M10.8 16.5C4.1 24.5 0 34.9 0 46.1c0 8.7 1.7 15.7 4.6 22l28-33.3-21.8-18.3z" />
                    <path fill="#4285f4"
                        d="M46.2 28.5c9.8 0 17.7 7.9 17.7 17.7 0 4.3-1.6 8.3-4.2 11.4 0 0 13.9-16.6 27.5-32.7-5.6-10.8-15.3-19-27-22.7L32.6 34.8c3.3-3.8 8.1-6.3 13.6-6.3" />
                    <path fill="#fbbc04"
                        d="M46.2 63.8c-9.8 0-17.7-7.9-17.7-17.7 0-4.3 1.5-8.3 4.1-11.3l-28 33.3c4.8 10.6 12.8 19.2 21 29.9l34.1-40.5c-3.3 3.9-8.1 6.3-13.5 6.3" />
                    <path fill="#34a853"
                        d="M59.1 109.2c15.4-24.1 33.3-35 33.3-63 0-7.7-1.9-14.9-5.2-21.3L25.6 98c2.6 3.4 5.3 7.3 7.9 11.3 9.4 14.5 6.8 23.1 12.8 23.1s3.4-8.7 12.8-23.2" />
                </svg>
                {{ __('blog.link.maps') }}
            </a>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3959.7950840016756!2d107.98025481427689!3d-7.033354970861072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68cb16ee5886a9%3A0x8ce4fadb5fbaa4cb!2sPonpes%20Al%20Munawwaroh%20Ciloa!5e0!3m2!1sen!2sid!4v1659245357287!5m2!1sen!2sid"
                allowfullscreen="" loading="lazy" class="w-full h-96 overflow-hidden border-none shadow-lg rounded-3xl"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>
@endsection
