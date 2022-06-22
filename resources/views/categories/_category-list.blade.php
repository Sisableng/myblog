@foreach($categories as $category)
<li class="flex items-center justify-between w-full px-4 py-10 border-b border-gray-200 dark:border-gray-600">
    <label class="mt-auto mb-auto">{{ str_repeat('•', $count) . ' ' . $category -> title }}</label>
    <div class="space-x-5">
        <a href="" role="button" class="text-slate-500 hover:text-green-600"><i class="fad fa-eye"></i></a>
        <a href="" role="button" class="text-slate-500 hover:text-amber-500"><i class="fad fa-pen-to-square"></i></a>
        <form class="inline" action="">
            <button type="submit" class="text-slate-500 hover:text-red-600">
            <i class="fad fa-trash"></i>
            </button>
        </form>
    </div>
        @if($category->descendants)
    @include('categories._category-list',[
            'categories' => $category->descendants,
            'count' => $count + 2
            ])
    @endif
</li>
@endforeach