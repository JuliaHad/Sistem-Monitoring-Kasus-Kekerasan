@extends('layouts.user')

@section('content')

<div class="min-h-screen bg-slate-100 p-4 md:p-5">

    <div class="w-full space-y-6">

        {{-- =========================================================
             HEADER
        ========================================================== --}}

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    overflow-hidden">

            <div class="px-6 py-5
                        bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-gauge-high
                                  text-blue-600
                                  text-lg"></i>

                    </div>

                    <div>

                        <h1 class="text-2xl md:text-3xl
                                   font-bold
                                   text-slate-800">

                            Dashboard User

                        </h1>

                        <p class="text-sm text-slate-500 mt-1">

                            Selamat datang di Sistem Monitoring P3AKB

                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             STATISTIK LAPORAN USER
        ========================================================== --}}

        <div class="grid grid-cols-1
                    sm:grid-cols-2
                    xl:grid-cols-4
                    gap-5">


            {{-- TOTAL LAPORAN --}}

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        p-5
                        border-l-4
                        border-l-blue-600">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Total Laporan Saya
                        </p>

                        <p class="text-3xl font-bold
                                  text-blue-600 mt-2">

                            {{ $totalLaporan }}

                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Seluruh laporan yang Anda kirim
                        </p>

                    </div>

                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-file-lines
                                  text-blue-600"></i>

                    </div>

                </div>

            </div>


            {{-- MENUNGGU --}}

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        p-5
                        border-l-4
                        border-l-yellow-500">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Menunggu
                        </p>

                        <p class="text-3xl font-bold
                                  text-yellow-600 mt-2">

                            {{ $menunggu }}

                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Menunggu proses verifikasi
                        </p>

                    </div>

                    <div class="w-11 h-11
                                rounded-xl
                                bg-yellow-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-clock
                                  text-yellow-600"></i>

                    </div>

                </div>

            </div>


            {{-- DIVERIFIKASI --}}

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        p-5
                        border-l-4
                        border-l-blue-600">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Diverifikasi
                        </p>

                        <p class="text-3xl font-bold
                                  text-blue-600 mt-2">

                            {{ $diverifikasi }}

                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Laporan telah diverifikasi
                        </p>

                    </div>

                    <div class="w-11 h-11
                                rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-circle-check
                                  text-blue-600"></i>

                    </div>

                </div>

            </div>


            {{-- DITOLAK --}}

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        p-5
                        border-l-4
                        border-l-slate-500">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-sm text-slate-500">
                            Ditolak
                        </p>

                        <p class="text-3xl font-bold
                                  text-slate-700 mt-2">

                            {{ $ditolak }}

                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Laporan yang ditolak
                        </p>

                    </div>

                    <div class="w-11 h-11
                                rounded-xl
                                bg-slate-200
                                flex items-center justify-center">

                        <i class="fa-solid fa-circle-xmark
                                  text-slate-600"></i>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             LAPORAN TERBARU
        ========================================================== --}}

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    overflow-hidden">

            <div class="px-6 py-5
                        bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-file-circle-check
                                  text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Laporan Terbaru Saya
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Daftar laporan terbaru yang Anda kirim.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-4 md:p-5">

                <div class="overflow-x-auto
                            rounded-xl
                            border border-slate-200">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="text-left
                                           px-5 py-3
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500">

                                    Nama Pelapor

                                </th>

                                <th class="text-left
                                           px-5 py-3
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500">

                                    Deskripsi

                                </th>

                                <th class="text-left
                                           px-5 py-3
                                           text-xs
                                           font-semibold
                                           uppercase
                                           tracking-wide
                                           text-slate-500">

                                    Status

                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-200">

                            @forelse($laporanTerbaru as $laporan)

                                <tr class="hover:bg-slate-50
                                           transition">

                                    <td class="px-5 py-4">

                                        <div class="flex items-center gap-2">

                                            <div class="w-8 h-8
                                                        rounded-lg
                                                        bg-blue-100
                                                        flex items-center
                                                        justify-center">

                                                <i class="fa-solid fa-user
                                                          text-blue-600
                                                          text-xs"></i>

                                            </div>

                                            <span class="text-sm
                                                         font-medium
                                                         text-slate-700">

                                                {{ $laporan->nama_pelapor }}

                                            </span>

                                        </div>

                                    </td>


                                    <td class="px-5 py-4">

                                        <span class="text-sm
                                                     text-slate-600">

                                            {{ $laporan->deskripsi_kejadian }}

                                        </span>

                                    </td>


                                    <td class="px-5 py-4">

                                        @if($laporan->status_verifikasi == 'Menunggu')

                                            <span class="inline-flex
                                                         items-center
                                                         gap-1.5
                                                         bg-yellow-100
                                                         text-yellow-700
                                                         px-3 py-1.5
                                                         rounded-full
                                                         text-xs
                                                         font-semibold">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-yellow-500">
                                                </span>

                                                Menunggu

                                            </span>

                                        @elseif($laporan->status_verifikasi == 'Diverifikasi')

                                            <span class="inline-flex
                                                         items-center
                                                         gap-1.5
                                                         bg-blue-100
                                                         text-blue-700
                                                         px-3 py-1.5
                                                         rounded-full
                                                         text-xs
                                                         font-semibold">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-blue-500">
                                                </span>

                                                Diverifikasi

                                            </span>

                                        @else

                                            <span class="inline-flex
                                                         items-center
                                                         gap-1.5
                                                         bg-slate-200
                                                         text-slate-700
                                                         px-3 py-1.5
                                                         rounded-full
                                                         text-xs
                                                         font-semibold">

                                                <span class="w-1.5 h-1.5
                                                             rounded-full
                                                             bg-slate-500">
                                                </span>

                                                Ditolak

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3"
                                        class="px-5 py-8
                                               text-center
                                               text-sm
                                               text-slate-500">

                                        Belum ada laporan.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- =========================================================
             TOTAL KASUS
        ========================================================== --}}

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    p-5">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Seluruh Kasus
                    </p>

                    <p class="text-3xl font-bold
                              text-blue-600 mt-2">

                        {{ $totalKasus }}

                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Total kasus yang tersedia pada sistem
                    </p>

                </div>

                <div class="w-11 h-11
                            rounded-xl
                            bg-blue-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-database
                              text-blue-600"></i>

                </div>

            </div>

        </div>


        {{-- =========================================================
             TOP 6
        ========================================================== --}}

        <div class="grid grid-cols-1
                    lg:grid-cols-3
                    gap-5">


            {{-- KABUPATEN --}}

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        overflow-hidden">

                <div class="px-5 py-4
                            bg-gradient-to-r
                            from-blue-50 to-white
                            border-b border-blue-100">

                    <h2 class="font-bold text-slate-800">
                        Top 6 Kabupaten/Kota
                    </h2>

                    <p class="text-xs text-slate-500 mt-1">
                        Berdasarkan jumlah kasus
                    </p>

                </div>

                <div class="p-3 space-y-2">

                    @forelse($kabupatenTop6 as $nama => $jumlah)

                        <div class="flex items-center
                                    justify-between
                                    gap-2
                                    bg-slate-50
                                    rounded-lg
                                    px-3 py-2.5">

                            <div class="flex items-center
                                        gap-2
                                        min-w-0">

                                <span class="w-6 h-6
                                             shrink-0
                                             rounded-full
                                             bg-blue-100
                                             text-blue-700
                                             text-xs
                                             font-bold
                                             flex items-center
                                             justify-center">

                                    {{ $loop->iteration }}

                                </span>

                                <span class="text-sm
                                             text-slate-700
                                             truncate">

                                    {{ $nama }}

                                </span>

                            </div>

                            <span class="text-sm
                                         font-bold
                                         text-blue-700
                                         shrink-0">

                                {{ $jumlah }}

                            </span>

                        </div>

                    @empty

                        <p class="text-sm text-slate-400
                                  px-2 py-3">

                            Belum ada data.

                        </p>

                    @endforelse

                </div>

            </div>


            {{-- KEKERASAN --}}

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        overflow-hidden">

                <div class="px-5 py-4
                            bg-gradient-to-r
                            from-blue-50 to-white
                            border-b border-blue-100">

                    <h2 class="font-bold text-slate-800">
                        Top 6 Bentuk Kekerasan
                    </h2>

                    <p class="text-xs text-slate-500 mt-1">
                        Berdasarkan jumlah kasus
                    </p>

                </div>

                <div class="p-3 space-y-2">

                    @forelse($kekerasanTop6 as $nama => $jumlah)

                        <div class="flex items-center
                                    justify-between
                                    gap-2
                                    bg-slate-50
                                    rounded-lg
                                    px-3 py-2.5">

                            <div class="flex items-center
                                        gap-2
                                        min-w-0">

                                <span class="w-6 h-6
                                             shrink-0
                                             rounded-full
                                             bg-blue-100
                                             text-blue-700
                                             text-xs
                                             font-bold
                                             flex items-center
                                             justify-center">

                                    {{ $loop->iteration }}

                                </span>

                                <span class="text-sm
                                             text-slate-700
                                             truncate">

                                    {{ $nama }}

                                </span>

                            </div>

                            <span class="text-sm
                                         font-bold
                                         text-blue-700
                                         shrink-0">

                                {{ $jumlah }}

                            </span>

                        </div>

                    @empty

                        <p class="text-sm text-slate-400
                                  px-2 py-3">

                            Belum ada data.

                        </p>

                    @endforelse

                </div>

            </div>


            {{-- LAYANAN --}}

            <div class="bg-white
                        rounded-2xl
                        border border-slate-200
                        shadow-sm
                        overflow-hidden">

                <div class="px-5 py-4
                            bg-gradient-to-r
                            from-blue-50 to-white
                            border-b border-blue-100">

                    <h2 class="font-bold text-slate-800">
                        Top 6 Jenis Layanan
                    </h2>

                    <p class="text-xs text-slate-500 mt-1">
                        Berdasarkan jumlah kasus
                    </p>

                </div>

                <div class="p-3 space-y-2">

                    @forelse($layananTop6 as $nama => $jumlah)

                        <div class="flex items-center
                                    justify-between
                                    gap-2
                                    bg-slate-50
                                    rounded-lg
                                    px-3 py-2.5">

                            <div class="flex items-center
                                        gap-2
                                        min-w-0">

                                <span class="w-6 h-6
                                             shrink-0
                                             rounded-full
                                             bg-blue-100
                                             text-blue-700
                                             text-xs
                                             font-bold
                                             flex items-center
                                             justify-center">

                                    {{ $loop->iteration }}

                                </span>

                                <span class="text-sm
                                             text-slate-700
                                             truncate">

                                    {{ $nama }}

                                </span>

                            </div>

                            <span class="text-sm
                                         font-bold
                                         text-blue-700
                                         shrink-0">

                                {{ $jumlah }}

                            </span>

                        </div>

                    @empty

                        <p class="text-sm text-slate-400
                                  px-2 py-3">

                            Belum ada data.

                        </p>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- =========================================================
             MENU CEPAT
        ========================================================== --}}

        <div class="bg-white
                    rounded-2xl
                    border border-slate-200
                    shadow-sm
                    overflow-hidden">

            <div class="px-6 py-5
                        bg-gradient-to-r
                        from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10
                                rounded-xl
                                bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-bolt
                                  text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Menu Cepat
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Akses cepat menuju fitur utama sistem.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-5">

                <div class="grid grid-cols-1
                            md:grid-cols-2
                            xl:grid-cols-4
                            gap-4">


                    <a href="{{ route('lapor-kasus.index') }}"
                       class="rounded-xl
                              bg-blue-600
                              hover:bg-blue-700
                              text-white
                              p-5
                              transition">

                        <i class="fa-solid fa-file-circle-plus
                                  text-xl mb-3"></i>

                        <h3 class="font-bold">
                            Lapor Kasus
                        </h3>

                        <p class="text-sm text-blue-100 mt-1">
                            Kirim laporan kasus baru.
                        </p>

                        <p class="text-xs font-semibold mt-4">
                            Buka Menu →
                        </p>

                    </a>


                    <a href="{{ route('user.kasus') }}"
                       class="rounded-xl
                              bg-indigo-600
                              hover:bg-indigo-700
                              text-white
                              p-5
                              transition">

                        <i class="fa-solid fa-folder-open
                                  text-xl mb-3"></i>

                        <h3 class="font-bold">
                            Data Kasus
                        </h3>

                        <p class="text-sm text-indigo-100 mt-1">
                            Lihat data kasus yang tersedia.
                        </p>

                        <p class="text-xs font-semibold mt-4">
                            Buka Menu →
                        </p>

                    </a>


                    <a href="{{ route('user.monitoring') }}"
                       class="rounded-xl
                              bg-blue-600
                              hover:bg-blue-700
                              text-white
                              p-5
                              transition">

                        <i class="fa-solid fa-chart-column
                                  text-xl mb-3"></i>

                        <h3 class="font-bold">
                            Monitoring
                        </h3>

                        <p class="text-sm text-blue-100 mt-1">
                            Lihat statistik dan pemantauan data.
                        </p>

                        <p class="text-xs font-semibold mt-4">
                            Buka Menu →
                        </p>

                    </a>


                    <a href="{{ route('user.analisis') }}"
                       class="rounded-xl
                              bg-slate-700
                              hover:bg-slate-800
                              text-white
                              p-5
                              transition">

                        <i class="fa-solid fa-chart-line
                                  text-xl mb-3"></i>

                        <h3 class="font-bold">
                            Analisis
                        </h3>

                        <p class="text-sm text-slate-200 mt-1">
                            Lihat analisis dan prediksi kasus.
                        </p>

                        <p class="text-xs font-semibold mt-4">
                            Buka Menu →
                        </p>

                    </a>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection