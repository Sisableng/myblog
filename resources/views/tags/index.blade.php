@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container space-y-7 mb-5">
        <div class="flex justify-between items-center sm:flex-col sm:space-y-5 sm:items-start">

            {{-- Add --}}
            @can('tag_create')
                <a href="{{ route('tags.create') }}" role="button" class="mybtn">
                    <i class="fad fa-plus mr-2 -ml-1"></i>
                    {{ trans('tags.index.addBtn') }}
                </a>
            @endcan

            <div class="sm:w-full">
                <form action="{{ route('tags.index') }}" method="GET" class="flex items-center mb-0">
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fad fa-magnifying-glass"></i>
                        </div>
                        <input type="text" name="keyword" class="search-form"
                            placeholder="{{ trans('categories.index.search') }}" value="{{ request()->get('keyword') }}">
                    </div>
                    <button type="submit" class="search-btn"><i class="fad fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>
        <div class="">
            <ul class="w-full py-2 dark:border-slate-600">
                @if (count($tags))
                    @foreach ($tags as $tag)
                        <li
                            class="group flex items-center justify-between w-full p-5 my-10 border border-slate-200 rounded-xl hover:border-green-400 dark:hover:border-green-400 dark:border-slate-600">
                            <p class="mt-auto mb-auto group-hover:text-green-500 transition duration-500 ease-in-out">
                                {{ $tag->title }}
                                <span
                                    class="text-green-500 italic text-sm opacity-0 group-hover:opacity-100 transition duration-500 ease-in-out">
                                    - {{ $tag->created_at->format('d F Y') }}</span>
                            </p>
                            <div class="space-x-7">

                                {{-- Edit --}}
                                @can('tag_update')
                                    <a href="{{ route('tags.edit', ['tag' => $tag]) }}" role="button"
                                        class="text-slate-500 hover:text-amber-500"><i class="fad fa-pen-to-square"></i></a>
                                @endcan

                                {{-- Delete --}}
                                @can('tag_delete')
                                    <form class="inline" action="{{ route('tags.destroy', ['tag' => $tag]) }}" role="alert"
                                        method="POST" alert-title="{{ trans('tags.alert.delete.title') }}"
                                        alert-text="{{ trans('tags.alert.delete.message.confirm', ['title' => $tag->title]) }}"
                                        alert-btn-yes="{{ trans('tags.alert.btn.confirm') }}"
                                        alert-btn-cancel="{{ trans('tags.alert.btn.cancel') }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-slate-500 hover:text-red-600">
                                            <i class="fad fa-trash"></i>
                                        </button>
                                    </form>
                                @endcan

                            </div>
                        </li>
                    @endforeach
                @else
                    <p class="text-center">
                        @if (request()->get('keyword'))
                            {!! __('tags.index.empty.search', ['keyword' => request()->get('keyword')]) !!}
                        @else
                            {{ __('tags.index.empty.fetch') }}
                        @endif
                    </p>
                @endif
            </ul>
            @if ($tags->hasPages())
                <div class="flex justify-end mt-7">
                    {{ $tags->links('vendor.pagination.tailwind') }}
                </div>
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
