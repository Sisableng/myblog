@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container space-y-5 mb-5">
        <div class="flex justify-between items-center sm:flex-col sm:space-y-5 sm:items-start">

            @can('category_create')
                <a href="{{ 'categories/create' }}" role="button" class="mybtn">
                    <i class="fad fa-plus mr-2 -ml-1"></i>
                    {{ __('categories.addBtn') }}
                </a>
            @endcan

            <div class="sm:w-full">
                <form action="{{ route('categories.index') }}" method="GET" class="flex items-center mb-0">
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fad fa-magnifying-glass"></i>
                        </div>
                        <input type="text" name="keyword" class="search-form"
                            placeholder="{{ __('categories.index.search') }}" value="{{ request()->get('keyword') }}">
                    </div>
                    <button type="submit" class="search-btn"><i class="fad fa-magnifying-glass"></i></button>

                </form>
            </div>
        </div>

        <ul class="w-full dark:text-slate-300">
            @if (count($categories))
                @include('categories._category-list', [
                    'categories' => $categories,
                    'count' => 0,
                ])
                <div class="flex justify-end mt-7">
                    {{ $categories->links('vendor.pagination.tailwind') }}
                </div>
            @else
                @if (request()->get('keyword'))
                    <p class="text-center">
                        {{ __('categories.index.empty.search', ['keyword' => request()->get('keyword')]) }}</p>
                @else
                    <p class="text-center">{{ __('categories.index.empty.fetch') }}</p>
                @endif
            @endif
        </ul>
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
