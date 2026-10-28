@extends('layouts.admin')

@section('content')

<div class="min-h-screen bg-slate-100 p-6 md:p-8">

    {{-- =========================================================
         HEADER DASHBOARD
    ========================================================== --}}

    <div class="mb-7">

        <div class="flex items-center gap-3">

            <div class="w-11 h-11 rounded-xl bg-blue-100
                        flex items-center justify-center">

                <i class="fa-solid fa-gauge-high text-blue-600 text-lg"></i>

            </div>

            <div>

                <h1 class="text-2xl md:text-3xl font-bold text-slate-800">
                    Dashboard Administrator
                </h1>

                <p class="text-sm text-slate-500 mt-1">
                    Kelola pengguna, hak akses, dan informasi sistem monitoring P3AKB.
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
         STATISTIK PENGGUNA
    ========================================================== --}}

    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 mb-6">


        {{-- TOTAL USER --}}

        <div class="bg-white rounded-2xl shadow-sm
                    border border-slate-200 p-5
                    border-l-4 border-l-blue-600">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total User
                    </p>

                    <p class="text-3xl font-bold text-blue-600 mt-2">
                        {{ $totalUser }}
                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Pengguna aplikasi
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-user text-blue-600 text-xl"></i>

                </div>

            </div>

        </div>


        {{-- TOTAL OPERATOR --}}

        <div class="bg-white rounded-2xl shadow-sm
                    border border-slate-200 p-5
                    border-l-4 border-l-emerald-500">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Operator
                    </p>

                    <p class="text-3xl font-bold text-emerald-600 mt-2">
                        {{ $totalOperator }}
                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Pengelola data operasional
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-emerald-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-user-gear
                              text-emerald-600 text-xl"></i>

                </div>

            </div>

        </div>


        {{-- TOTAL ADMINISTRATOR --}}

        <div class="bg-white rounded-2xl shadow-sm
                    border border-slate-200 p-5
                    border-l-4 border-l-indigo-500">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Administrator
                    </p>

                    <p class="text-3xl font-bold text-indigo-600 mt-2">
                        {{ $totalAdmin }}
                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Pengelola sistem
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-indigo-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-shield-halved
                              text-indigo-600 text-xl"></i>

                </div>

            </div>

        </div>


        {{-- TOTAL AKUN SISTEM --}}

        <div class="bg-white rounded-2xl shadow-sm
                    border border-slate-200 p-5
                    border-l-4 border-l-blue-800">

            <div class="flex items-center justify-between">

                <div>

                    <p class="text-sm text-slate-500">
                        Total Akun Sistem
                    </p>

                    <p class="text-3xl font-bold text-blue-800 mt-2">
                        {{ $totalUser + $totalOperator + $totalAdmin }}
                    </p>

                    <p class="text-xs text-slate-400 mt-1">
                        Seluruh akun terdaftar
                    </p>

                </div>

                <div class="w-12 h-12 rounded-xl bg-blue-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-users
                              text-blue-700 text-xl"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         STATUS SISTEM + HAK AKSES
    ========================================================== --}}

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">


        {{-- =====================================================
             STATUS SISTEM
        ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-sm
                    border border-slate-200 overflow-hidden">

            {{-- SECTION HEADER --}}

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 px-5 py-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-server text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-slate-800">
                            Status Sistem
                        </h2>

                        <p class="text-xs text-slate-500 mt-0.5">
                            Kondisi operasional aplikasi
                        </p>

                    </div>

                </div>

            </div>


            {{-- CONTENT --}}

            <div class="p-5">

                <div class="flex items-center gap-3
                            bg-emerald-50
                            border border-emerald-100
                            rounded-xl p-4">

                    <div class="w-9 h-9 rounded-lg bg-emerald-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-circle-check
                                  text-emerald-600"></i>

                    </div>

                    <div>

                        <p class="text-sm font-semibold text-emerald-700">
                            Sistem Berjalan Normal
                        </p>

                        <p class="text-xs text-emerald-600 mt-1">
                            Sistem monitoring P3AKB dapat digunakan.
                        </p>

                    </div>

                </div>

            </div>

        </div>


        {{-- =====================================================
             HAK AKSES
        ====================================================== --}}

        <div class="bg-white rounded-2xl shadow-sm
                    border border-slate-200 overflow-hidden">

            {{-- SECTION HEADER --}}

            <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                        border-b border-blue-100 px-5 py-4">

                <div class="flex items-center gap-3">

                    <div class="w-10 h-10 rounded-xl bg-blue-100
                                flex items-center justify-center">

                        <i class="fa-solid fa-lock text-blue-600"></i>

                    </div>

                    <div>

                        <h2 class="font-bold text-slate-800">
                            Ringkasan Hak Akses
                        </h2>

                        <p class="text-xs text-slate-500 mt-0.5">
                            Pembagian peran pengguna sistem
                        </p>

                    </div>

                </div>

            </div>


            {{-- CONTENT --}}

            <div class="p-5">

                <div class="space-y-3">


                    {{-- USER --}}

                    <div class="flex items-center justify-between
                                bg-slate-50 hover:bg-blue-50
                                border border-slate-100
                                rounded-xl px-4 py-3 transition">

                        <div class="flex items-center gap-3">

                            <div class="w-8 h-8 rounded-lg bg-blue-100
                                        flex items-center justify-center">

                                <i class="fa-solid fa-user text-blue-600 text-sm"></i>

                            </div>

                            <span class="text-sm font-medium text-slate-700">
                                User
                            </span>

                        </div>

                        <span class="text-sm font-bold text-blue-600">
                            {{ $totalUser }}
                        </span>

                    </div>


                    {{-- OPERATOR --}}

                    <div class="flex items-center justify-between
                                bg-slate-50 hover:bg-blue-50
                                border border-slate-100
                                rounded-xl px-4 py-3 transition">

                        <div class="flex items-center gap-3">

                            <div class="w-8 h-8 rounded-lg bg-emerald-100
                                        flex items-center justify-center">

                                <i class="fa-solid fa-user-gear
                                          text-emerald-600 text-sm"></i>

                            </div>

                            <span class="text-sm font-medium text-slate-700">
                                Operator
                            </span>

                        </div>

                        <span class="text-sm font-bold text-emerald-600">
                            {{ $totalOperator }}
                        </span>

                    </div>


                    {{-- ADMINISTRATOR --}}

                    <div class="flex items-center justify-between
                                bg-slate-50 hover:bg-blue-50
                                border border-slate-100
                                rounded-xl px-4 py-3 transition">

                        <div class="flex items-center gap-3">

                            <div class="w-8 h-8 rounded-lg bg-indigo-100
                                        flex items-center justify-center">

                                <i class="fa-solid fa-shield-halved
                                          text-indigo-600 text-sm"></i>

                            </div>

                            <span class="text-sm font-medium text-slate-700">
                                Administrator
                            </span>

                        </div>

                        <span class="text-sm font-bold text-indigo-600">
                            {{ $totalAdmin }}
                        </span>

                    </div>


                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         INFORMASI ADMINISTRATOR
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-sm
                border border-slate-200 overflow-hidden mb-6">


        {{-- SECTION HEADER --}}

        <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                    border-b border-blue-100 px-5 py-4">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-blue-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-circle-info text-blue-600"></i>

                </div>

                <div>

                    <h2 class="font-bold text-slate-800">
                        Informasi Administrator
                    </h2>

                    <p class="text-xs text-slate-500 mt-0.5">
                        Fungsi dan tanggung jawab administrator sistem
                    </p>

                </div>

            </div>

        </div>


        {{-- CONTENT --}}

        <div class="p-5">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                {{-- MANAJEMEN PENGGUNA --}}

                <div class="bg-slate-50 border border-slate-200
                            rounded-xl p-5
                            hover:border-blue-200 hover:bg-blue-50/40
                            transition">

                    <div class="w-10 h-10 rounded-lg bg-blue-100
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-users text-blue-600"></i>

                    </div>

                    <h3 class="font-semibold text-sm text-slate-800">
                        Manajemen Pengguna
                    </h3>

                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Mengelola akun pengguna dan pembagian hak akses sistem.
                    </p>

                </div>


                {{-- ANALISIS & PREDIKSI --}}

                <div class="bg-slate-50 border border-slate-200
                            rounded-xl p-5
                            hover:border-blue-200 hover:bg-blue-50/40
                            transition">

                    <div class="w-10 h-10 rounded-lg bg-blue-100
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-chart-line text-blue-600"></i>

                    </div>

                    <h3 class="font-semibold text-sm text-slate-800">
                        Analisis & Prediksi
                    </h3>

                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Melihat hasil analisis dan prediksi data kasus.
                    </p>

                </div>


                {{-- REKOMENDASI --}}

                <div class="bg-slate-50 border border-slate-200
                            rounded-xl p-5
                            hover:border-blue-200 hover:bg-blue-50/40
                            transition">

                    <div class="w-10 h-10 rounded-lg bg-blue-100
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-lightbulb text-blue-600"></i>

                    </div>

                    <h3 class="font-semibold text-sm text-slate-800">
                        Rekomendasi
                    </h3>

                    <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                        Melihat rekomendasi berdasarkan hasil analisis sistem.
                    </p>

                </div>


            </div>

        </div>

    </div>


    {{-- =========================================================
         AKSES CEPAT
    ========================================================== --}}

    <div class="bg-white rounded-2xl shadow-sm
                border border-slate-200 overflow-hidden">


        {{-- SECTION HEADER --}}

        <div class="bg-gradient-to-r from-blue-50 via-indigo-50 to-white
                    border-b border-blue-100 px-5 py-4">

            <div class="flex items-center gap-3">

                <div class="w-10 h-10 rounded-xl bg-blue-100
                            flex items-center justify-center">

                    <i class="fa-solid fa-bolt text-blue-600"></i>

                </div>

                <div>

                    <h2 class="font-bold text-slate-800">
                        Akses Cepat
                    </h2>

                    <p class="text-xs text-slate-500 mt-0.5">
                        Akses menu utama administrator
                    </p>

                </div>

            </div>

        </div>


        {{-- CONTENT --}}

        <div class="p-5">

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">


                {{-- =================================================
                     MANAJEMEN PENGGUNA
                ================================================== --}}

                <a
                    href="{{ route('admin.pengguna') }}"
                    class="group bg-blue-600 hover:bg-blue-700
                           text-white rounded-xl p-5 transition
                           shadow-sm hover:shadow-md"
                >

                    <div class="w-10 h-10 rounded-lg
                                bg-white/15
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-users text-lg"></i>

                    </div>

                    <h3 class="font-bold">
                        Manajemen Pengguna
                    </h3>

                    <p class="text-xs text-blue-100 mt-2 leading-relaxed">
                        Kelola akun dan hak akses pengguna.
                    </p>

                    <div class="mt-5 text-xs font-semibold
                                flex items-center gap-2">

                        Buka Menu

                        <i class="fa-solid fa-arrow-right
                                  transition-transform
                                  group-hover:translate-x-1"></i>

                    </div>

                </a>


                {{-- =================================================
                     ANALISIS & PREDIKSI
                ================================================== --}}

                <a
                    href="{{ route('admin.analisis.index') }}"
                    class="group bg-blue-800 hover:bg-blue-900
                           text-white rounded-xl p-5 transition
                           shadow-sm hover:shadow-md"
                >

                    <div class="w-10 h-10 rounded-lg
                                bg-white/15
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-chart-line text-lg"></i>

                    </div>

                    <h3 class="font-bold">
                        Analisis & Prediksi
                    </h3>

                    <p class="text-xs text-blue-100 mt-2 leading-relaxed">
                        Lihat hasil analisis dan prediksi kasus.
                    </p>

                    <div class="mt-5 text-xs font-semibold
                                flex items-center gap-2">

                        Buka Menu

                        <i class="fa-solid fa-arrow-right
                                  transition-transform
                                  group-hover:translate-x-1"></i>

                    </div>

                </a>


                {{-- =================================================
                     REKOMENDASI
                ================================================== --}}

                <a
                    href="{{ route('admin.rekomendasi.index') }}"
                    class="group bg-slate-700 hover:bg-slate-800
                           text-white rounded-xl p-5 transition
                           shadow-sm hover:shadow-md"
                >

                    <div class="w-10 h-10 rounded-lg
                                bg-white/15
                                flex items-center justify-center mb-4">

                        <i class="fa-solid fa-lightbulb text-lg"></i>

                    </div>

                    <h3 class="font-bold">
                        Rekomendasi
                    </h3>

                    <p class="text-xs text-slate-200 mt-2 leading-relaxed">
                        Lihat rekomendasi berdasarkan data.
                    </p>

                    <div class="mt-5 text-xs font-semibold
                                flex items-center gap-2">

                        Buka Menu

                        <i class="fa-solid fa-arrow-right
                                  transition-transform
                                  group-hover:translate-x-1"></i>

                    </div>

                </a>


            </div>

        </div>

    </div>


</div>

@endsection