@extends('layouts.user')

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

                            <i class="fa-solid fa-chart-column text-lg"></i>

                        </div>

                        <div>

                            <h1 class="text-2xl font-bold text-slate-800">
                                Monitoring Data Kasus
                            </h1>

                            <p class="text-sm text-slate-500 mt-1">
                                Monitoring statistik kasus kekerasan terhadap
                                perempuan dan anak.
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
                            href="{{ route('operator.monitoring.index') }}"
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
            STATISTIK UTAMA
        ========================================================== --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-5 gap-5">

            {{-- TOTAL KASUS --}}
            <div class="bg-white rounded-2xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Total Kasus
                        </p>

                        <p class="text-3xl font-bold text-blue-600 mt-2">
                            {{ number_format($totalKasus, 0, ',', '.') }}
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Kasus terdata
                        </p>

                    </div>

                    <div class="w-11 h-11 rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-folder-open"></i>

                    </div>

                </div>

            </div>


            {{-- RATA-RATA USIA --}}
            <div class="bg-white rounded-2xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-start justify-between">

                    <div>

                        <p class="text-sm font-medium text-slate-500">
                            Rata-rata Usia
                        </p>

                        <p class="text-3xl font-bold text-blue-600 mt-2">
                            {{ number_format($rataUsia, 1, ',', '.') }}
                        </p>

                        <p class="text-xs text-slate-400 mt-1">
                            Tahun
                        </p>

                    </div>

                    <div class="w-11 h-11 rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-user-clock"></i>

                    </div>

                </div>

            </div>


            {{-- KABUPATEN --}}
            <div class="bg-white rounded-2xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-center gap-2 mb-3">

                    <div class="w-8 h-8 rounded-lg
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-location-dot text-sm"></i>

                    </div>

                    <div>

                        <p class="text-sm font-bold text-slate-800">
                            Kabupaten/Kota
                        </p>

                        <p class="text-[11px] text-slate-400">
                            6 wilayah terbanyak
                        </p>

                    </div>

                </div>

                <div class="space-y-2">

                    @forelse($kabupatenTerbanyak as $nama => $total)

                        <div class="flex items-center justify-between
                                    gap-2
                                    bg-blue-50
                                    border border-blue-100
                                    rounded-lg
                                    px-3 py-2">

                            <div class="flex items-center gap-2 min-w-0">

                                <span class="w-6 h-6 shrink-0
                                             rounded-full
                                             bg-blue-100
                                             text-blue-700
                                             text-xs font-bold
                                             flex items-center justify-center">

                                    {{ $loop->iteration }}

                                </span>

                                <span class="text-xs font-semibold
                                             text-slate-700 truncate">

                                    {{ $nama }}

                                </span>

                            </div>

                            <span class="text-xs font-bold text-blue-700">
                                {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>

                    @empty

                        <p class="text-xs text-slate-400">
                            Belum ada data.
                        </p>

                    @endforelse

                </div>

            </div>


            {{-- KEKERASAN --}}
            <div class="bg-white rounded-2xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-center gap-2 mb-3">

                    <div class="w-8 h-8 rounded-lg
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-shield-halved text-sm"></i>

                    </div>

                    <div>

                        <p class="text-sm font-bold text-slate-800">
                            Bentuk Kekerasan
                        </p>

                        <p class="text-[11px] text-slate-400">
                            6 bentuk terbanyak
                        </p>

                    </div>

                </div>

                <div class="space-y-2">

                    @forelse($kekerasanTerbanyak as $nama => $total)

                        <div class="flex items-center justify-between
                                    gap-2
                                    bg-blue-50
                                    border border-blue-100
                                    rounded-lg
                                    px-3 py-2">

                            <div class="flex items-center gap-2 min-w-0">

                                <span class="w-6 h-6 shrink-0
                                             rounded-full
                                             bg-blue-100
                                             text-blue-700
                                             text-xs font-bold
                                             flex items-center justify-center">

                                    {{ $loop->iteration }}

                                </span>

                                <span class="text-xs font-semibold
                                             text-slate-700 truncate">

                                    {{ $nama }}

                                </span>

                            </div>

                            <span class="text-xs font-bold text-blue-700">
                                {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>

                    @empty

                        <p class="text-xs text-slate-400">
                            Belum ada data.
                        </p>

                    @endforelse

                </div>

            </div>


            {{-- LAYANAN --}}
            <div class="bg-white rounded-2xl border border-slate-200
                        shadow-sm p-5">

                <div class="flex items-center gap-2 mb-3">

                    <div class="w-8 h-8 rounded-lg
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-hand-holding-heart text-sm"></i>

                    </div>

                    <div>

                        <p class="text-sm font-bold text-slate-800">
                            Jenis Layanan
                        </p>

                        <p class="text-[11px] text-slate-400">
                            6 layanan terbanyak
                        </p>

                    </div>

                </div>

                <div class="space-y-2">

                    @forelse($layananTerbanyak as $nama => $total)

                        <div class="flex items-center justify-between
                                    gap-2
                                    bg-blue-50
                                    border border-blue-100
                                    rounded-lg
                                    px-3 py-2">

                            <div class="flex items-center gap-2 min-w-0">

                                <span class="w-6 h-6 shrink-0
                                             rounded-full
                                             bg-blue-100
                                             text-blue-700
                                             text-xs font-bold
                                             flex items-center justify-center">

                                    {{ $loop->iteration }}

                                </span>

                                <span class="text-xs font-semibold
                                             text-slate-700 truncate">

                                    {{ $nama }}

                                </span>

                            </div>

                            <span class="text-xs font-bold text-blue-700">
                                {{ number_format($total, 0, ',', '.') }}
                            </span>

                        </div>

                    @empty

                        <p class="text-xs text-slate-400">
                            Belum ada data.
                        </p>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- =========================================================
            COMPONENT HEADER HELPER
        ========================================================== --}}

        @php
            $sectionHeader = 'bg-gradient-to-r from-blue-50 via-indigo-50 to-white border-b border-blue-100';
            $card = 'bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden';
        @endphp


        {{-- =========================================================
            GRAFIK USIA & PEKERJAAN
        ========================================================== --}}
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

            {{-- USIA --}}
            <div class="{{ $card }}">

                <div class="{{ $sectionHeader }} px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-chart-column"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Grafik Usia Korban
                            </h2>

                            <p class="text-xs text-slate-500 mt-0.5">
                                Distribusi jumlah kasus berdasarkan usia korban
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5">

                    <div class="h-[350px]">
                        <canvas id="usiaChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100">

                        <p class="text-xs text-slate-400 text-center">
                            {{ $periodeData }}
                        </p>

                        <p class="text-[11px] text-slate-400 text-center mt-1">
                            Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                        </p>

                    </div>

                </div>

            </div>


            {{-- PEKERJAAN --}}
            <div class="{{ $card }}">

                <div class="{{ $sectionHeader }} px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-briefcase"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Status Pekerjaan
                            </h2>

                            <p class="text-xs text-slate-500 mt-0.5">
                                Jumlah kasus berdasarkan pekerjaan korban
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5">

                    <div class="h-[350px]">
                        <canvas id="pekerjaanChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100">

                        <p class="text-xs text-slate-400 text-center">
                            {{ $periodeData }}
                        </p>

                        <p class="text-[11px] text-slate-400 text-center mt-1">
                            Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            PERKAWINAN / KEKERASAN / LAYANAN
        ========================================================== --}}
        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">

            {{-- PERKAWINAN --}}
            <div class="{{ $card }}">

                <div class="{{ $sectionHeader }} px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-ring"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Status Perkawinan
                            </h2>

                            <p class="text-xs text-slate-500">
                                Distribusi status perkawinan
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5">

                    <div class="h-[330px]">
                        <canvas id="perkawinanChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100">

                        <p class="text-xs text-slate-400 text-center">
                            {{ $periodeData }}
                        </p>

                        <p class="text-[11px] text-slate-400 text-center mt-1">
                            Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                        </p>

                    </div>

                </div>

            </div>


            {{-- KEKERASAN --}}
            <div class="{{ $card }}">

                <div class="{{ $sectionHeader }} px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-shield-halved"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Bentuk Kekerasan
                            </h2>

                            <p class="text-xs text-slate-500">
                                Jumlah kasus berdasarkan bentuk kekerasan
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5">

                    <div class="h-[330px]">
                        <canvas id="kekerasanChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100">

                        <p class="text-xs text-slate-400 text-center">
                            {{ $periodeData }}
                        </p>

                        <p class="text-[11px] text-slate-400 text-center mt-1">
                            Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                        </p>

                    </div>

                </div>

            </div>


            {{-- LAYANAN --}}
            <div class="{{ $card }}">

                <div class="{{ $sectionHeader }} px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-hand-holding-heart"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Jenis Layanan
                            </h2>

                            <p class="text-xs text-slate-500">
                                Distribusi layanan yang diberikan
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5">

                    <div class="h-[330px]">
                        <canvas id="layananChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100">

                        <p class="text-xs text-slate-400 text-center">
                            {{ $periodeData }}
                        </p>

                        <p class="text-[11px] text-slate-400 text-center mt-1">
                            Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            KABUPATEN & PENDIDIKAN
        ========================================================== --}}
        <div class="grid grid-cols-1 xl:grid-cols-2 gap-5">

            {{-- KABUPATEN --}}
            <div class="{{ $card }}">

                <div class="{{ $sectionHeader }} px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-map-location-dot"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Kabupaten/Kota
                            </h2>

                            <p class="text-xs text-slate-500">
                                Jumlah kasus berdasarkan kabupaten/kota
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5">

                    <div class="h-[450px]">
                        <canvas id="kabupatenChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100">

                        <p class="text-xs text-slate-400 text-center">
                            {{ $periodeData }}
                        </p>

                        <p class="text-[11px] text-slate-400 text-center mt-1">
                            Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                        </p>

                    </div>

                </div>

            </div>


            {{-- PENDIDIKAN --}}
            <div class="{{ $card }}">

                <div class="{{ $sectionHeader }} px-5 py-4">

                    <div class="flex items-center gap-3">

                        <div class="w-10 h-10 rounded-xl
                                    bg-blue-100
                                    flex items-center justify-center
                                    text-blue-600">

                            <i class="fa-solid fa-graduation-cap"></i>

                        </div>

                        <div>

                            <h2 class="font-bold text-slate-800">
                                Tingkat Pendidikan
                            </h2>

                            <p class="text-xs text-slate-500">
                                Distribusi tingkat pendidikan korban
                            </p>

                        </div>

                    </div>

                </div>

                <div class="p-5">

                    <div class="h-[450px]">
                        <canvas id="pendidikanChart"></canvas>
                    </div>

                    <div class="mt-4 pt-3 border-t border-slate-100">

                        <p class="text-xs text-slate-400 text-center">
                            {{ $periodeData }}
                        </p>

                        <p class="text-[11px] text-slate-400 text-center mt-1">
                            Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
            TEMPAT KEJADIAN
        ========================================================== --}}
        <div class="{{ $card }}">

            <div class="{{ $sectionHeader }} px-5 py-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-location-crosshairs"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-slate-800">
                            Tempat Kejadian
                        </h2>

                        <p class="text-xs text-slate-500">
                            Jumlah kasus berdasarkan tempat terjadinya kekerasan
                        </p>

                    </div>

                </div>

            </div>

            <div class="p-5">

                <div class="h-[380px]">
                    <canvas id="tempatChart"></canvas>
                </div>

                <div class="mt-4 pt-3 border-t border-slate-100">

                    <p class="text-xs text-slate-400 text-center">
                        {{ $periodeData }}
                    </p>

                    <p class="text-[11px] text-slate-400 text-center mt-1">
                        Sumber: Data kasus P3AKB Provinsi Kalimantan Selatan
                    </p>

                </div>

            </div>

        </div>


        {{-- =========================================================
            STATUS VERIFIKASI
        ========================================================== --}}
        <div class="{{ $card }}">

            <div class="{{ $sectionHeader }} px-5 py-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl
                                bg-blue-100
                                flex items-center justify-center
                                text-blue-600">

                        <i class="fa-solid fa-circle-check"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-slate-800">
                            Status Verifikasi Laporan
                        </h2>

                        <p class="text-xs text-slate-500">
                            Ringkasan status laporan yang tersimpan dalam sistem
                        </p>

                    </div>

                </div>

            </div>

            <div class="p-5">

                <div class="h-[300px]">
                    <canvas id="statusChart"></canvas>
                </div>

            </div>

        </div>


        {{-- =========================================================
            INFORMASI
        ========================================================== --}}
        <div class="bg-blue-50 border border-blue-100 rounded-2xl p-5">

            <div class="flex items-start gap-3">

                <div class="w-9 h-9 shrink-0 rounded-lg
                            bg-blue-100
                            flex items-center justify-center
                            text-blue-600">

                    <i class="fa-solid fa-circle-info"></i>

                </div>

                <div>

                    <p class="text-sm font-semibold text-blue-800">
                        Informasi Monitoring
                    </p>

                    <p class="text-sm text-blue-700 mt-1 leading-relaxed">

                        Dashboard menampilkan statistik kasus berdasarkan data
                        yang tersedia pada sistem. Kategori dengan jumlah kasus
                        0 tetap ditampilkan agar informasi monitoring tetap lengkap.

                    </p>

                </div>

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

    const chartFont = {
        family: 'Arial',
        size: 11
    };


    const commonOptions = {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                position: 'top',

                labels: {

                    font: chartFont,

                    usePointStyle: true,

                    padding: 15

                }

            },

            tooltip: {

                backgroundColor: '#0f172a',

                titleColor: '#ffffff',

                bodyColor: '#ffffff',

                padding: 10,

                cornerRadius: 8

            }

        },

        scales: {

            x: {

                ticks: {
                    font: chartFont
                },

                grid: {
                    display: false
                }

            },

            y: {

                beginAtZero: true,

                ticks: {

                    font: chartFont,

                    precision: 0

                },

                grid: {
                    color: 'rgba(148, 163, 184, 0.15)'
                }

            }

        }

    };


    /* =========================================================
       USIA
    ========================================================== */

    new Chart(document.getElementById('usiaChart'), {

        type: 'bar',

        data: {

            labels: {!! json_encode($usiaKorban->pluck('usia_korban')->values()) !!},

            datasets: [{

                label: 'Jumlah Kasus',

                data: {!! json_encode($usiaKorban->pluck('total')->values()) !!},

                backgroundColor: '#2563eb',

                borderColor: '#1d4ed8',

                borderWidth: 1,

                borderRadius: 5,

                barPercentage: 0.8,

                categoryPercentage: 0.8

            }]

        },

        options: {

            ...commonOptions,

            scales: {

                ...commonOptions.scales,

                x: {

                    ...commonOptions.scales.x,

                    title: {

                        display: true,

                        text: 'Usia (Tahun)',

                        font: {
                            weight: '600'
                        }

                    }

                },

                y: {

                    ...commonOptions.scales.y,

                    title: {

                        display: true,

                        text: 'Jumlah Kasus',

                        font: {
                            weight: '600'
                        }

                    }

                }

            }

        }

    });


    /* =========================================================
       STATUS PEKERJAAN
    ========================================================== */

    new Chart(document.getElementById('pekerjaanChart'), {

        type: 'bar',

        data: {

            labels: {!! json_encode($statusPekerjaan->keys()->values()) !!},

            datasets: [{

                label: 'Jumlah Kasus',

                data: {!! json_encode($statusPekerjaan->values()->values()) !!},

                backgroundColor: '#2563eb',

                borderColor: '#1d4ed8',

                borderWidth: 1,

                borderRadius: 5

            }]

        },

        options: {

            ...commonOptions,

            indexAxis: 'y'

        }

    });


    /* =========================================================
       STATUS PERKAWINAN
    ========================================================== */

    new Chart(document.getElementById('perkawinanChart'), {

        type: 'doughnut',

        data: {

            labels: {!! json_encode($statusPerkawinan->keys()->values()) !!},

            datasets: [{

                data: {!! json_encode($statusPerkawinan->values()->values()) !!},

                backgroundColor: [

                    '#1e3a8a',
                    '#2563eb',
                    '#60a5fa',
                    '#93c5fd',
                    '#bfdbfe'

                ],

                borderWidth: 2,

                borderColor: '#ffffff'

            }]

        },

        options: {

            ...commonOptions,

            cutout: '62%',

            plugins: {

                ...commonOptions.plugins,

                legend: {

                    position: 'bottom',

                    labels: {

                        font: chartFont,

                        padding: 12,

                        usePointStyle: true

                    }

                }

            }

        }

    });


    /* =========================================================
       BENTUK KEKERASAN
    ========================================================== */

    new Chart(document.getElementById('kekerasanChart'), {

        type: 'bar',

        data: {

            labels: {!! json_encode($bentukKekerasan->keys()->values()) !!},

            datasets: [{

                label: 'Jumlah Kasus',

                data: {!! json_encode($bentukKekerasan->values()->values()) !!},

                backgroundColor: '#2563eb',

                borderColor: '#1d4ed8',

                borderWidth: 1,

                borderRadius: 5

            }]

        },

        options: {

            ...commonOptions,

            scales: {

                ...commonOptions.scales,

                x: {

                    ...commonOptions.scales.x,

                    ticks: {

                        font: chartFont,

                        maxRotation: 45,

                        minRotation: 0

                    }

                }

            }

        }

    });


    /* =========================================================
       JENIS LAYANAN
    ========================================================== */

    new Chart(document.getElementById('layananChart'), {

        type: 'doughnut',

        data: {

            labels: {!! json_encode($jenisLayanan->keys()->values()) !!},

            datasets: [{

                data: {!! json_encode($jenisLayanan->values()->values()) !!},

                backgroundColor: [

                    '#1e3a8a',
                    '#2563eb',
                    '#3b82f6',
                    '#60a5fa',
                    '#93c5fd',
                    '#bfdbfe',
                    '#dbeafe',
                    '#94a3b8'

                ],

                borderWidth: 2,

                borderColor: '#ffffff'

            }]

        },

        options: {

            ...commonOptions,

            cutout: '62%',

            plugins: {

                ...commonOptions.plugins,

                legend: {

                    position: 'bottom',

                    labels: {

                        font: chartFont,

                        padding: 9,

                        usePointStyle: true

                    }

                }

            }

        }

    });


    /* =========================================================
       KABUPATEN / KOTA
    ========================================================== */

    new Chart(document.getElementById('kabupatenChart'), {

        type: 'bar',

        data: {

            labels: {!! json_encode($kabupatenKota->keys()->values()) !!},

            datasets: [{

                label: 'Jumlah Kasus',

                data: {!! json_encode($kabupatenKota->values()->values()) !!},

                backgroundColor: '#2563eb',

                borderColor: '#1d4ed8',

                borderWidth: 1,

                borderRadius: 5

            }]

        },

        options: {

            ...commonOptions,

            indexAxis: 'y'

        }

    });


    /* =========================================================
       PENDIDIKAN
    ========================================================== */

    new Chart(document.getElementById('pendidikanChart'), {

        type: 'doughnut',

        data: {

            labels: {!! json_encode($tingkatPendidikan->keys()->values()) !!},

            datasets: [{

                data: {!! json_encode($tingkatPendidikan->values()->values()) !!},

                backgroundColor: [

                    '#1e3a8a',
                    '#2563eb',
                    '#3b82f6',
                    '#60a5fa',
                    '#93c5fd',
                    '#bfdbfe',
                    '#dbeafe'

                ],

                borderWidth: 2,

                borderColor: '#ffffff'

            }]

        },

        options: {

            ...commonOptions,

            cutout: '62%',

            plugins: {

                ...commonOptions.plugins,

                legend: {

                    position: 'bottom',

                    labels: {

                        font: chartFont,

                        padding: 10,

                        usePointStyle: true

                    }

                }

            }

        }

    });


    /* =========================================================
       TEMPAT KEJADIAN
    ========================================================== */

    new Chart(document.getElementById('tempatChart'), {

        type: 'bar',

        data: {

            labels: {!! json_encode($tempatKejadian->keys()->values()) !!},

            datasets: [{

                label: 'Jumlah Kasus',

                data: {!! json_encode($tempatKejadian->values()->values()) !!},

                backgroundColor: '#2563eb',

                borderColor: '#1d4ed8',

                borderWidth: 1,

                borderRadius: 5

            }]

        },

        options: {

            ...commonOptions,

            indexAxis: 'y'

        }

    });


    /* =========================================================
       STATUS VERIFIKASI
    ========================================================== */

    new Chart(document.getElementById('statusChart'), {

        type: 'bar',

        data: {

            labels: {!! json_encode($statusVerifikasi->pluck('status_verifikasi')->values()) !!},

            datasets: [{

                label: 'Jumlah Laporan',

                data: {!! json_encode($statusVerifikasi->pluck('total')->values()) !!},

                backgroundColor: '#2563eb',

                borderColor: '#1d4ed8',

                borderWidth: 1,

                borderRadius: 5

            }]

        },

        options: {

            ...commonOptions,

            scales: {

                ...commonOptions.scales,

                y: {

                    ...commonOptions.scales.y,

                    ticks: {
                        precision: 0
                    }

                }

            }

        }

    });

});

</script>

@endsection