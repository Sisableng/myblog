@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <div class="grid grid-cols-3 gap-10 sm:grid-cols-1 sm:gap-4">
            @forelse ($roles as $role)
                <div
                    class="group bg-amber-400 first:bg-rose-500 last:bg-emerald-500 p-5 flex flex-col justify-between items-end relative rounded-xl h-40 hover:bg-slate-500 transition duration-300 ease-in-out">
                    <div
                        class="inline-flex text-white/80 transform -translate-y-10 invisible group-hover:transform-none group-hover:visible transition-all ease-in-out">
                        <a class="p-2 rounded-2xl hover:text-yellow-300 hover:bg-slate-600" role="button">
                            <i class="fas fa-edit"></i>
                        </a>

                        <form class="mb-0" action="" method="POST">
                            <button type="submit" class="p-2 rounded-2xl hover:text-rose-400 hover:bg-slate-600">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                    <div class="text-right w-2/3">
                        <p class="text-sm text-white/50">{{ __('roles.index.title') }}</p>
                        <a href="{{ route('roles.show', ['role' => $role]) }}"
                            class="text-2xl text-white">{{ $role->name }}</a>
                    </div>
                    <span class="absolute -bottom-1 left-5 opacity-30">
                        @if ($role->id == '1')
                            <i class="fad fa-user-secret text-[120px] group-hover:text-[130px] transition-all"></i>
                        @elseif ($role->id == '2')
                            <i class="fad fa-user-police text-[120px] group-hover:text-[130px] transition-all"></i>
                        @elseif ($role->id == '3')
                            <i class="fad fa-user-pen text-[120px] group-hover:text-[130px] transition-all"></i>
                        @endif
                    </span>
                </div>
            @empty
                <p>{{ __('No data yet') }}</p>
            @endforelse
        </div>

        <div class="mt-7">
            <a href="#"
                class="text-slate-500 bg-slate-200 hover:bg-slate-300 rounded-full text-sm px-5 py-2.5 text-center flex items-center mr-2  float-right"
                role="button">
                <i class="fad fa-plus mr-2"></i>
                {{ __('roles.index.addBtn') }}
            </a>
        </div>
    </div>
@endsection
