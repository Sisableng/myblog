@extends('layouts.blog')
@section('title')
    {{ __('blog.menu.history') }}
@endsection
@section('content')
    @include('layouts._blog._hero')
    <section class="container mt-20">
        <div class="grid grid-cols-6 sm:grid-cols-1 gap-10">
            <div class="lg:col-span-4 px-20 sm:px-10">

                <div class="space-y-10 mb-20">
                    <img src="https://1.bp.blogspot.com/-Cq26D0FDC-E/WHZl5sqdwII/AAAAAAAAALg/-3FloHuF69gzn7XMJOT_68YVNwa1k8jOQCLcB/s1600/Untitled-1.png"
                        alt="Logo-PPCiloa" class="mx-auto sm:w-52 sm:h-44">
                    <h1 class="text-center font-semibold uppercase sm:text-xl">Sejarah Pondok Pesantren<br>Al-Munawwaroh
                        Ciloa</h1>
                </div>

                {{-- content --}}
                <div class="text-justify leading-loose space-y-7">
                    <p class="indent-8">
                        Pondok Pesantren Ciloa Adalah Pondok Pesantren Salafiyah Yang Bergerak Dalam Kajian Ilmu Alat Yaitu
                        Nahwu Dan
                        Shorof Juga Kajian Kitab-Kitab Kuning Seperti Tafsir, Hadits, Fikih, Tauhid, Dan Lain Sebagainya.
                        Pondok
                        Pesantren Ciloa Merupakan Salahsatu <span class="font-semibold">Pesantren Tertua</span> Di Kecamatan
                        Bl. Limbangan Kabupaten
                        Garut.
                        Pesantren Ciloa
                        Berdiri Pada Tahun 1918 Oleh <span class="font-semibold">K.H. Raden Muhammad Romli.</span> Dalam
                        Sejarahnya Dari Sejak Pertama
                        Didirikan
                        Hingga
                        Sekarang, Pesantren Ciloa Mengalami Perkembangan Pasang Surut, Hal Itu Dipengaruhi Oleh Beberapa
                        Faktor
                        Diantaranya Wafatnya KH. R. Muhammad Romli Sebagai Pendiri Pada Tahun 1940-An Dan Juga Dipengaruhi
                        Situasi
                        Kondisi Perang Kemerdekaan.
                    </p>
                    <p class="indent-8">
                        Setelah Wafatnya KH. R. Muhammad Romli, Pesantren Ciloa Sempat Dipimpin Oleh Putra Tertua Beliau
                        Yaitu
                        <span class="font-semibold">KH. R.
                            Ahmad Kosasih</span> (Ajengan Memed), Juga Oleh <span class="font-semibold">KH. R.
                            Muhammad ‘Asyim</span> (Ajengan Ende) Adik Dari KH. R.
                        Ahmad
                        Kosasih.
                        Namun Hal Itu Tidak Berlangsung Lama Karena Kondisi Dan Situasi Yang Tidak Mendukung Sehubungan
                        Dengan
                        Terjadinya Perang Kemerdekaan Yang Memaksa KH. R Ahmad Kosasih Meninggalkan Pesantren Ciloa Untuk
                        Mengungsi Ke
                        Padalarang Kabupaten Bandung Sementara KH. R. Muhammad ‘Asyim Gugur Di Wilayah Majalengka Sebagai
                        Syahid
                        Dalam
                        Pertempuran Melawan Belanda Dimana Beliau Sebagai Pasukan Hizbullah Pada Tahun 1948.
                    </p>
                    <p class="indent-8">
                        Pada Tahun 1955 Pesantren Ciloa Kembali Beraktifitas Sekembalinya <span class="font-semibold">KH.
                            Raden Ahmad Jawari</span> (Ajengan
                        Momod/Mama
                        Ciloa) Yang Sebelummnya Bermukim Di Cibarusah Bekasi. Beliau Adalah Menantu Dari Pendiri Pesantren
                        Ciloa
                        (KH. R
                        Muhammad Romli). Beliau Mengasuh Pesantren Ciloa Kurang Lebih Selama Empat Puluh Tahun, Yaitu Dari
                        Tahun
                        <span class="font-semibold italic">1955</span>
                        Sampai Dengan Tahun <span class="font-semibold italic">1995</span>. Dimana Beliau Wafat Pada Usia 83
                        Tahun. Selanjutnya Pesantren Ciloa Diasuh
                        Oleh <span class="font-semibold">KH.
                            Drs Raden Agus Muhammad Sholeh</span>. Beliau Merupakan Menantu Dari Kyai Raden Aceng Kholil
                        Putra K.H.
                        Raden
                        Ahmad
                        Jawari.
                    </p>
                    <p class="indent-8">
                        Secara Administratif Pesantren Ini Bernama Pesantren Nahwu Shorof Al-Munawwaroh Ciloa, Dimana Label
                        Dan
                        Nama
                        Tersebut Sebenarnya Aspirasi Dari Para Santri Periode Awal, Karena KH. R Muhammad Romli Sebagai
                        Pendiri
                        Maupun
                        KH. R Ahmad Jawari Sebagai Pelanjut Tidak Pernah Memberikan Label Dan Nama Tersebut. Terlepas Dari
                        Semua
                        Itu,
                        Pelabelan Dan Penamaan Tersebut Perlu Di Apresiasi Dan Dihargai Sebagai Wujud Rasa Bangga Dan Rasa
                        Memiliki
                        Terhadap Pesantren Ciloa Sebagai Almamater, Juga Merupakan Hal Yang Wajar Karena Kajian Pokok Yang
                        Dipelajari Di
                        Pesantren Ciloa Adalah Bidang/Fan (Disiplin Ilmu) Nahwu Dan Shorof Dengan Kitab Pokok Antara Lain;
                        Al-
                        Jurumiyah, Al- Kaelani, Yaqulu (Nadhom Maqsud), Lamiyatul Af’al, Dan Alfiyah.
                    </p>
                    <p class="indent-8">
                        Seiring Dengan Tuntutan Zaman Dan Perubahan Mindset Masyarakat Yang Memandang Antara Pesantren Dan
                        Sekolah
                        Sama-Sama Penting Maka Pesantren Ciloa Pun Merespon Hal Itu. Pada Tahun 2002 Pesantren Ciloa
                        Menyelenggarakan
                        Lembaga Pendidikan Sekolah Setingkat <span class="font-semibold">Mts</span> Dan <span
                            class="font-semibold">SMA</span> Pada Tahun 2015. Walaupun Diselenggarakan
                        Pendidikan
                        Sekolah
                        Pesantren Ciloa Tetap Berkomitmen Untuk Mempertahankan Ke Salafiyahan-Nya, Hal Ini Sejalan Dengan
                        Suatu
                        Qaidah
                        <br>
                        <br>
                        <span class="block text-center font-semibold text-2xl">
                            المحافظه على القدمي - صليح والأخدو بالجديد
                            الأشلا.
                        </span>
                        <q class="block text-center italic">
                            Al-Muhafadhotu‘Ala Qodimi As-Solih Wal Akhdu Bil Jadidi Al-Ashlah
                        </q>
                        <br>

                        <span class="block text-center">
                            Yang Artinya:
                            <q class="block font-semibold">
                                Mempertahankan Nilai Lama Yang Baik Dan Menggali Nilai Baru Yang Lebih Baik
                            </q>
                        </span>
                    </p>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-10 sm:px-10 lg:mt-44 lg:pr-20">

                {{-- Contact --}}
                <div class="flex items-center">
                    <p class="w-full text-xl font-semibold">{{ __('blog.widget.contact_information') }}</p>
                    <div class="w-full h-1 bg-slate-200 dark:bg-slate-800 rounded-full ml-3"></div>
                </div>

                <div class="space-y-5 w-full">
                    <ul class="space-y-10">
                        <li class="">

                            <i class="fa-solid fa-phone-arrow-up-right mr-3 text-slate-500"></i>
                            <a href="" class="inline hover:text-emerald-500 dark:hover:text-emerald-500 mt-2">
                                082321072859</a>
                        </li>
                        <li class="">

                            <i class="fa-solid fa-envelope mr-3 text-slate-500"></i>
                            <a href="" class="inline hover:text-emerald-500 dark:hover:text-emerald-500 mt-2">
                                almunawwarohciloa@gmail.com</a>
                        </li>
                        <li class="">

                            <p>Alamat:</p>
                            <p class="block mt-2 text-slate-400">
                                Jl.Veteran Kp.Ciloa 01/15,
                                <br>
                                Kec.Limbangan Timur, Garut Jawa Barat
                            </p>
                            <a href="https://goo.gl/maps/E8YCFzjAn1QPFGrR7"
                                class="inline-flex items-center mt-5 px-5 py-1 max-w-max bg-slate-200 hover:bg-slate-300 dark:bg-slate-800 dark:hover:bg-slate-700 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" viewBox="0 0 92.3 132.3">
                                    <path fill="#1a73e8"
                                        d="M60.2 2.2C55.8.8 51 0 46.1 0 32 0 19.3 6.4 10.8 16.5l21.8 18.3L60.2 2.2z" />
                                    <path fill="#ea4335"
                                        d="M10.8 16.5C4.1 24.5 0 34.9 0 46.1c0 8.7 1.7 15.7 4.6 22l28-33.3-21.8-18.3z" />
                                    <path fill="#4285f4"
                                        d="M46.2 28.5c9.8 0 17.7 7.9 17.7 17.7 0 4.3-1.6 8.3-4.2 11.4 0 0 13.9-16.6 27.5-32.7-5.6-10.8-15.3-19-27-22.7L32.6 34.8c3.3-3.8 8.1-6.3 13.6-6.3" />
                                    <path fill="#fbbc04"
                                        d="M46.2 63.8c-9.8 0-17.7-7.9-17.7-17.7 0-4.3 1.5-8.3 4.1-11.3l-28 33.3c4.8 10.6 12.8 19.2 21 29.9l34.1-40.5c-3.3 3.9-8.1 6.3-13.5 6.3" />
                                    <path fill="#34a853"
                                        d="M59.1 109.2c15.4-24.1 33.3-35 33.3-63 0-7.7-1.9-14.9-5.2-21.3L25.6 98c2.6 3.4 5.3 7.3 7.9 11.3 9.4 14.5 6.8 23.1 12.8 23.1s3.4-8.7 12.8-23.2" />
                                </svg>
                                {{ __('blog.link.maps') }}
                            </a>
                        </li>
                    </ul>
                </div>
                {{-- End Contact --}}

                {{-- Social --}}
                <div class="flex items-center">
                    <p class="w-full text-xl font-semibold">{{ __('blog.widget.social') }}</p>
                    <div class="w-full h-[3px] bg-slate-200 dark:bg-slate-800 rounded-full ml-2"></div>
                </div>

                <div>

                    <a href="https://www.facebook.com/ponpesciloa" type="button" target="_blank"
                        class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2">
                        <i class="fa-brands fa-facebook-f mr-2 w-4"></i>
                        {{ __('Ponpes Al-Munawwaroh Ciloa') }}
                    </a>
                    <a href="https://www.twitter.com/@ciloaofficial" type="button" target="_blank"
                        class="text-white bg-[#1da1f2] hover:bg-[#1da1f2]/90 focus:ring-4 focus:outline-none focus:ring-[#1da1f2]/50 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#1da1f2]/55 mr-2 mb-2">
                        <i class="fa-brands fa-twitter mr-2 w-4"></i>
                        {{ __('@ciloaofficial') }}
                    </a>
                    <a href="https://www.instagram.com/ponpesciloa" type="button" target="_blank"
                        class="text-white bg-pink-600 hover:bg-pink-700 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                        <i class="fa-brands fa-instagram mr-2 w-4"></i>
                        {{ __('@ponpesciloa') }}
                    </a>
                    <a href="https://www.youtube.com/channel/UCLEHgekn5pRv7ZWKveFoXzw/channels" type="button"
                        target="_blank"
                        class="text-white bg-rose-600 hover:bg-rose-700 font-medium rounded-full text-sm px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2">
                        <i class="fa-brands fa-youtube mr-2 w-4"></i>
                        {{ __('Ciloa Official') }}
                    </a>

                </div>
                {{-- End Social --}}

                {{-- Share --}}
                <div class="flex items-center">
                    <p class="text-xl font-semibold">{{ __('blog.link.share') }}</p>
                    <div class="w-full h-1 bg-slate-200 dark:bg-slate-800 rounded-full ml-10"></div>
                </div>
                {{-- End Share --}}
            </div>
        </div>
    </section>
@endsection
