@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container space-y-7">

        <div class="flex lg:justify-between lg:items-center sm:flex-col-reverse">
            <div class="sm:w-full sm:mt-5">

                {{-- Add --}}
                @can('post_create')
                    <a href="{{ route('posts.create') }}" class="mybtn">
                        <i class="fad fa-plus mr-2 -ml-1"></i>
                        {{ __('posts.index.addBtn') }}
                    </a>
                @endcan

            </div>
        </div>


        <div
            class="relative overflow-x-auto shadow-lg shadow-slate-300/50 sm:rounded-lg rounded-3xl border border-slate-200 dark:border-slate-800 dark:shadow-black/30">
            <div class="flex justify-between items-center p-5 bg-emerald-500">
                <div class="flex lg:justify-between lg:items-center px-5 sm:flex-col-reverse">
                    <div class="sm:mt-5">
                        <form action="" method="GET" class="flex mb-0 items-center">
                            <select name="status" id="status"
                                class="cursor-pointer bg-emerald-600 text-slate-100 dark:bg-slate-700 border-0 dark:text-white text-sm rounded-full w-48 p-2.5 focus:ring-0"
                                onchange='if(this.value != 0) { this.form.submit(); }'>
                                @foreach ($statuses as $value => $label)
                                    <option value="{{ $value }}" {{ $statusSelected == $value ? 'selected' : null }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>

                <div class="sm:w-full">
                    <form class="flex items-center mb-0">
                        <label for="simple-search" class="sr-only">{{ __('posts.index.search') }}</label>
                        <div class="relative w-full">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <i class="fad fa-magnifying-glass text-slate-100"></i>
                            </div>
                            <input type="text" name="keyword" value="{{ request()->get('keyword') }}"
                                class="block w-full rounded-full border-transparent bg-emerald-600 p-2.5 pl-10 text-sm text-slate-100 placeholder:text-slate-100/50 ring-transparent transition duration-500 ease-out focus:border focus:border-emerald-500 focus:ring-transparent dark:bg-slate-700 dark:text-white dark:placeholder-slate-400"
                                placeholder="{{ __('posts.index.search') }}">
                        </div>
                    </form>
                </div>
            </div>


            <table class="w-full text-sm text-left text-slate-500 dark:text-slate-400">
                <thead class="font-normal text-slate-500 bg-emerald-500">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[30rem]">
                            <p>{{ __('posts.index.table.title') }}</p>
                        </th>
                        <th scope="col" class="px-6 sm:px-3 py-3">
                            <p>{{ __('posts.index.table.author') }}</p>
                        </th>
                        <th scope="col" class="px-6 sm:px-3 py-3">
                            <p>{{ __('posts.index.table.date') }}</p>
                        </th>
                        <th scope="col" class="px-6 py-3 w-28">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr
                            class=" dark:bg-slate-800 odd:bg-white even:bg-slate-100/50 odd:dark:bg-slate-800 even:dark:bg-slate-800/60">
                            <th scope="row" class="px-6 py-6 font-medium text-slate-700 dark:text-white">
                                <div class="flex">
                                    <h4
                                        class="text-lg block overflow-hidden text-ellipsis whitespace-nowrap flex-1 w-[30rem]">
                                        {{ $post->title }}</h4>
                                </div>
                                <p class="text-slate-500">{{ $post->desc }}</p>
                            </th>
                            <td class="px-6 py-6 text-slate-500 font-medium">
                                {{-- {{ $post->user_id }} --}}

                                {{ $post->getUserName() }}

                            </td>
                            <td class="px-6 py-6 text-slate-500 font-medium">
                                {{ $post->updated_at->format('d M Y - h:i') }}
                            </td>
                            <td class="px-6 py-6 text-right">
                                <div class="flex space-x-3 justify-end items-center">

                                    {{-- Detail --}}
                                    @can('post_detail')
                                        <a href="{{ route('posts.show', ['post' => $post]) }}"
                                            class="font-medium text-slate-500 hover:text-green-500 hover:underline p-2 hover:bg-slate-200 rounded-xl dark:hover:bg-slate-700">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                    @endcan

                                    {{-- Edit --}}
                                    @can('post_update')
                                        <a href="{{ route('posts.edit', ['post' => $post]) }}"
                                            class="font-medium text-slate-500 hover:text-orange-400 hover:underline p-2 hover:bg-slate-200 rounded-xl dark:hover:bg-slate-700">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan

                                    {{-- Delete --}}
                                    @can('post_delete')
                                        <form class="inline m-0" action="{{ route('posts.destroy', ['post' => $post]) }}"
                                            role="alert" method="POST" alert-title="{{ __('posts.alert.delete.title') }}"
                                            alert-text="{!! __('posts.alert.delete.message.confirm', ['title' => $post->title]) !!}"
                                            alert-btn-yes="{{ __('posts.alert.btn.confirm') }}"
                                            alert-btn-cancel="{{ __('posts.alert.btn.cancel') }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="p-2 hover:bg-slate-200 rounded-xl text-slate-500 hover:text-red-500 dark:hover:bg-slate-700">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        @if (request()->get('keyword'))
                            <div id="toast-notif"
                                class="fixed top-10 right-10 z-[99999] flex items-center justify-between p-4 space-x-4 w-full max-w-xs text-slate-300 bg-slate-700 rounded-lg divide-slate-200 shadow dark:bg-slate-800"
                                role="alert">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-face-sad-tear text-yellow-300 pr-3 text-xl"></i>
                                    <p class="pl-4 text-sm font-normal inline-flex border-l border-slate-500">
                                        {!! __('posts.search.null', ['keyword' => request()->get('keyword')]) !!}</p>
                                </div>
                                <button type="button" class="text-slate-500" data-dismiss-target="#toast-notif"
                                    aria-label="Close">
                                    <i class="fas fa-xmark"></i>
                                </button>
                            </div>
                        @else
                            <div id="toast-notif"
                                class="fixed top-10 right-10 z-[99999] flex items-center justify-between p-4 space-x-4 w-full max-w-xs text-slate-300 bg-slate-700 rounded-lg divide-slate-200 shadow dark:bg-slate-800"
                                role="alert">
                                <div class="flex items-center">
                                    <i class="fa-solid fa-face-sad-cry text-yellow-300 pr-3 text-xl"></i>
                                    <p class="pl-4 text-sm font-normal inline-flex border-l border-slate-500">
                                        {!! __('posts.index.null') !!}</p>
                                </div>
                                <button type="button" class="text-slate-500" data-dismiss-target="#toast-notif"
                                    aria-label="Close">
                                    <i class="fas fa-xmark"></i>
                                </button>
                            </div>
                        @endif
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="flex justify-end">
            @if ($posts->hasPages())
                {{ $posts->links() }}
            @endif
        </div>
    </div>
@endsection
@push('javascript-internal')
    <script>
        $(document).ready(function() {
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'warning',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });

            });
        })
    </script>
@endpush
