@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
<div class="container space-y-5">
    <a href="{{ ('categories/create') }}" role="button" class="mybtn">
        <i class="fad fa-plus mr-2 -ml-1"></i>
        {{ trans('categories.addBtn') }}
    </a>
    
    <ul class="w-full py-2 dark:border-gray-600">
        @include('categories._category-list',[
            'categories' => $categories,
            'count' => 0
            ])
    </ul>
    
</div>
@endsection