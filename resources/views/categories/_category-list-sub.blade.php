@foreach ($category->descendants as $items)
    <li
        class="relative group flex items-center w-[95%] my-10 ml-14 sm:ml-5 sm:my-7 p-5 sm:p-2.5 border border-slate-200 overflow-hidden rounded-xl hover:bg-gray-100 dark:hover:bg-slate-800 hover:border-emerald-400 dark:hover:border-emerald-500 dark:border-slate-700">
        <p class="mr-3 text-slate-500">{{ $loop->iteration }}.</p>
        <a href="{{ route('categories.show', ['category' => $items]) }}"
            class="mt-auto mb-auto group-hover:text-emerald-500 transition duration-500 ease-in-out">
            {!! $items->title !!}
            <span
                class="text-emerald-500 italic text-sm opacity-0 group-hover:opacity-100 transition duration-500 ease-in-out">
                - {{ $items->created_at->format('d F Y') }}</span></a>


        <div
            class="absolute inset-y-0 right-0 p-2 px-5 flex justify-end items-center bg-slate-200 dark:bg-slate-700 space-x-5 group-hover:bg-emerald-500">
            @can('category_detail')
                <a href="{{ route('categories.show', ['category' => $items]) }}" role="button"
                    class="text-slate-500 group-hover:text-white dark:group-hover:text-slate-100"><i
                        class="fad fa-eye"></i></a>
            @endcan
            @can('category_update')
                <a href="{{ route('categories.edit', ['category' => $items]) }}" role="button"
                    class="text-slate-500 group-hover:text-white dark:group-hover:text-slate-100"><i
                        class="fad fa-pen-to-square"></i></a>
            @endcan
            @can('category_delete')
                <form class="m-0" action="{{ route('categories.destroy', ['category' => $items]) }}" role="alert"
                    method="POST" alert-title="{{ __('categories.alert.delete.title') }}"
                    alert-text="{{ __('categories.alert.delete.message.confirm', ['title' => $items->title]) }}"
                    alert-btn-yes="{{ __('categories.alert.btn.confirm') }}"
                    alert-btn-cancel="{{ __('categories.alert.btn.cancel') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-slate-500 group-hover:text-white dark:group-hover:text-slate-100">
                        <i class="fad fa-trash"></i>
                    </button>
                </form>
            @endcan
        </div>
    </li>
@endforeach
