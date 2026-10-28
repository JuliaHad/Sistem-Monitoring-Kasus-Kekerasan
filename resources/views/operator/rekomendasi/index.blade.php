@extends('layouts.operator')

@section('content')

<div class="min-h-screen bg-slate-100 p-6 lg:p-8">

    <div class="max-w-7xl mx-auto space-y-6">

        {{-- =========================================================
            HEADER HALAMAN
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="p-6 lg:p-7">

                <div class="flex flex-col lg:flex-row lg:items-end lg:justify-between gap-5">

                    <div>

                        <div class="flex items-center gap-3">

                            <div class="w-11 h-11 rounded-xl bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600">
                                <i class="fa-solid fa-lightbulb text-lg"></i>
                            </div>

                            <div>

                                <h1 class="text-2xl lg:text-3xl font-bold text-slate-800">
                                    Hasil Analisis & Rekomendasi Sistem
                                </h1>

                                <p class="text-sm text-slate-500 mt-1">
                                    Sistem rekomendasi berdasarkan hasil monitoring,
                                    analisis tren, dan prediksi kasus.
                                </p>

                            </div>

                        </div>

                    </div>


                    {{-- FILTER --}}
                    <div class="flex flex-wrap items-center gap-2">

                        <form method="GET"
                              class="flex flex-wrap items-center gap-2">

                            <select
                                name="tahun"
                                class="bg-white border border-slate-300
                                       rounded-lg px-4 py-2.5
                                       text-sm text-slate-700
                                       shadow-sm
                                       focus:outline-none
                                       focus:ring-2 focus:ring-blue-500
                                       focus:border-blue-500">

                                <option value="">
                                    Semua Tahun
                                </option>

                                @for($t = date('Y'); $t >= 2020; $t--)

                                    <option
                                        value="{{ $t }}"
                                        {{ request('tahun') == $t ? 'selected' : '' }}>
                                        {{ $t }}
                                    </option>

                                @endfor

                            </select>


                            <button
                                type="submit"
                                class="inline-flex items-center gap-2
                                       bg-blue-600 hover:bg-blue-700
                                       text-white px-5 py-2.5
                                       rounded-lg text-sm font-semibold
                                       shadow-sm transition">

                                <i class="fa-solid fa-filter text-xs"></i>

                                Filter

                            </button>


                            <a
                                href="{{ route('operator.rekomendasi.index') }}"
                                class="inline-flex items-center gap-2
                                       bg-slate-600 hover:bg-slate-700
                                       text-white px-5 py-2.5
                                       rounded-lg text-sm font-semibold
                                       shadow-sm transition">

                                <i class="fa-solid fa-rotate-left text-xs"></i>

                                Reset

                            </a>

                        </form>


                        {{-- STATUS INTEGRASI --}}
                        <div class="flex items-center gap-2
                                    text-sm text-slate-500
                                    ml-1">

                            <span class="w-2.5 h-2.5 rounded-full bg-green-500"></span>

                            Data Terintegrasi

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            RINGKASAN EKSEKUTIF
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

            {{-- HEADER SECTION --}}
            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 p-6">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-chart-column"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Ringkasan Eksekutif
                        </h2>

                        <p class="text-sm text-slate-500">
                            Ringkasan hasil pengolahan data kasus
                        </p>

                    </div>

                </div>

            </div>


            {{-- INDIKATOR --}}
            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2
                            xl:grid-cols-4 gap-4">

                    {{-- TOTAL KASUS --}}
                    <div class="bg-white border border-blue-100
                                rounded-xl p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-xs uppercase
                                          tracking-wide text-slate-500">
                                    Total Kasus
                                </p>

                                <p class="text-2xl font-bold
                                          text-blue-600 mt-2">
                                    {{ number_format($totalKasus) }}
                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-xl bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600">

                                <i class="fa-solid fa-file-lines"></i>

                            </div>

                        </div>

                        <p class="text-xs text-slate-400 mt-3">
                            Pada tahun yang dipilih
                        </p>

                    </div>


                    {{-- TREND --}}
                    <div class="bg-white border border-slate-200
                                rounded-xl p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-xs uppercase
                                          tracking-wide text-slate-500">
                                    Trend Kasus
                                </p>

                                <p class="text-2xl font-bold mt-2
                                    @if($trend == 'MENINGKAT')
                                        text-red-600
                                    @elseif($trend == 'MENURUN')
                                        text-green-600
                                    @else
                                        text-blue-600
                                    @endif">

                                    {{ $trend }}

                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-xl
                                        @if($trend == 'MENINGKAT')
                                            bg-red-100 text-red-600
                                        @elseif($trend == 'MENURUN')
                                            bg-green-100 text-green-600
                                        @else
                                            bg-blue-100 text-blue-600
                                        @endif
                                        flex items-center justify-center">

                                <i class="fa-solid fa-chart-line"></i>

                            </div>

                        </div>

                        <p class="text-xs text-slate-400 mt-3">
                            Berdasarkan analisis regresi
                        </p>

                    </div>


                    {{-- PREDIKSI --}}
                    <div class="bg-white border border-blue-100
                                rounded-xl p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-xs uppercase
                                          tracking-wide text-slate-500">

                                    Prediksi Tahun
                                    {{ $tahunPrediksi ?? '-' }}

                                </p>

                                <p class="text-2xl font-bold
                                          text-blue-600 mt-2">

                                    {{ number_format($prediksi) }}

                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-xl bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600">

                                <i class="fa-solid fa-chart-simple"></i>

                            </div>

                        </div>

                        <p class="text-xs text-slate-400 mt-3">
                            Perkiraan jumlah kasus
                        </p>

                    </div>


                    {{-- RISIKO --}}
                    <div class="bg-white border border-slate-200
                                rounded-xl p-5">

                        <div class="flex items-center justify-between">

                            <div>

                                <p class="text-xs uppercase
                                          tracking-wide text-slate-500">
                                    Tingkat Risiko
                                </p>

                                <p class="text-2xl font-bold mt-2
                                    @if($risiko == 'TINGGI')
                                        text-red-600
                                    @elseif($risiko == 'SEDANG')
                                        text-yellow-600
                                    @else
                                        text-green-600
                                    @endif">

                                    {{ $risiko }}

                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-xl
                                        @if($risiko == 'TINGGI')
                                            bg-red-100 text-red-600
                                        @elseif($risiko == 'SEDANG')
                                            bg-yellow-100 text-yellow-600
                                        @else
                                            bg-green-100 text-green-600
                                        @endif
                                        flex items-center justify-center">

                                <i class="fa-solid fa-triangle-exclamation"></i>

                            </div>

                        </div>

                        <p class="text-xs text-slate-400 mt-3">
                            Indikator berdasarkan prediksi
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            TOP 6 DATA DOMINAN
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 p-6">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-ranking-star"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Data Dominan — Top 6
                        </h2>

                        <p class="text-sm text-slate-500">
                            Enam kategori dengan jumlah kasus terbanyak
                            pada periode yang dipilih.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 grid grid-cols-1 lg:grid-cols-3 gap-5">

                {{-- =====================================================
                    KABUPATEN / KOTA
                ====================================================== --}}
                <div class="border border-blue-100 rounded-xl overflow-hidden">

                    <div class="bg-blue-50 px-4 py-3
                                border-b border-blue-100">

                        <div class="flex items-center gap-2">

                            <i class="fa-solid fa-location-dot text-blue-600"></i>

                            <h3 class="font-bold text-blue-800">
                                Kabupaten/Kota
                            </h3>

                        </div>

                        <p class="text-xs text-blue-600 mt-1">
                            6 wilayah dengan kasus terbanyak
                        </p>

                    </div>


                    <div class="p-3 space-y-2">

                        @forelse($kabupatenTop6 as $nama => $total)

                            <div class="flex items-center
                                        justify-between gap-2
                                        rounded-lg bg-slate-50
                                        px-3 py-2.5">

                                <div class="flex items-center
                                            gap-2 min-w-0">

                                    <span class="w-6 h-6 shrink-0
                                                 rounded-full bg-blue-100
                                                 text-blue-700 text-xs
                                                 font-bold
                                                 flex items-center
                                                 justify-center">

                                        {{ $loop->iteration }}

                                    </span>

                                    <span class="text-sm font-medium
                                                 text-slate-700 truncate">

                                        {{ $nama }}

                                    </span>

                                </div>

                                <span class="text-sm font-bold
                                             text-blue-700 shrink-0">

                                    {{ number_format($total, 0, ',', '.') }}

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


                {{-- =====================================================
                    BENTUK KEKERASAN
                ====================================================== --}}
                <div class="border border-blue-100 rounded-xl overflow-hidden">

                    <div class="bg-blue-50 px-4 py-3
                                border-b border-blue-100">

                        <div class="flex items-center gap-2">

                            <i class="fa-solid fa-shield-halved text-blue-600"></i>

                            <h3 class="font-bold text-blue-800">
                                Bentuk Kekerasan
                            </h3>

                        </div>

                        <p class="text-xs text-blue-600 mt-1">
                            6 bentuk dengan kasus terbanyak
                        </p>

                    </div>


                    <div class="p-3 space-y-2">

                        @forelse($kekerasanTop6 as $nama => $total)

                            <div class="flex items-center
                                        justify-between gap-2
                                        rounded-lg bg-slate-50
                                        px-3 py-2.5">

                                <div class="flex items-center
                                            gap-2 min-w-0">

                                    <span class="w-6 h-6 shrink-0
                                                 rounded-full bg-blue-100
                                                 text-blue-700 text-xs
                                                 font-bold
                                                 flex items-center
                                                 justify-center">

                                        {{ $loop->iteration }}

                                    </span>

                                    <span class="text-sm font-medium
                                                 text-slate-700 truncate">

                                        {{ $nama }}

                                    </span>

                                </div>

                                <span class="text-sm font-bold
                                             text-blue-700 shrink-0">

                                    {{ number_format($total, 0, ',', '.') }}

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


                {{-- =====================================================
                    JENIS LAYANAN
                ====================================================== --}}
                <div class="border border-blue-100 rounded-xl overflow-hidden">

                    <div class="bg-blue-50 px-4 py-3
                                border-b border-blue-100">

                        <div class="flex items-center gap-2">

                            <i class="fa-solid fa-hand-holding-heart text-blue-600"></i>

                            <h3 class="font-bold text-blue-800">
                                Jenis Layanan
                            </h3>

                        </div>

                        <p class="text-xs text-blue-600 mt-1">
                            6 layanan dengan kasus terbanyak
                        </p>

                    </div>


                    <div class="p-3 space-y-2">

                        @forelse($layananTop6 as $nama => $total)

                            <div class="flex items-center
                                        justify-between gap-2
                                        rounded-lg bg-slate-50
                                        px-3 py-2.5">

                                <div class="flex items-center
                                            gap-2 min-w-0">

                                    <span class="w-6 h-6 shrink-0
                                                 rounded-full bg-blue-100
                                                 text-blue-700 text-xs
                                                 font-bold
                                                 flex items-center
                                                 justify-center">

                                        {{ $loop->iteration }}

                                    </span>

                                    <span class="text-sm font-medium
                                                 text-slate-700 truncate">

                                        {{ $nama }}

                                    </span>

                                </div>

                                <span class="text-sm font-bold
                                             text-blue-700 shrink-0">

                                    {{ number_format($total, 0, ',', '.') }}

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

        </div>


        {{-- =========================================================
            STATUS ANALISIS DATA
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 p-6">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-chart-line"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Status Analisis Data
                        </h2>

                        <p class="text-sm text-slate-500">
                            Informasi hasil analisis dan prediksi sistem
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-3">

                    {{-- TREND --}}
                    <div class="flex items-center
                                justify-between
                                bg-slate-50 rounded-xl
                                px-5 py-4">

                        <div class="flex items-center gap-3">

                            <div class="w-9 h-9 rounded-lg
                                        bg-blue-100 text-blue-600
                                        flex items-center justify-center">

                                <i class="fa-solid fa-chart-line text-sm"></i>

                            </div>

                            <span class="text-sm text-slate-600">
                                Trend Kasus
                            </span>

                        </div>

                        <span class="font-bold
                            @if($trend == 'MENINGKAT')
                                text-red-600
                            @elseif($trend == 'MENURUN')
                                text-green-600
                            @else
                                text-blue-600
                            @endif">

                            {{ $trend }}

                        </span>

                    </div>


                    {{-- TAHUN PREDIKSI --}}
                    <div class="flex items-center
                                justify-between
                                bg-slate-50 rounded-xl
                                px-5 py-4">

                        <div class="flex items-center gap-3">

                            <div class="w-9 h-9 rounded-lg
                                        bg-blue-100 text-blue-600
                                        flex items-center justify-center">

                                <i class="fa-solid fa-calendar-days text-sm"></i>

                            </div>

                            <span class="text-sm text-slate-600">
                                Prediksi Tahun
                            </span>

                        </div>

                        <span class="font-bold text-slate-800">
                            {{ $tahunPrediksi }}
                        </span>

                    </div>


                    {{-- PREDIKSI --}}
                    <div class="flex items-center
                                justify-between
                                bg-slate-50 rounded-xl
                                px-5 py-4">

                        <div class="flex items-center gap-3">

                            <div class="w-9 h-9 rounded-lg
                                        bg-blue-100 text-blue-600
                                        flex items-center justify-center">

                                <i class="fa-solid fa-chart-simple text-sm"></i>

                            </div>

                            <span class="text-sm text-slate-600">
                                Prediksi Kasus
                            </span>

                        </div>

                        <span class="font-bold text-blue-600">
                            {{ number_format($prediksi) }} Kasus
                        </span>

                    </div>


                    {{-- RISIKO --}}
                    <div class="flex items-center
                                justify-between
                                bg-slate-50 rounded-xl
                                px-5 py-4">

                        <div class="flex items-center gap-3">

                            <div class="w-9 h-9 rounded-lg
                                        @if($risiko == 'TINGGI')
                                            bg-red-100 text-red-600
                                        @elseif($risiko == 'SEDANG')
                                            bg-yellow-100 text-yellow-600
                                        @else
                                            bg-green-100 text-green-600
                                        @endif
                                        flex items-center justify-center">

                                <i class="fa-solid fa-triangle-exclamation text-sm"></i>

                            </div>

                            <span class="text-sm text-slate-600">
                                Tingkat Risiko
                            </span>

                        </div>

                        <span class="font-bold
                            @if($risiko == 'TINGGI')
                                text-red-600
                            @elseif($risiko == 'SEDANG')
                                text-yellow-600
                            @else
                                text-green-600
                            @endif">

                            {{ $risiko }}

                        </span>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            REKOMENDASI SISTEM
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 p-6">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-lightbulb"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Rekomendasi Sistem
                        </h2>

                        <p class="text-sm text-slate-500">
                            Rekomendasi berdasarkan hasil analisis data
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                @if($trend == 'MENINGKAT')

                    <div class="space-y-4">

                        {{-- REKOMENDASI 1 --}}
                        <div class="flex gap-4
                                    bg-red-50 border border-red-100
                                    rounded-xl p-5">

                            <div class="w-10 h-10 shrink-0
                                        rounded-lg bg-red-100
                                        flex items-center justify-center
                                        text-red-600 font-bold">

                                01

                            </div>

                            <div>

                                <h3 class="font-semibold text-red-800">
                                    Penguatan Pencegahan dan Penanganan
                                </h3>

                                <p class="text-sm text-red-700 mt-1">
                                    Tingkatkan program pencegahan dan
                                    penanganan kasus di wilayah
                                    <strong>{{ $kabupatenDominan }}</strong>.
                                </p>

                            </div>

                        </div>


                        {{-- REKOMENDASI 2 --}}
                        <div class="flex gap-4
                                    bg-blue-50 border border-blue-100
                                    rounded-xl p-5">

                            <div class="w-10 h-10 shrink-0
                                        rounded-lg bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600 font-bold">

                                02

                            </div>

                            <div>

                                <h3 class="font-semibold text-blue-800">
                                    Peningkatan Edukasi dan Sosialisasi
                                </h3>

                                <p class="text-sm text-blue-700 mt-1">
                                    Tingkatkan sosialisasi terkait kasus
                                    <strong>{{ $kekerasanDominan }}</strong>.
                                </p>

                            </div>

                        </div>


                        {{-- REKOMENDASI 3 --}}
                        <div class="flex gap-4
                                    bg-blue-50 border border-blue-100
                                    rounded-xl p-5">

                            <div class="w-10 h-10 shrink-0
                                        rounded-lg bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600 font-bold">

                                03

                            </div>

                            <div>

                                <h3 class="font-semibold text-blue-800">
                                    Penguatan Kapasitas Layanan
                                </h3>

                                <p class="text-sm text-blue-700 mt-1">
                                    Tambah kapasitas layanan
                                    <strong>{{ $layananDominan }}</strong>.
                                </p>

                            </div>

                        </div>

                    </div>


                @elseif($trend == 'MENURUN')

                    <div class="space-y-4">

                        {{-- REKOMENDASI 1 --}}
                        <div class="flex gap-4
                                    bg-green-50 border border-green-100
                                    rounded-xl p-5">

                            <div class="w-10 h-10 shrink-0
                                        rounded-lg bg-green-100
                                        flex items-center justify-center
                                        text-green-600 font-bold">

                                01

                            </div>

                            <div>

                                <h3 class="font-semibold text-green-800">
                                    Pertahankan Program yang Berjalan
                                </h3>

                                <p class="text-sm text-green-700 mt-1">
                                    Program yang berjalan saat ini perlu
                                    dipertahankan karena tren kasus menurun.
                                </p>

                            </div>

                        </div>


                        {{-- REKOMENDASI 2 --}}
                        <div class="flex gap-4
                                    bg-blue-50 border border-blue-100
                                    rounded-xl p-5">

                            <div class="w-10 h-10 shrink-0
                                        rounded-lg bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600 font-bold">

                                02

                            </div>

                            <div>

                                <h3 class="font-semibold text-blue-800">
                                    Monitoring Wilayah Dominan
                                </h3>

                                <p class="text-sm text-blue-700 mt-1">
                                    Tetap lakukan monitoring pada wilayah
                                    <strong>{{ $kabupatenDominan }}</strong>.
                                </p>

                            </div>

                        </div>

                    </div>


                @else

                    <div class="space-y-4">

                        {{-- REKOMENDASI 1 --}}
                        <div class="flex gap-4
                                    bg-yellow-50 border border-yellow-100
                                    rounded-xl p-5">

                            <div class="w-10 h-10 shrink-0
                                        rounded-lg bg-yellow-100
                                        flex items-center justify-center
                                        text-yellow-600 font-bold">

                                01

                            </div>

                            <div>

                                <h3 class="font-semibold text-yellow-800">
                                    Evaluasi Program Secara Berkala
                                </h3>

                                <p class="text-sm text-yellow-700 mt-1">
                                    Lakukan evaluasi program secara berkala
                                    untuk memantau perkembangan kasus.
                                </p>

                            </div>

                        </div>


                        {{-- REKOMENDASI 2 --}}
                        <div class="flex gap-4
                                    bg-red-50 border border-red-100
                                    rounded-xl p-5">

                            <div class="w-10 h-10 shrink-0
                                        rounded-lg bg-red-100
                                        flex items-center justify-center
                                        text-red-600 font-bold">

                                02

                            </div>

                            <div>

                                <h3 class="font-semibold text-red-800">
                                    Fokus Penanganan Kasus
                                </h3>

                                <p class="text-sm text-red-700 mt-1">
                                    Fokus pada penanganan kasus
                                    <strong>{{ $kekerasanDominan }}</strong>.
                                </p>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>


        {{-- =========================================================
            PRIORITAS PROGRAM
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 p-6">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-list-check"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Prioritas Program
                        </h2>

                        <p class="text-sm text-slate-500">
                            Area yang perlu menjadi perhatian berdasarkan
                            hasil analisis sistem
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">

                {{-- PRIORITAS TINGGI --}}
                <div class="bg-red-50 border border-red-100
                            rounded-xl p-5">

                    <div class="flex items-center
                                justify-between mb-4">

                        <span class="text-xs font-bold uppercase
                                     tracking-wide text-red-600">

                            Prioritas Tinggi

                        </span>

                        <span class="w-8 h-8 rounded-lg
                                     bg-red-100
                                     flex items-center justify-center
                                     text-red-600">

                            <i class="fa-solid fa-arrow-up"></i>

                        </span>

                    </div>

                    <p class="text-sm text-red-800 leading-relaxed">

                        Penanganan kasus
                        <strong>{{ $kekerasanDominan }}</strong>
                        di wilayah
                        <strong>{{ $kabupatenDominan }}</strong>.

                    </p>

                </div>


                {{-- PRIORITAS SEDANG --}}
                <div class="bg-yellow-50 border border-yellow-100
                            rounded-xl p-5">

                    <div class="flex items-center
                                justify-between mb-4">

                        <span class="text-xs font-bold uppercase
                                     tracking-wide text-yellow-600">

                            Prioritas Sedang

                        </span>

                        <span class="w-8 h-8 rounded-lg
                                     bg-yellow-100
                                     flex items-center justify-center
                                     text-yellow-600">

                            <i class="fa-solid fa-minus"></i>

                        </span>

                    </div>

                    <p class="text-sm text-yellow-800 leading-relaxed">

                        Penguatan layanan
                        <strong>{{ $layananDominan }}</strong>.

                    </p>

                </div>


                {{-- PRIORITAS RENDAH --}}
                <div class="bg-green-50 border border-green-100
                            rounded-xl p-5">

                    <div class="flex items-center
                                justify-between mb-4">

                        <span class="text-xs font-bold uppercase
                                     tracking-wide text-green-600">

                            Prioritas Rendah

                        </span>

                        <span class="w-8 h-8 rounded-lg
                                     bg-green-100
                                     flex items-center justify-center
                                     text-green-600">

                            <i class="fa-solid fa-check"></i>

                        </span>

                    </div>

                    <p class="text-sm text-green-800 leading-relaxed">

                        Monitoring dan evaluasi rutin.

                    </p>

                </div>

            </div>

        </div>


        {{-- =========================================================
            INFORMASI ANALISIS
        ========================================================== --}}
        <div class="bg-slate-800 rounded-2xl p-6
                    text-white shadow-sm">

            <div class="flex flex-col md:flex-row
                        md:items-center md:justify-between
                        gap-5">

                <div>

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-slate-700
                                    flex items-center justify-center
                                    text-blue-300">

                            <i class="fa-solid fa-circle-info"></i>

                        </div>

                        <div>

                            <h3 class="font-semibold">
                                Informasi Analisis
                            </h3>

                            <p class="text-sm text-slate-300 mt-1">
                                Rekomendasi dihasilkan berdasarkan data
                                monitoring, tren kasus, prediksi,
                                wilayah dominan, dan bentuk kekerasan dominan.
                            </p>

                        </div>

                    </div>

                    <p class="text-xs text-slate-400 mt-4 ml-0 md:ml-13">
                        {{ $periodeData }}
                    </p>

                </div>


                <div class="text-sm text-slate-300
                            md:text-right">

                    <p>
                        Analisis terakhir
                    </p>

                    <p class="font-semibold text-white mt-1">

                        {{ now()->format('d M Y H:i') }}

                    </p>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection