@extends('layouts.dashboard')
<title>{{ $title }}</title>
@section('content')
    <div class="container">
        <div class="grid grid-cols-3 gap-10 sm:grid-cols-1 sm:gap-4">
            @forelse ($roles as $role)
                <div
                    class="group bg-amber-400 first:bg-rose-500 last:bg-emerald-500 p-5 flex flex-col justify-between items-end relative rounded-xl h-40 hover:bg-slate-500 transition duration-300 ease-in-out overflow-hidden">
                    <div
                        class="inline-flex text-white/80 transform -translate-y-12 group-hover:transform-none transition-all ease-in-out">

                        {{-- Edit --}}
                        @can('role_update')
                            <a href="{{ route('roles.edit', ['role' => $role]) }}"
                                class="p-2 rounded-2xl hover:text-yellow-300 hover:bg-slate-600" role="button">
                                <i class="fas fa-edit"></i>
                            </a>
                        @endcan

                        {{-- Delete --}}
                        @can('role_delete')
                            <form class="mb-0" action="{{ route('roles.destroy', ['role' => $role]) }}" method="POST"
                                role="alert" alert-title="{{ __('roles.alert.delete.title') }}"
                                alert-text="{!! __('roles.alert.delete.message.confirm', ['title' => $role->name]) !!}" alert-btn-yes="{{ __('roles.alert.btn.confirm') }}"
                                alert-btn-cancel="{{ __('roles.alert.btn.cancel') }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 rounded-2xl hover:text-rose-400 hover:bg-slate-600">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        @endcan

                    </div>
                    <div class="text-right w-2/3">
                        <p class="text-sm text-white/50">{{ __('roles.index.title') }}</p>
                        <a href="{{ route('roles.show', ['role' => $role]) }}"
                            class="text-2xl text-white hover:text-white/50 transition">{{ $role->name }}</a>
                    </div>
                    <span class="absolute -bottom-1 left-5 opacity-30">
                        @if ($role->id == '1')
                            <i
                                class="fad fa-user-secret text-[120px] group-hover:text-[130px] text-slate-900 transition-all"></i>
                        @elseif ($role->id == '2')
                            <i
                                class="fad fa-user-police text-[120px] group-hover:text-[130px] text-slate-900 transition-all"></i>
                        @elseif ($role->id == '3')
                            <i
                                class="fad fa-user-pen text-[120px] group-hover:text-[130px] text-slate-900 transition-all"></i>
                        @else
                            <i
                                class="fad fa-layer-plus text-[120px] group-hover:text-[130px] text-slate-900 transition-all"></i>
                        @endif
                    </span>
                </div>
            @empty
                <p>{{ __('No data yet') }}</p>
            @endforelse
        </div>


        {{-- Add Btn --}}
        @can('role_create')
            <div class="mt-7">
                <a href="{{ route('roles.create') }}"
                    class="text-slate-500 bg-slate-200 hover:bg-slate-300 rounded-full text-sm px-5 py-2.5 text-center flex items-center float-right dark:bg-slate-600 dark:hover:bg-slate-700 dark:text-slate-300"
                    role="button">
                    <i class="fad fa-plus mr-2"></i>
                    {{ __('roles.index.addBtn') }}
                </a>
            </div>
        @endcan

    </div>
@endsection
@push('javascript-internal')
    <script>
        $(document).ready(function() {
            $("form[role='alert']").submit(function(event) {
                event.preventDefault();
                Swal.fire({
                    title: $(this).attr('alert-title'),
                    text: $(this).attr('alert-text'),
                    icon: 'question',
                    allowOutsideClick: false,
                    showCancelButton: true,
                    cancelButtonText: $(this).attr('alert-btn-cancel'),
                    reverseButtons: true,
                    confirmButtonText: $(this).attr('alert-btn-yes'),
                }).then((result) => {
                    if (result.isConfirmed) {
                        event.target.submit();
                    }
                });

            });
        })
    </script>
@endpush
