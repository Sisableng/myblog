@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    {{-- Loading Screen --}}
    <section id="loading">
        <div id="loading-content"></div>
    </section>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body space-y-10 p-0 m-0">
                        <h1 class="font-bold text-4xl">{{ trans('dashboard.index.welcome') }}, <span
                                class="text-slate-500">{{ Auth::user()->name }}</span></h1>

                        <div
                            class="w-full h-auto bg-gradient-to-r from-slate-800 via-slate-700 to-rose-600 rounded-3xl p-16 sm:p-10 shadow-xl">
                            <div class="relative flex sm:flex-col sm:space-y-7 lg:justify-between lg:items-center">
                                <div class="group flex items-center space-x-7">
                                    <a href="https://www.youtube.com/watch?v=-wlYB9qX66k&list=PLhG9IAaB9ArrTsTAOWNTi0D2jkLQ6vA5f&index=95&ab_channel=Ilmukita"
                                        class="z-20 w-20 h-20 p-5 bg-slate-200 rounded-full flex justify-center items-center text-4xl group-hover:bg-rose-600 transition-colors ease-in-out duration-500 shadow-lg"
                                        target="_blank"><i
                                            class="fas fa-play group-hover:-rotate-12 group-hover:text-slate-200"></i>
                                    </a>
                                    <span class="absolute -left-5 w-16 h-16 bg-white/50 rounded-full animate-ping"></span>
                                    <p
                                        class="z-10 uppercase opacity-0 transform -translate-x-28 group-hover:transform-none group-hover:opacity-100 text-slate-200 transition-all ease-in-out duration-500">
                                        Lanjut slur</p>
                                </div>
                                <div class="text-white lg:w-1/2">
                                    <p class="lg:text-right text-xl opacity-70">Hanca : 95</p>
                                    <h1 class="lg:text-right font-bold">Menampilkan data user</h1>
                                </div>
                            </div>
                        </div>

                        <div
                            class="relative max-w-full h-auto sm:h-48 overflow-hidden bg-gradient-to-r from-amber-500 to-slate-800 p-10 rounded-3xl shadow-xl text-white">
                            <div class="flex justify-between items-center">
                                <div class="lg:w-1/2">
                                    <p class="text-white/50">Bug::</p>
                                    <p class="text-lg font-medium mt-2">Edit kategori old value <span
                                            class="font-bold">(parent
                                            kategori)</span>
                                    </p>
                                </div>
                                <div class="absolute -right-10 sm:top-16 opacity-20">
                                    <lottie-player src="https://assets10.lottiefiles.com/packages/lf20_ppfj5jxd.json"
                                        background="transparent" speed="1"
                                        class="w-[400px] h-[400px] sm:w-[200px] sm:h-[200px]" loop autoplay>
                                    </lottie-player>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="toast-top-right"
        class="absolute top-5 right-5 w-full max-w-xs p-4 text-gray-900 bg-slate-300/30 backdrop-blur rounded-lg shadow-2xl dark:bg-gray-800 z-50 dark:text-gray-300 lg:hidden"
        role="alert">
        <div class="flex items-center mb-3">
            <span class="mb-1 text-sm font-semibold text-gray-900 dark:text-white">New notification</span>
            <button type="button"
                class="ml-auto -mx-1.5 -my-1.5 text-gray-900 hover:text-green-500 p-1.5 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white"
                data-dismiss-target="#toast-top-right" aria-label="Close">
                <span class="sr-only">Close</span>
                <i class="fas fa-xmark w-5 h-5"></i>
            </button>
        </div>
        <div class="flex items-center">
            <div class="relative inline-block shrink-0">
                <img class="w-12 h-12 rounded-full"
                    src="https://www.gravatar.com/avatar/bd3bf537ce5a0c6a8bdc1e674fd39a65.jpg?s=320&d=monsterid"
                    alt="Jese Leos image">
                <span
                    class="absolute bottom-0 right-0 inline-flex items-center justify-center w-6 h-6 bg-green-500 rounded-full">
                    <i class="fas fa-message-lines w-4 h-4 text-white text-[12px] pt-[2px] pl-[2px]"></i>
            </div>
            <div class="ml-3 text-sm font-normal">
                <h4 class="text-sm font-semibold text-gray-900 dark:text-white">Admin - <span
                        class="text-slate-500 font-normal">Wildan Maulana</span></h4>
                <div class="text-sm font-normal">Disarankan Menggunakan PC/Laptop ya lur!!</div>
                <span class="text-xs font-medium text-green-500 dark:text-blue-500">a few seconds ago</span>
            </div>
        </div>
    </div>
@endsection
@push('loader')
    <script>
        function showLoading() {
            document.querySelector('#loading').classList.add('loading');
            document.querySelector('#loading-content').classList.add('loading-content');
        }

        setTimeout(function hideLoading() {
            document.querySelector('#loading').classList.remove('loading');
            document.querySelector('#loading-content').classList.remove('loading-content');
        }, 2000);
    </script>
@endpush
@push('javascript-external')
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
@endpush
