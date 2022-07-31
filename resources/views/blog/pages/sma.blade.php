@extends('layouts.blog')
@section('title')
    {{ __('SMA Islam Terpadu Ciloa') }}
@endsection
@section('content')
    @include('layouts._blog._hero')
    <section class="container relative mt-20 sm:px-10 overflow-x-hidden">
        <div class="text-center lg:w-1/2 mx-auto space-y-20">

            {{-- Visi --}}
            <div class="space-y-10">
                <h1 class="uppercase">{{ __('blog.title.visi') }}</h1>
                <p>
                    Mewujudkan pesantren yang mampu menghasilkan lulusan yang dapat menguasai disiplin ilmu keislaman,
                    berakhlak
                    mulia, cerdas dalam berfikir, mandiri dan kreatif, memberi hidup dan manfaat bagi kehidupan diri dan
                    lingkungannnya.
                </p>
            </div>

            {{-- Misi --}}
            <div class="space-y-10">
                <h1 class="uppercase">{{ __('blog.title.misi') }}</h1>
                <ol class="list-decimal text-justify space-y-3">
                    <li>
                        <p>Beriman dan bertaqwa, berprestasi serta berakhlakul karimah</p>




                    </li>
                    <li>
                        <p>Mengarahkan dan mengantarkan umat memenuhi fitrahnya sebagai khairu ummah yang dapat memerankan
                            kepeloporan kemajuan dan perubahan sosial sehingga tercipta negara Indonesia sebagai Baldah
                            Thayyibah dan Rabb Ghafur.</p>
                    </li>
                    <li>
                        <p>Mengusahakan terbentuknya komunitas masyarakat yang mencerminkan nilai Islam dalam kehidupan
                            sehari-hari.</p>
                    </li>
                    <li>
                        <p>Menghidupkan semangat berislam dan menjadi suri tauladan umat.</p>
                    </li>
                    <li>
                        <p>Mencetak kader penerus perjuangan yang berkesinambungan, penggerak motor dakwah Islam.</p>
                    </li>
                </ol>
            </div>
        </div>
    </section>
@endsection
