@extends('layouts.app')

@section('content')

<div class="min-h-screen bg-slate-100 p-8">

<!-- HEADER -->
<div class="mb-8">
    <h1 class="text-3xl font-bold text-slate-800">
        Dashboard Admin
    </h1>

    <p class="text-slate-500 mt-2">
        Sistem Monitoring Data Kekerasan Perempuan dan Anak
    </p>
</div>

<!-- CARD STATISTIK -->
<div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-7 gap-6 mb-8">

    <!-- TOTAL KASUS -->
    <div class="bg-white rounded-2xl shadow-lg p-5 text-center flex flex-col justify-between min-h-[140px]">

        <h3 class="text-gray-500 text-sm h-10 flex items-center justify-center">
            Total Kasus
        </h3>

        <p class="text-4xl font-bold text-blue-700">
            {{ \App\Models\Kasus::count() }}
        </p>

    </div>

    <!-- TOTAL LAPORAN -->
    <div class="bg-white rounded-2xl shadow-lg p-5 text-center flex flex-col justify-between min-h-[140px]">

        <h3 class="text-gray-500 text-sm h-10 flex items-center justify-center">
            Total Laporan
        </h3>

        <p class="text-4xl font-bold text-emerald-600">
            {{ \App\Models\Laporan::count() }}
        </p>

    </div>

    <!-- KABUPATEN -->
    <div class="bg-white rounded-2xl shadow-lg p-5 text-center flex flex-col justify-between min-h-[140px]">

        <h3 class="text-gray-500 text-sm h-10 flex items-center justify-center">
            Kabupaten/Kota
        </h3>

        <p class="text-4xl font-bold text-amber-500">
            {{ \App\Models\KabupatenKota::count() }}
        </p>

    </div>

    <!-- USER -->
    <div class="bg-white rounded-2xl shadow-lg p-5 text-center flex flex-col justify-between min-h-[140px]">

        <h3 class="text-gray-500 text-sm h-10 flex items-center justify-center">
            User
        </h3>

        <p class="text-4xl font-bold text-orange-500">
            {{ \App\Models\User::count() }}
        </p>

    </div>

    <!-- MENUNGGU -->
    <div class="bg-white rounded-2xl shadow-lg p-5 text-center flex flex-col justify-between min-h-[140px]">

        <h3 class="text-gray-500 text-sm h-10 flex items-center justify-center">
            Menunggu Verifikasi
        </h3>

        <p class="text-4xl font-bold text-yellow-500">
            {{ \App\Models\Laporan::where('status_verifikasi','Menunggu')->count() }}
        </p>

    </div>

    <!-- DIVERIFIKASI -->
    <div class="bg-white rounded-2xl shadow-lg p-5 text-center flex flex-col justify-between min-h-[140px]">

        <h3 class="text-gray-500 text-sm h-10 flex items-center justify-center">
            Diverifikasi
        </h3>

        <p class="text-4xl font-bold text-green-600">
            {{ \App\Models\Laporan::where('status_verifikasi','Diverifikasi')->count() }}
        </p>

    </div>

    <!-- DITOLAK -->
    <div class="bg-white rounded-2xl shadow-lg p-5 text-center flex flex-col justify-between min-h-[140px]">

        <h3 class="text-gray-500 text-sm h-10 flex items-center justify-center">
            Ditolak
        </h3>

        <p class="text-4xl font-bold text-red-600">
            {{ \App\Models\Laporan::where('status_verifikasi','Ditolak')->count() }}
        </p>

    </div>

</div>

<!-- INFORMASI DAN STATUS -->
<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <!-- INFORMASI -->
    <div class="lg:col-span-2 bg-white rounded-2xl shadow-lg p-8">

        <h2 class="text-2xl font-bold text-slate-800 mb-4">
            Selamat Datang Administrator
        </h2>

        <p class="text-gray-600 leading-relaxed mb-8">
            Sistem Monitoring P3AKB digunakan untuk mengelola data kasus,
            monitoring statistik, analisis data dan rekomendasi kebijakan
            secara terintegrasi.
        </p>

        <!-- MENU CEPAT -->
        <div class="grid grid-cols-3 gap-4 mb-8">

            <div class="bg-blue-50 p-4 rounded-xl text-center">
                <p class="text-blue-600 font-semibold">
                    Monitoring
                </p>
            </div>

            <div class="bg-amber-50 p-4 rounded-xl text-center">
                <p class="text-amber-600 font-semibold">
                    Analisis
                </p>
            </div>

            <div class="bg-emerald-50 p-4 rounded-xl text-center">
                <p class="text-emerald-600 font-semibold">
                    Prediksi
                </p>
            </div>

        </div>

        <!-- RINGKASAN -->
        <div class="bg-slate-50 rounded-xl p-6">

            <h3 class="font-bold text-lg mb-4">
                Ringkasan Sistem
            </h3>

            <div class="grid grid-cols-2 gap-4 text-gray-700">

                <div>
                    Total Kasus :
                    <strong>{{ \App\Models\Kasus::count() }}</strong>
                </div>

                <div>
                    Total Laporan :
                    <strong>{{ \App\Models\Laporan::count() }}</strong>
                </div>

                <div>
                    Laporan Menunggu :
                    <strong>{{ \App\Models\Laporan::where('status_verifikasi','Menunggu')->count() }}</strong>
                </div>

                <div>
                    Laporan Diverifikasi :
                    <strong>{{ \App\Models\Laporan::where('status_verifikasi','Diverifikasi')->count() }}</strong>
                </div>

            </div>

        </div>

    </div>

    <!-- STATUS SISTEM -->
    <div class="bg-white rounded-2xl shadow-lg p-8 text-center">

        <h3 class="text-xl font-bold text-slate-700 mb-6">
            Status Sistem
        </h3>

        <div class="w-36 h-36 mx-auto rounded-full border-[12px]
                    border-blue-600 flex items-center justify-center">

            <span class="text-3xl font-bold text-blue-600">
                100%
            </span>

        </div>

        <p class="mt-6 text-gray-600">
            Sistem berjalan normal
        </p>

    </div>

</div>
```

</div>

@endsection