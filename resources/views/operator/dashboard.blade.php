@extends('layouts.operator')

@section('content')

<div class="min-h-screen bg-slate-100 p-6 md:p-8">

    <div class="max-w-[1600px] mx-auto">

        {{-- =========================================================
             HEADER DASHBOARD
        ========================================================== --}}

        <div class="mb-7">

            <div class="flex items-center gap-3">

                <div class="w-11 h-11 rounded-xl bg-blue-900
                            flex items-center justify-center shadow-sm">

                    <i class="fa-solid fa-chart-line text-white text-lg"></i>

                </div>

                <div>

                    <h1 class="text-2xl md:text-3xl font-bold text-slate-800">
                        Dashboard Operator
                    </h1>

                    <p class="text-sm text-slate-500 mt-1">
                        Kelola dan pantau data kasus P3AKB secara terintegrasi.
                    </p>

                </div>

            </div>

        </div>


        {{-- =========================================================
             KARTU STATISTIK
        ========================================================== --}}

        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-5 mb-7">


            {{-- TOTAL LAPORAN --}}

            <div class="bg-white rounded-xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wide text-slate-500">

                            Total Laporan

                        </p>

                        <h2 class="text-3xl font-bold text-blue-800 mt-2">

                            {{ number_format($totalLaporan, 0, ',', '.') }}

                        </h2>

                    </div>

                    <div class="w-11 h-11 rounded-lg bg-blue-50
                                border border-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-file-lines text-blue-700"></i>

                    </div>

                </div>

                <div class="mt-4 h-1 bg-blue-700 rounded-full"></div>

            </div>


            {{-- MENUNGGU --}}

            <div class="bg-white rounded-xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wide text-slate-500">

                            Menunggu Verifikasi

                        </p>

                        <h2 class="text-3xl font-bold text-blue-800 mt-2">

                            {{ number_format($menunggu, 0, ',', '.') }}

                        </h2>

                    </div>

                    <div class="w-11 h-11 rounded-lg bg-slate-100
                                border border-slate-200
                                flex items-center justify-center">

                        <i class="fa-solid fa-clock text-slate-600"></i>

                    </div>

                </div>

                <div class="mt-4 h-1 bg-slate-300 rounded-full"></div>

            </div>


            {{-- DIVERIFIKASI --}}

            <div class="bg-white rounded-xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wide text-slate-500">

                            Diverifikasi

                        </p>

                        <h2 class="text-3xl font-bold text-blue-800 mt-2">

                            {{ number_format($diverifikasi, 0, ',', '.') }}

                        </h2>

                    </div>

                    <div class="w-11 h-11 rounded-lg bg-blue-50
                                border border-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-circle-check text-blue-700"></i>

                    </div>

                </div>

                <div class="mt-4 h-1 bg-blue-500 rounded-full"></div>

            </div>


            {{-- DITOLAK --}}

            <div class="bg-white rounded-xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wide text-slate-500">

                            Ditolak

                        </p>

                        <h2 class="text-3xl font-bold text-blue-800 mt-2">

                            {{ number_format($ditolak, 0, ',', '.') }}

                        </h2>

                    </div>

                    <div class="w-11 h-11 rounded-lg bg-slate-100
                                border border-slate-200
                                flex items-center justify-center">

                        <i class="fa-solid fa-circle-xmark text-slate-600"></i>

                    </div>

                </div>

                <div class="mt-4 h-1 bg-slate-400 rounded-full"></div>

            </div>


            {{-- TOTAL KASUS --}}

            <div class="bg-blue-900 rounded-xl border border-blue-950
                        shadow-sm p-5">

                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-xs font-semibold uppercase
                                  tracking-wide text-blue-200">

                            Total Kasus

                        </p>

                        <h2 class="text-3xl font-bold text-white mt-2">

                            {{ number_format($totalKasus, 0, ',', '.') }}

                        </h2>

                    </div>

                    <div class="w-11 h-11 rounded-lg bg-blue-800
                                border border-blue-700
                                flex items-center justify-center">

                        <i class="fa-solid fa-chart-column text-blue-100"></i>

                    </div>

                </div>

                <div class="mt-4 h-1 bg-blue-400 rounded-full"></div>

            </div>

        </div>


        {{-- =========================================================
             LAPORAN TERBARU + STATUS LAPORAN
        ========================================================== --}}

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6 mb-7">


            {{-- LAPORAN TERBARU --}}

            <div class="xl:col-span-2 bg-white rounded-xl
                        border border-slate-200 shadow-sm overflow-hidden">

                <div class="px-6 py-5 border-b border-slate-200
                            flex flex-col sm:flex-row
                            sm:items-center sm:justify-between gap-3">

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Laporan Terbaru
                        </h2>

                        <p class="text-sm text-slate-500 mt-1">
                            Lima laporan terakhir yang masuk ke sistem.
                        </p>

                    </div>

                    <a
                        href="{{ route('operator.laporan.riwayat') }}"
                        class="inline-flex items-center gap-2
                               text-sm font-semibold
                               text-blue-700 hover:text-blue-900
                               transition"
                    >

                        <i class="fa-solid fa-clock-rotate-left"></i>

                        Lihat Riwayat

                    </a>

                </div>


                <div class="overflow-x-auto">

                    <table class="w-full">

                        <thead class="bg-slate-50">

                            <tr>

                                <th class="text-left px-6 py-3
                                           text-xs font-semibold
                                           text-slate-500 uppercase">

                                    No

                                </th>

                                <th class="text-left px-6 py-3
                                           text-xs font-semibold
                                           text-slate-500 uppercase">

                                    Nama Pelapor

                                </th>

                                <th class="text-left px-6 py-3
                                           text-xs font-semibold
                                           text-slate-500 uppercase">

                                    Tahun

                                </th>

                                <th class="text-left px-6 py-3
                                           text-xs font-semibold
                                           text-slate-500 uppercase">

                                    Status

                                </th>

                            </tr>

                        </thead>


                        <tbody class="divide-y divide-slate-100">

                            @forelse($laporanTerbaru as $laporan)

                                <tr class="hover:bg-blue-50/40 transition">

                                    <td class="px-6 py-4 text-sm
                                               text-slate-500">

                                        {{ $loop->iteration }}

                                    </td>

                                    <td class="px-6 py-4">

                                        <span class="font-medium text-slate-700">

                                            {{ $laporan->nama_pelapor ?? '-' }}

                                        </span>

                                    </td>

                                    <td class="px-6 py-4 text-sm
                                               text-slate-600">

                                        {{ $laporan->tahun ?? '-' }}

                                    </td>

                                    <td class="px-6 py-4">

                                        @if($laporan->status_verifikasi === 'Diverifikasi')

                                            <span class="inline-flex items-center gap-1.5
                                                         px-3 py-1 rounded-full
                                                         text-xs font-semibold
                                                         bg-blue-50 text-blue-700
                                                         border border-blue-100">

                                                <i class="fa-solid fa-circle-check text-[10px]"></i>

                                                Diverifikasi

                                            </span>

                                        @elseif($laporan->status_verifikasi === 'Ditolak')

                                            <span class="inline-flex items-center gap-1.5
                                                         px-3 py-1 rounded-full
                                                         text-xs font-semibold
                                                         bg-slate-100 text-slate-600
                                                         border border-slate-200">

                                                <i class="fa-solid fa-circle-xmark text-[10px]"></i>

                                                Ditolak

                                            </span>

                                        @else

                                            <span class="inline-flex items-center gap-1.5
                                                         px-3 py-1 rounded-full
                                                         text-xs font-semibold
                                                         bg-slate-100 text-slate-600
                                                         border border-slate-200">

                                                <i class="fa-solid fa-clock text-[10px]"></i>

                                                Menunggu

                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td
                                        colspan="4"
                                        class="px-6 py-10 text-center
                                               text-sm text-slate-500"
                                    >

                                        <div class="flex flex-col items-center">

                                            <i class="fa-solid fa-file-circle-xmark
                                                      text-2xl text-slate-300 mb-2"></i>

                                            Belum ada laporan.

                                        </div>

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>


            {{-- STATUS LAPORAN --}}

            <div class="bg-white rounded-xl
                        border border-slate-200 shadow-sm p-6">

                <div class="flex items-center gap-3 mb-6">

                    <div class="w-10 h-10 rounded-lg bg-blue-50
                                border border-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-chart-pie text-blue-700"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">

                            Status Laporan

                        </h2>

                        <p class="text-xs text-slate-500 mt-1">

                            Ringkasan laporan berdasarkan status.

                        </p>

                    </div>

                </div>


                {{-- DIVERIFIKASI --}}

                <div class="mb-6">

                    <div class="flex justify-between mb-2">

                        <span class="text-sm text-slate-600">

                            Diverifikasi

                        </span>

                        <span class="font-bold text-blue-700">

                            {{ $diverifikasi }}

                        </span>

                    </div>

                    <div class="w-full bg-slate-100 rounded-full h-2">

                        <div
                            class="bg-blue-700 h-2 rounded-full"
                            style="width: {{ $totalLaporan > 0 ? ($diverifikasi / $totalLaporan) * 100 : 0 }}%"
                        ></div>

                    </div>

                </div>


                {{-- DITOLAK --}}

                <div class="mb-6">

                    <div class="flex justify-between mb-2">

                        <span class="text-sm text-slate-600">

                            Ditolak

                        </span>

                        <span class="font-bold text-slate-700">

                            {{ $ditolak }}

                        </span>

                    </div>

                    <div class="w-full bg-slate-100 rounded-full h-2">

                        <div
                            class="bg-slate-500 h-2 rounded-full"
                            style="width: {{ $totalLaporan > 0 ? ($ditolak / $totalLaporan) * 100 : 0 }}%"
                        ></div>

                    </div>

                </div>


                {{-- MENUNGGU --}}

                <div>

                    <div class="flex justify-between mb-2">

                        <span class="text-sm text-slate-600">

                            Menunggu

                        </span>

                        <span class="font-bold text-slate-600">

                            {{ $menunggu }}

                        </span>

                    </div>

                    <div class="w-full bg-slate-100 rounded-full h-2">

                        <div
                            class="bg-slate-300 h-2 rounded-full"
                            style="width: {{ $totalLaporan > 0 ? ($menunggu / $totalLaporan) * 100 : 0 }}%"
                        ></div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             RINGKASAN DATA KASUS
        ========================================================== --}}

        <div class="bg-white rounded-xl
                    border border-slate-200 shadow-sm p-6 mb-7">

            <div class="flex items-center gap-3 mb-6">

                <div class="w-10 h-10 rounded-lg bg-blue-50
                            border border-blue-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-database text-blue-700"></i>

                </div>

                <div>

                    <h2 class="text-lg font-bold text-slate-800">

                        Ringkasan Data Kasus

                    </h2>

                    <p class="text-sm text-slate-500 mt-1">

                        Kategori data kasus yang paling banyak tercatat.

                    </p>

                </div>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">


                {{-- KABUPATEN --}}

                <div class="rounded-xl border border-blue-100
                            bg-blue-50/60 p-5">

                    <div class="flex items-center gap-3 mb-4">

                        <div class="w-10 h-10 rounded-lg bg-white
                                    border border-blue-100
                                    flex items-center justify-center">

                            <i class="fa-solid fa-location-dot text-blue-700"></i>

                        </div>

                        <span class="text-sm font-medium text-slate-600">

                            Kabupaten/Kota Terbanyak

                        </span>

                    </div>

                    <h3 class="text-xl font-bold text-blue-900">

                        {{ $kabupatenTerbanyak }}

                    </h3>

                </div>


                {{-- KEKERASAN --}}

                <div class="rounded-xl border border-blue-100
                            bg-blue-50/60 p-5">

                    <div class="flex items-center gap-3 mb-4">

                        <div class="w-10 h-10 rounded-lg bg-white
                                    border border-blue-100
                                    flex items-center justify-center">

                            <i class="fa-solid fa-shield-heart text-blue-700"></i>

                        </div>

                        <span class="text-sm font-medium text-slate-600">

                            Bentuk Kekerasan Terbanyak

                        </span>

                    </div>

                    <h3 class="text-xl font-bold text-blue-900">

                        {{ $kekerasanTerbanyak }}

                    </h3>

                </div>


                {{-- LAYANAN --}}

                <div class="rounded-xl border border-blue-100
                            bg-blue-50/60 p-5">

                    <div class="flex items-center gap-3 mb-4">

                        <div class="w-10 h-10 rounded-lg bg-white
                                    border border-blue-100
                                    flex items-center justify-center">

                            <i class="fa-solid fa-hand-holding-heart text-blue-700"></i>

                        </div>

                        <span class="text-sm font-medium text-slate-600">

                            Jenis Layanan Terbanyak

                        </span>

                    </div>

                    <h3 class="text-xl font-bold text-blue-900">

                        {{ $layananTerbanyak }}

                    </h3>

                </div>

            </div>

        </div>


        {{-- =========================================================
             AKSES CEPAT
        ========================================================== --}}

        <div class="bg-white rounded-xl
                    border border-slate-200 shadow-sm p-6">

            <div class="flex items-center justify-between mb-5">

                <div>

                    <h2 class="text-lg font-bold text-slate-800">

                        Akses Cepat

                    </h2>

                    <p class="text-sm text-slate-500 mt-1">

                        Akses langsung ke fitur utama sistem.

                    </p>

                </div>

                <i class="fa-solid fa-arrow-right text-blue-700"></i>

            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">


                {{-- RIWAYAT LAPORAN --}}

                <a
                    href="{{ route('operator.laporan.riwayat') }}"
                    class="group rounded-xl
                           bg-blue-900 hover:bg-blue-800
                           text-white p-5 transition
                           shadow-sm"
                >

                    <div class="w-10 h-10 rounded-lg bg-blue-800
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-clock-rotate-left"></i>

                    </div>

                    <h3 class="font-bold">

                        Riwayat Laporan

                    </h3>

                    <p class="text-sm text-blue-200 mt-1">

                        Melihat riwayat laporan yang telah diproses.

                    </p>

                </a>


                {{-- DATA KASUS --}}

                <a
                    href="{{ route('operator.kasus.index') }}"
                    class="group rounded-xl
                           bg-blue-700 hover:bg-blue-800
                           text-white p-5 transition
                           shadow-sm"
                >

                    <div class="w-10 h-10 rounded-lg bg-blue-600
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-database"></i>

                    </div>

                    <h3 class="font-bold">

                        Data Kasus

                    </h3>

                    <p class="text-sm text-blue-100 mt-1">

                        Kelola dan perbarui data kasus.

                    </p>

                </a>


                {{-- MONITORING --}}

                <a
                    href="{{ route('operator.monitoring.index') }}"
                    class="group rounded-xl
                           bg-blue-600 hover:bg-blue-700
                           text-white p-5 transition
                           shadow-sm"
                >

                    <div class="w-10 h-10 rounded-lg bg-blue-500
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-chart-column"></i>

                    </div>

                    <h3 class="font-bold">

                        Monitoring

                    </h3>

                    <p class="text-sm text-blue-100 mt-1">

                        Pantau statistik dan kondisi data kasus.

                    </p>

                </a>


                {{-- ANALISIS --}}

                <a
                    href="{{ route('operator.analisis.index') }}"
                    class="group rounded-xl
                           bg-blue-500 hover:bg-blue-600
                           text-white p-5 transition
                           shadow-sm"
                >

                    <div class="w-10 h-10 rounded-lg bg-blue-400
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-chart-line"></i>

                    </div>

                    <h3 class="font-bold">

                        Analisis & Prediksi

                    </h3>

                    <p class="text-sm text-blue-50 mt-1">

                        Analisis tren dan prediksi kasus.

                    </p>

                </a>

            </div>

        </div>

    </div>

</div>

@endsection