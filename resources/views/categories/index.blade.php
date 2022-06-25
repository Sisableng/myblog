@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container space-y-5">
        <div class="flex justify-between items-center sm:flex-col sm:space-y-5 sm:items-start">
            <a href="{{ 'categories/create' }}" role="button" class="mybtn">
                <i class="fad fa-plus mr-2 -ml-1"></i>
                {{ trans('categories.addBtn') }}
            </a>
            <div class="sm:w-full">
                <form class="flex items-center mb-0">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                            <i class="fad fa-magnifying-glass"></i>
                        </div>
                        <input type="text" id="simple-search" class="search-form"
                            placeholder="{{ trans('dashboard.index.search') }}" required="">
                    </div>
                    <button type="submit" class="search-btn"><i class="fad fa-magnifying-glass"></i></button>
                </form>
            </div>
        </div>

        <ul class="w-full py-2 dark:border-gray-600">
            @include('categories._category-list', [
                'categories' => $categories,
                'count' => 0,
            ])
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
