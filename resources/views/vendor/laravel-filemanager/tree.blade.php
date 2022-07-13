<div class="m-3 d-block d-lg-none border-bottom">
    <h1 style="font-size: 1.5rem;">File Manager</h1>
    <div class="row mt-3">
        <div class="col-4">
            {{-- <img src="{{ asset('vendor/laravel-filemanager/img/152px color.png') }}" class="w-100"> --}}
            <i class="fad fa-folder-heart fs-lg w-100"></i>
        </div>

        <div class="col-8">
            <p>Current usage :</p>
            <p>20 GB (Max : 1 TB)</p>
        </div>
    </div>
    <div class="progress mt-3" style="height: .5rem;">
        <div class="progress-bar progress-bar-striped progress-bar-animated w-75 bg-warning" role="progressbar"
            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>

<ul class="nav nav-pills flex-column">
    @foreach ($root_folders as $root_folder)
        <li class="nav-item">
            <a class="nav-link" href="#" data-type="0" data-path="{{ $root_folder->url }}">
                <i class="me-3 fas fa-folders fa-fw"></i> {{ $root_folder->name }}
            </a>
        </li>
        @foreach ($root_folder->children as $directory)
            <li class="nav-item sub-item">
                <a class="nav-link" href="#" data-type="0" data-path="{{ $directory->url }}">
                    <i class="me-3 fas fa-folders fa-fw"></i> {{ $directory->name }}
                </a>
            </li>
        @endforeach
    @endforeach
</ul>
