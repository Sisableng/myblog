@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <!-- content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">

                    <div class="flex justify-start pl-5">
                        <form class="w-full" action="" method="GET">
                            <div class="flex items-center space-x-10">
                                <label for="type" class="text-slate-500">Type :</label>
                                <select name="type" id="type"
                                    class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 w-48 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    onchange='if(this.value != 0) { this.form.submit(); }'>
                                    @foreach ($types as $value => $label)
                                        <option value="{{ $value }}"
                                            {{ $typeSelected == $value ? 'selected' : null }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="card-body">
                        <iframe src="{{ route('unisharp.lfm.show') }}?type={{ $typeSelected }}"
                            class="w-full h-[600px] overflow-hidden border-none shadow-lg rounded-3xl"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
