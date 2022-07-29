<ul class="border-l border-l-slate-200 mx-3 px-3 mt-2.5">
    @foreach ($categoryRoot as $item)
        <li>
            @if ($category->slug == $item->slug)
                {{ $item->title }}
            @else
                <a href="{{ route('blog.posts.category', ['slug' => $item->slug]) }}"
                    class="text-emerald-500 hover:text-emerald-600 dark:hover:text-emerald-600">
                    {{ $item->title }}
                </a>
            @endif
            {{-- Category Descendant --}}
            @if ($item->descendants)
                @include('blog.sub-categories', [
                    'categoryRoot' => $item->descendants,
                    'category' => $category,
                ])
            @endif
        </li>
    @endforeach
</ul>
