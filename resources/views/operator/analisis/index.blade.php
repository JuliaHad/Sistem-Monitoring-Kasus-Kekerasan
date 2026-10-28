@extends('layouts.operator')

@section('content')

<div class="min-h-screen bg-slate-100 p-4 md:p-6">

    <div class="space-y-6">

        {{-- =========================================================
            HEADER
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 px-6 py-5">

                <div class="flex flex-col xl:flex-row
                            xl:items-center xl:justify-between gap-5">

                    <div class="flex items-center gap-4">

                        <div class="w-12 h-12 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-chart-line text-lg"></i>

                        </div>

                        <div>

                            <h1 class="text-2xl font-bold text-slate-800">
                                Analisis & Prediksi Data Kasus
                            </h1>

                            <p class="text-sm text-slate-500 mt-1">
                                Analisis tren kasus menggunakan metode
                                Regresi Linear Sederhana.
                            </p>

                        </div>

                    </div>


                    {{-- FILTER --}}
                    <form method="GET"
                          class="flex flex-wrap items-end gap-2">

                        <div>

                            <label class="block text-xs font-semibold
                                          text-slate-500 mb-1">

                                Filter Tahun

                            </label>

                            <select
                                name="tahun"
                                class="w-full sm:w-40
                                       bg-white
                                       border border-slate-300
                                       rounded-lg
                                       px-4 py-2.5
                                       text-sm text-slate-700
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

                        </div>


                        <button
                            type="submit"
                            class="inline-flex items-center justify-center
                                   gap-2
                                   bg-blue-600
                                   hover:bg-blue-700
                                   text-white
                                   px-5 py-2.5
                                   rounded-lg
                                   text-sm font-semibold
                                   shadow-sm
                                   transition">

                            <i class="fa-solid fa-filter text-xs"></i>

                            Filter

                        </button>


                        <a
                            href="{{ route('operator.analisis.index') }}"
                            class="inline-flex items-center justify-center
                                   gap-2
                                   bg-slate-600
                                   hover:bg-slate-700
                                   text-white
                                   px-5 py-2.5
                                   rounded-lg
                                   text-sm font-semibold
                                   shadow-sm
                                   transition">

                            <i class="fa-solid fa-rotate-left text-xs"></i>

                            Reset

                        </a>

                    </form>

                </div>

            </div>

        </div>


        {{-- =========================================================
            ANALISIS DATA
        ========================================================== --}}
        <div class="bg-white rounded-2xl border border-slate-200
                    shadow-sm overflow-hidden">

            {{-- HEADER --}}
            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-chart-column"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Analisis Data Kasus
                        </h2>

                        <p class="text-sm text-slate-500 mt-0.5">
                            Ringkasan hasil analisis regresi linear berdasarkan
                            data kasus.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                {{-- =================================================
                    STATISTIK
                ================================================== --}}
                <div class="grid grid-cols-1 sm:grid-cols-2
                            xl:grid-cols-4 gap-5">


                    {{-- TOTAL KASUS --}}
                    <div class="bg-white rounded-xl
                                border border-blue-100
                                shadow-sm p-5">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Total Kasus
                                </p>

                                <p class="text-3xl font-bold
                                          text-blue-600 mt-2">

                                    {{ number_format($totalKasus, 0, ',', '.') }}

                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Data kasus yang dianalisis
                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-lg
                                        bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600">

                                <i class="fa-solid fa-folder-open"></i>

                            </div>

                        </div>

                    </div>


                    {{-- TREND --}}
                    <div class="bg-white rounded-xl
                                border border-slate-200
                                shadow-sm p-5">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Trend Kasus
                                </p>

                                <p class="text-2xl font-bold mt-2

                                    @if($trend == 'MENINGKAT')
                                        text-red-600
                                    @elseif($trend == 'MENURUN')
                                        text-green-600
                                    @else
                                        text-slate-700
                                    @endif">

                                    {{ $trend }}

                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Arah perubahan kasus
                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-lg
                                        flex items-center justify-center

                                @if($trend == 'MENINGKAT')
                                    bg-red-100 text-red-600
                                @elseif($trend == 'MENURUN')
                                    bg-green-100 text-green-600
                                @else
                                    bg-slate-100 text-slate-600
                                @endif">

                                @if($trend == 'MENINGKAT')

                                    <i class="fa-solid fa-arrow-trend-up"></i>

                                @elseif($trend == 'MENURUN')

                                    <i class="fa-solid fa-arrow-trend-down"></i>

                                @else

                                    <i class="fa-solid fa-minus"></i>

                                @endif

                            </div>

                        </div>

                    </div>


                    {{-- SLOPE --}}
                    <div class="bg-white rounded-xl
                                border border-blue-100
                                shadow-sm p-5">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Slope (b)
                                </p>

                                <p class="text-3xl font-bold
                                          text-blue-600 mt-2">

                                    {{ number_format($b, 2) }}

                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Koefisien perubahan
                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-lg
                                        bg-blue-100
                                        flex items-center justify-center
                                        text-blue-600">

                                <i class="fa-solid fa-chart-line"></i>

                            </div>

                        </div>

                    </div>


                    {{-- INTERCEPT --}}
                    <div class="bg-white rounded-xl
                                border border-slate-200
                                shadow-sm p-5">

                        <div class="flex items-start justify-between">

                            <div>

                                <p class="text-sm font-medium text-slate-500">
                                    Intercept (a)
                                </p>

                                <p class="text-3xl font-bold
                                          text-slate-700 mt-2">

                                    {{ number_format($a, 2) }}

                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    Nilai konstanta
                                </p>

                            </div>

                            <div class="w-10 h-10 rounded-lg
                                        bg-slate-100
                                        flex items-center justify-center
                                        text-slate-600">

                                <i class="fa-solid fa-ruler-combined"></i>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                    INTERPRETASI
                ================================================== --}}
                <div class="mt-6 bg-blue-50
                            border border-blue-100
                            rounded-xl p-5">

                    <div class="flex items-start gap-3">

                        <div class="w-10 h-10 shrink-0
                                    rounded-lg
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-circle-info"></i>

                        </div>

                        <div>

                            <h3 class="font-bold text-slate-800">
                                Interpretasi Hasil Analisis
                            </h3>

                            <p class="text-sm text-slate-600 mt-2">

                                @if($trend == 'MENINGKAT')

                                    Data menunjukkan adanya
                                    <strong class="text-red-600">
                                        peningkatan jumlah kasus
                                    </strong>
                                    dari tahun ke tahun.

                                @elseif($trend == 'MENURUN')

                                    Data menunjukkan adanya
                                    <strong class="text-green-600">
                                        penurunan jumlah kasus
                                    </strong>
                                    dari tahun ke tahun.

                                @else

                                    Data menunjukkan kondisi
                                    <strong class="text-slate-700">
                                        relatif stabil
                                    </strong>.

                                @endif

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            WILAYAH + PREDIKSI
        ========================================================== --}}
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">


            {{-- TOP 6 WILAYAH --}}
            <div class="bg-white rounded-2xl
                        border border-slate-200
                        shadow-sm overflow-hidden">

                <div class="bg-gradient-to-r from-blue-50
                            via-indigo-50 to-white
                            border-b border-blue-100
                            px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-location-dot"></i>

                        </div>

                        <div>

                            <h3 class="font-bold text-slate-800">
                                Kabupaten/Kota Tertinggi
                            </h3>

                            <p class="text-sm text-slate-500 mt-0.5">
                                6 wilayah dengan jumlah kasus tertinggi.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-6">

                    <div class="space-y-2">

                        @forelse($wilayah as $nama => $total)

                            <div class="flex items-center justify-between
                                        gap-3
                                        rounded-lg
                                        border border-blue-100
                                        bg-blue-50
                                        px-3 py-2.5">

                                <div class="flex items-center gap-3 min-w-0">

                                    <span class="w-7 h-7 shrink-0
                                                 rounded-full
                                                 bg-blue-100
                                                 text-blue-700
                                                 text-xs font-bold
                                                 flex items-center justify-center">

                                        {{ $loop->iteration }}

                                    </span>

                                    <span class="text-sm font-semibold
                                                 text-slate-700 truncate">

                                        {{ $nama }}

                                    </span>

                                </div>

                                <span class="text-sm font-bold
                                             text-blue-700">

                                    {{ number_format($total, 0, ',', '.') }}

                                </span>

                            </div>

                        @empty

                            <div class="rounded-lg
                                        border border-slate-200
                                        bg-slate-50
                                        px-4 py-4
                                        text-center">

                                <p class="text-sm text-slate-400">
                                    Belum ada data wilayah.
                                </p>

                            </div>

                        @endforelse

                    </div>

                </div>

            </div>


            {{-- PREDIKSI --}}
            <div class="bg-white rounded-2xl
                        border border-slate-200
                        shadow-sm overflow-hidden">

                <div class="bg-gradient-to-r from-blue-50
                            via-indigo-50 to-white
                            border-b border-blue-100
                            px-6 py-5">

                    <div class="flex items-center gap-3">

                        <div class="w-11 h-11 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-wand-magic-sparkles"></i>

                        </div>

                        <div>

                            <h3 class="font-bold text-slate-800">
                                Prediksi Tahun Berikutnya
                            </h3>

                            <p class="text-sm text-slate-500 mt-0.5">
                                Hasil perhitungan regresi linear.
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-6">

                    <div class="rounded-xl
                                border border-blue-100
                                bg-blue-50
                                p-6">

                        <div class="grid grid-cols-2 gap-6">

                            <div>

                                <p class="text-sm text-slate-500">
                                    Tahun Prediksi
                                </p>

                                <p class="text-3xl font-bold
                                          text-slate-800 mt-2">

                                    {{ $tahunPrediksi ?? '-' }}

                                </p>

                            </div>


                            <div class="text-right">

                                <p class="text-sm text-slate-500">
                                    Perkiraan Kasus
                                </p>

                                <p class="text-3xl font-bold mt-2

                                    @if($trend == 'MENINGKAT')
                                        text-red-600
                                    @elseif($trend == 'MENURUN')
                                        text-green-600
                                    @else
                                        text-blue-600
                                    @endif">

                                    {{ number_format(round($prediksi), 0, ',', '.') }}

                                </p>

                                <p class="text-xs text-slate-400 mt-1">
                                    kasus
                                </p>

                            </div>

                        </div>

                    </div>


                    <div class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-3">

                        <div class="rounded-lg
                                    border border-slate-200
                                    bg-slate-50 p-4">

                            <p class="text-xs text-slate-500">
                                Trend
                            </p>

                            <p class="text-sm font-bold mt-1

                                @if($trend == 'MENINGKAT')
                                    text-red-600
                                @elseif($trend == 'MENURUN')
                                    text-green-600
                                @else
                                    text-slate-700
                                @endif">

                                {{ $trend }}

                            </p>

                        </div>


                        <div class="rounded-lg
                                    border border-slate-200
                                    bg-slate-50 p-4">

                            <p class="text-xs text-slate-500">
                                Periode Analisis
                            </p>

                            <p class="text-sm font-semibold
                                      text-slate-700 mt-1">

                                {{ $periodeData }}

                            </p>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            GRAFIK ANALISIS & PREDIKSI
        ========================================================== --}}
        <div class="bg-white rounded-2xl
                    border border-slate-200
                    shadow-sm overflow-hidden">

            <div class="bg-gradient-to-r from-blue-50
                        via-indigo-50 to-white
                        border-b border-blue-100
                        px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-chart-line"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Grafik Analisis & Prediksi
                        </h2>

                        <p class="text-sm text-slate-500 mt-0.5">
                            Perbandingan data kasus aktual dengan garis
                            tren dan prediksi.
                        </p>

                    </div>

                </div>

            </div>

            <div class="p-6">

                <div class="h-[400px]">

                    <canvas id="chartPrediksi"></canvas>

                </div>

            </div>

        </div>


        {{-- =========================================================
            METODE ANALISIS
        ========================================================== --}}
        <div class="bg-white rounded-2xl
                    border border-slate-200
                    shadow-sm overflow-hidden">

            <div class="bg-gradient-to-r from-blue-50
                        via-indigo-50 to-white
                        border-b border-blue-100
                        px-6 py-5">

                <div class="flex items-center gap-3">

                    <div class="w-11 h-11 rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-ruler-combined"></i>

                    </div>

                    <div>

                        <h2 class="text-lg font-bold text-slate-800">
                            Metode Analisis
                        </h2>

                        <p class="text-sm text-slate-500 mt-0.5">
                            Metode yang digunakan dalam proses analisis
                            dan prediksi.
                        </p>

                    </div>

                </div>

            </div>


            <div class="p-6">

                <p class="text-sm text-slate-600 leading-relaxed">

                    Analisis dilakukan menggunakan metode
                    <strong class="text-slate-800">
                        Regresi Linear Sederhana
                    </strong>
                    untuk melihat kecenderungan jumlah kasus berdasarkan
                    data tahun.

                </p>


                {{-- RUMUS --}}
                <div class="my-5 rounded-xl
                            border border-blue-100
                            bg-blue-50
                            p-6 text-center">

                    <p class="text-3xl font-bold text-blue-600">
                        y = a + bx
                    </p>

                </div>


                {{-- KOMPONEN --}}
                <div class="grid grid-cols-1 sm:grid-cols-2
                            lg:grid-cols-4 gap-4">


                    <div class="rounded-xl
                                border border-blue-100
                                bg-blue-50 p-4">

                        <div class="flex items-center gap-2">

                            <span class="w-8 h-8 rounded-lg
                                         bg-blue-100
                                         text-blue-700
                                         flex items-center justify-center
                                         font-bold">

                                a

                            </span>

                            <span class="font-semibold text-slate-700">
                                Intercept
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-3">
                            Intercept atau konstanta.
                        </p>

                    </div>


                    <div class="rounded-xl
                                border border-blue-100
                                bg-blue-50 p-4">

                        <div class="flex items-center gap-2">

                            <span class="w-8 h-8 rounded-lg
                                         bg-blue-100
                                         text-blue-700
                                         flex items-center justify-center
                                         font-bold">

                                b

                            </span>

                            <span class="font-semibold text-slate-700">
                                Slope
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-3">
                            Slope atau koefisien perubahan.
                        </p>

                    </div>


                    <div class="rounded-xl
                                border border-blue-100
                                bg-blue-50 p-4">

                        <div class="flex items-center gap-2">

                            <span class="w-8 h-8 rounded-lg
                                         bg-blue-100
                                         text-blue-700
                                         flex items-center justify-center
                                         font-bold">

                                x

                            </span>

                            <span class="font-semibold text-slate-700">
                                Variabel
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-3">
                            Variabel waktu/tahun.
                        </p>

                    </div>


                    <div class="rounded-xl
                                border border-blue-100
                                bg-blue-50 p-4">

                        <div class="flex items-center gap-2">

                            <span class="w-8 h-8 rounded-lg
                                         bg-blue-100
                                         text-blue-700
                                         flex items-center justify-center
                                         font-bold">

                                y

                            </span>

                            <span class="font-semibold text-slate-700">
                                Hasil
                            </span>

                        </div>

                        <p class="text-sm text-slate-500 mt-3">
                            Prediksi jumlah kasus.
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            LANJUT KE REKOMENDASI
        ========================================================== --}}
        <div class="bg-blue-50
                    border border-blue-100
                    rounded-2xl p-5">

            <div class="flex flex-col md:flex-row
                        md:items-center
                        md:justify-between gap-4">

                <div class="flex items-start gap-3">

                    <div class="w-10 h-10 shrink-0
                                rounded-lg
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-lightbulb"></i>

                    </div>

                    <div>

                        <h3 class="font-bold text-slate-800">
                            Lanjutkan ke Rekomendasi
                        </h3>

                        <p class="text-sm text-slate-500 mt-1">
                            Lihat rekomendasi berdasarkan hasil analisis sistem.
                        </p>

                    </div>

                </div>


                <a
                    href="{{ route('operator.rekomendasi.index') }}"
                    class="inline-flex items-center justify-center
                           gap-2
                           bg-blue-600
                           hover:bg-blue-700
                           text-white
                           px-5 py-2.5
                           rounded-lg
                           text-sm font-semibold
                           shadow-sm
                           transition">

                    <i class="fa-solid fa-arrow-right"></i>

                    Lihat Rekomendasi

                </a>

            </div>

        </div>

    </div>

</div>


{{-- =============================================================
    CHART.JS
============================================================= --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('chartPrediksi');

    if (!canvas) {
        return;
    }


    new Chart(canvas, {

        type: 'line',

        data: {

            labels: @json($labels),

            datasets: [

                {
                    label: 'Data Asli',

                    data: @json($dataAsli),

                    borderColor: '#2563eb',

                    backgroundColor: 'rgba(37, 99, 235, 0.10)',

                    borderWidth: 3,

                    pointBackgroundColor: '#2563eb',

                    pointBorderColor: '#ffffff',

                    pointBorderWidth: 2,

                    pointRadius: 5,

                    pointHoverRadius: 7,

                    fill: true,

                    tension: 0.35
                },

                {
                    label: 'Garis Tren / Prediksi',

                    data: @json($dataTrend),

                    borderColor: '#1e3a8a',

                    backgroundColor: 'transparent',

                    borderWidth: 3,

                    pointBackgroundColor: '#1e3a8a',

                    pointBorderColor: '#ffffff',

                    pointBorderWidth: 2,

                    pointRadius: 4,

                    pointHoverRadius: 6,

                    borderDash: [7, 5],

                    fill: false,

                    tension: 0.35
                }

            ]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,

            interaction: {

                intersect: false,

                mode: 'index'

            },


            plugins: {

                legend: {

                    position: 'top',

                    labels: {

                        usePointStyle: true,

                        padding: 20,

                        font: {

                            size: 12

                        }

                    }

                },


                tooltip: {

                    backgroundColor: '#0f172a',

                    titleColor: '#ffffff',

                    bodyColor: '#ffffff',

                    padding: 12,

                    cornerRadius: 8

                }

            },


            scales: {

                x: {

                    title: {

                        display: true,

                        text: 'Tahun',

                        font: {

                            weight: '600'

                        }

                    },

                    ticks: {

                        font: {

                            size: 11

                        }

                    },

                    grid: {

                        display: false

                    }

                },


                y: {

                    beginAtZero: true,

                    title: {

                        display: true,

                        text: 'Jumlah Kasus',

                        font: {

                            weight: '600'

                        }

                    },

                    ticks: {

                        precision: 0,

                        font: {

                            size: 11

                        }

                    },

                    grid: {

                        color: 'rgba(148, 163, 184, 0.15)'

                    }

                }

            }

        }

    });

});

</script>

@endsection