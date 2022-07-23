@foreach ($categories as $category)
    <li
        class="relative group flex items-center w-full my-10 p-5 border border-slate-200 overflow-hidden rounded-xl hover:bg-slate-800 hover:border-emerald-400 dark:hover:border-emerald-500 dark:border-slate-700">
        <a href="{{ route('categories.show', ['category' => $category]) }}"
            class="mt-auto mb-auto group-hover:text-emerald-500 transition duration-500 ease-in-out">
            {!! str_repeat('&nbsp&nbsp&nbsp&nbsp◦&nbsp', $count) . ' ' . $category->title !!}
            <span
                class="text-emerald-500 italic text-sm opacity-0 group-hover:opacity-100 transition duration-500 ease-in-out">
                - {{ $category->created_at->format('d F Y') }}</span></a>


        <div
            class="absolute inset-y-0 right-0 p-2 px-5 flex justify-end items-center bg-slate-700 space-x-5 group-hover:bg-emerald-500">
            @can('category_detail')
                <a href="{{ route('categories.show', ['category' => $category]) }}" role="button"
                    class="text-slate-500 dark:group-hover:text-slate-100"><i class="fad fa-eye"></i></a>
            @endcan
            @can('category_update')
                <a href="{{ route('categories.edit', ['category' => $category]) }}" role="button"
                    class="text-slate-500 dark:group-hover:text-slate-100"><i class="fad fa-pen-to-square"></i></a>
            @endcan
            @can('category_delete')
                <form class="m-0" action="{{ route('categories.destroy', ['category' => $category]) }}" role="alert"
                    method="POST" alert-title="{{ __('categories.alert.delete.title') }}"
                    alert-text="{{ __('categories.alert.delete.message.confirm', ['title' => $category->title]) }}"
                    alert-btn-yes="{{ __('categories.alert.btn.confirm') }}"
                    alert-btn-cancel="{{ __('categories.alert.btn.cancel') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-slate-500 dark:group-hover:text-slate-100">
                        <i class="fad fa-trash"></i>
                    </button>
                </form>
            @endcan
        </div>


        @if ($category->descendants && !trim(request()->get('keyword')))
            @include('categories._category-list', [
                'categories' => $category->descendants,
                'count' => $count + 1,
            ])
        @endif
    </li>
@endforeach
