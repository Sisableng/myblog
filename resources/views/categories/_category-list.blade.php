@foreach ($categories as $category)
    <li
        class="group flex items-center justify-between w-full px-4 py-10 border-b border-b-slate-200 hover:border-b-green-400 dark:border-b-gray-600">
        <a href="{{ route('categories.show', ['category' => $category]) }}"
            class="mt-auto mb-auto group-hover:text-green-500 transition duration-500 ease-in-out">{{ str_repeat('•', $count) . ' ' . $category->title }}
            <span
                class="text-green-500 italic text-sm opacity-0 group-hover:opacity-100 transition duration-500 ease-in-out">
                - {{ $category->created_at->format('d F Y') }}</span></a>
        <div class="space-x-5 sm:hidden md:block">
            <a href="{{ route('categories.show', ['category' => $category]) }}" role="button"
                class="text-slate-500 hover:text-green-600"><i class="fad fa-eye"></i></a>
            <a href="{{ route('categories.edit', ['category' => $category]) }}" role="button"
                class="text-slate-500 hover:text-amber-500"><i class="fad fa-pen-to-square"></i></a>

            <form class="inline" action="{{ route('categories.destroy', ['category' => $category]) }}" role="alert"
                method="POST" alert-title="{{ __('categories.alert.delete.title') }}"
                alert-text="{{ __('categories.alert.delete.message.confirm', ['title' => $category->title]) }}"
                alert-btn-yes="{{ __('categories.alert.btn.confirm') }}"
                alert-btn-cancel="{{ __('categories.alert.btn.cancel') }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-slate-500 hover:text-red-600">
                    <i class="fad fa-trash"></i>
                </button>
            </form>
        </div>

        {{-- Mobile Action --}}
        <div class="lg:hidden md:hidden">
            <button id="dropdownBottomButton" data-dropdown-toggle="dropdownBottom" data-dropdown-placement="bottom"
                class="bg-slate-200 hover:bg-slate-300 font-medium rounded-full text-sm px-4 py-2.5 text-center inline-flex items-center"
                type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>
            <!-- Dropdown menu -->
            <div id="dropdownBottom"
                class="z-10 hidden bg-slate-100 divide-y divide-gray-100 rounded shadow-lg w-36 dark:bg-gray-700">
                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownBottomButton">
                    <li>
                        <a href="{{ route('categories.show', ['category' => $category]) }}" role="button"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('categories.title.show') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('categories.edit', ['category' => $category]) }}" role="button"
                            class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ __('categories.title.update') }}</a>
                    </li>
                    <li>
                        <form class="inline" action="{{ route('categories.destroy', ['category' => $category]) }}"
                            role="alert" method="POST" alert-title="{{ __('categories.alert.delete.title') }}"
                            alert-text="{{ __('categories.alert.delete.message.confirm', ['title' => $category->title]) }}"
                            alert-btn-yes="{{ __('categories.alert.btn.confirm') }}"
                            alert-btn-cancel="{{ __('categories.alert.btn.cancel') }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                {{ __('categories.alert.delete.title') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        @if ($category->descendants && !trim(request()->get('keyword')))
            @include('categories._category-list', [
                'categories' => $category->descendants,
                'count' => $count + 2,
            ])
        @endif
    </li>
@endforeach
