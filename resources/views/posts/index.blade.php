@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container space-y-7">
        <div class="flex lg:justify-between lg:items-center sm:flex-col-reverse">
            <div class="sm:w-full sm:mt-5">
                <a href="{{ route('posts.create') }}" class="mybtn">
                    <i class="fad fa-plus mr-2 -ml-1"></i>
                    {{ __('posts.index.addBtn') }}
                </a>
            </div>
            <div class="sm:w-full">
                <form class="flex items-center mb-0">
                    <label for="simple-search" class="sr-only">{{ __('posts.index.search') }}</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fad fa-magnifying-glass"></i>
                        </div>
                        <input type="text" name="keyword" value="{{ request()->get('keyword') }}" class="search-form"
                            placeholder="{{ __('posts.index.search') }}">
                    </div>
                    <button type="submit" class="search-btn"><i class="fad fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>

        <div class="flex lg:justify-between lg:items-center px-5 sm:flex-col-reverse">
            <div class="sm:mt-5">
                <form action="" method="GET" class="flex mb-0 items-center">
                    <label class="mr-3 text-slate-400">Status :</label>
                    <select name="status"
                        class="border-0 border-b border-slate-200 text-gray-900 text-sm py-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white focus:ring-0"
                        onchange='if(this.value != 0) { this.form.submit(); }'>
                        @foreach ($statuses as $value => $label)
                            <option value="{{ $value }}" {{ $statusSelected == $value ? 'selected' : null }}>
                                {{ $label }}</option>
                        @endforeach
                    </select>
                </form>
            </div>

        </div>

        <div
            class="relative overflow-x-auto shadow-lg shadow-slate-300/50 sm:rounded-lg rounded-3xl border border-slate-200">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-slate-500 dark:bg-gray-700 border-b border-slate-200 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 w-[30rem]">
                            {{ __('posts.index.table.title') }}
                        </th>
                        <th scope="col" class="px-6 sm:px-3 py-3">
                            {{ __('posts.index.table.author') }}
                        </th>
                        <th scope="col" class="px-6 sm:px-3 py-3">
                            {{ __('posts.index.table.date') }}
                        </th>
                        <th scope="col" class="px-6 py-3 w-28">
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($posts as $post)
                        <tr
                            class=" dark:bg-gray-800 odd:bg-white even:bg-gray-100/50 odd:dark:bg-gray-800 even:dark:bg-gray-700">
                            <th scope="row"
                                class="px-6 py-6 font-medium text-gray-700 dark:text-white whitespace-nowrap">
                                <h4 class="text-lg">{{ $post->title }}</h4>
                                <p class="text-slate-500">{{ $post->desc }}</p>
                            </th>
                            <td class="px-6 py-6 text-gray-600 font-medium">
                                {{ $post->user_id = Auth::user()->name }}
                            </td>
                            <td class="px-6 py-6 text-gray-600 font-medium">
                                {{ $post->created_at->format('d M Y - h:i') }}
                            </td>
                            <td class="px-6 py-6 text-right">
                                <div class="flex space-x-3 justify-end items-center">
                                    <a href="{{ route('posts.show', ['post' => $post]) }}"
                                        class="font-medium text-green-500 hover:underline p-2 hover:bg-slate-200 rounded-xl">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('posts.edit', ['post' => $post]) }}"
                                        class="font-medium text-orange-400 hover:underline p-2 hover:bg-slate-200 rounded-xl">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form class="inline m-0" action="{{ route('posts.destroy', ['post' => $post]) }}"
                                        role="alert" method="POST" alert-title="{{ __('posts.alert.delete.title') }}"
                                        alert-text="{!! __('posts.alert.delete.message.confirm', ['title' => $post->title]) !!}"
                                        alert-btn-yes="{{ __('posts.alert.btn.confirm') }}"
                                        alert-btn-cancel="{{ __('posts.alert.btn.cancel') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-slate-200 rounded-xl text-red-500">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <p class="text-center py-7">
                            @if (request()->get('keyword'))
                                {{ __('posts.search.null', ['keyword' => request()->get('keyword')]) }}
                            @else
                                {{ __('posts.index.null') }}
                            @endif
                        </p>
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
