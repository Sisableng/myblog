@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body space-y-10 p-0 m-0">
                        <h1 class="font-bold text-4xl">{{ trans('dashboard.index.welcome') }}, <span
                                class="text-slate-500">{{ Auth::user()->name }}</span></h1>
                        <div>
                            <a href="https://www.youtube.com/watch?v=DY94h7VxTwQ&list=PLhG9IAaB9ArrTsTAOWNTi0D2jkLQ6vA5f&index=71&ab_channel=Ilmukita"
                                class="text-green-500" target="_blank">Hanca : 71 (Membuat detail post )</a>
                            <p class="text-red-500 hidden">Bug Search (Tags Index)</p>
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
