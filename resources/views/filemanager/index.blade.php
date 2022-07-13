@extends('layouts.app')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <!-- content -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="flex justify-start px-5">
                        <form action="" method="GET">
                            <div class="input-group">
                                <label class="text-slate-500">Type :</label>
                                <select name="type"
                                    class="border-0 border-b border-slate-200 text-gray-900 py-2.5 dark:bg-gray-700 dark:placeholder-gray-400 dark:text-white focus:ring-0"
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
