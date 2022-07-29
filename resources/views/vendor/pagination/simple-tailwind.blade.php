{{-- Cursor Pagination --}}

@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-300 bg-gray-100 cursor-default leading-5 rounded-full dark:text-slate-600 dark:bg-slate-800">
                {!! __('pagination.previous') !!}
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-slate-200 leading-5 rounded-full hover:text-white hover:bg-emerald-500 active:text-white transition ease-in-out duration-150 dark:bg-slate-700 dark:text-white dark:hover:bg-emerald-500">
                {!! __('pagination.previous') !!}
            </a>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next"
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium bg-slate-200 leading-5 rounded-full hover:text-white hover:bg-emerald-500 active:text-white transition ease-in-out duration-150 dark:bg-slate-700 dark:text-white dark:hover:bg-emerald-500">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span
                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-slate-300 bg-gray-100 cursor-default leading-5 rounded-full dark:text-slate-600 dark:bg-slate-800">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif
