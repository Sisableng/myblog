@foreach ($categories as $category)
    <li class="flex items-center my-1">
        @if (old('category') && in_array($category->id, old('category')))
            <input class="form-check" value="{{ $category->id }}" type="checkbox" name="category[]" checked>
        @else
            <input class="form-check" value="{{ $category->id }}" type="checkbox" name="category[]">
        @endif
        <label class="form-check-label">{!! str_repeat('&nbsp;', $count) . ' ' . $category->title !!}</label>
        @if ($category->descendants)
            @include('posts._category-list', [
                'categories' => $category->descendants,
                'count' => $count + 2,
            ])
        @endif
    </li>
@endforeach
