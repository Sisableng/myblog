@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        @forelse ($users as $user)
            <p>{{ $user->name }}</p>
            <p>{{ $user->email }}</p>
            <p>{{ $user->roles->first()->name }}</p>
        @empty
            <p>No Data</p>
        @endforelse
    </div>
@endsection
