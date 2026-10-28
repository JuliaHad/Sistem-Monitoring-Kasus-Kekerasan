<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>P3AKB User</title>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-slate-200">

<!-- =========================================================
     SIDEBAR
     ========================================================= -->

<div class="fixed top-0 left-0 w-72 h-screen bg-blue-950 text-white overflow-y-auto z-50">

    <!-- Judul Sidebar -->
    <div class="p-6 border-b border-blue-800">

        <h1 class="text-4xl font-bold leading-tight">
            APLIKASI
            <br>
            MONITORING
        </h1>

    </div>


    <!-- Profil User -->
    <div class="flex flex-col items-center py-8">

        <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center">

            <i class="fa-regular fa-user text-4xl text-blue-950"></i>

        </div>

        <h3 class="mt-4 text-xl font-semibold">
            {{ auth()->user()->name }}
        </h3>

        <p class="text-blue-200">
            User
        </p>

    </div>


    <!-- MENU -->
    <div class="px-6 space-y-2 pb-6">

        <!-- Dashboard -->
        <a href="{{ route('user.dashboard') }}"
           class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l2-2m0 0l7-7 7 7m-9 11V9m0 12H5a2 2 0 01-2-2V10m16 10a2 2 0 002-2V10m-5 11h5"/>

            </svg>

            <span>Dashboard</span>

        </a>


        <!-- Lapor Kasus -->
        <a href="{{ route('lapor-kasus.index') }}"
           class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 12h6m-6 4h6M7 4h10a2 2 0 012 2v12a2 2 0 01-2 2H7a2 2 0 01-2-2V6a2 2 0 012-2z"/>

            </svg>

            <span>Lapor Kasus</span>

        </a>


        <!-- Data Kasus -->
        <a href="{{ route('user.kasus') }}"
           class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M4 7h16M4 12h16M4 17h16"/>

            </svg>

            <span>Data Kasus</span>

        </a>


        <!-- Monitoring -->
        <a href="{{ route('user.monitoring', ['tahun' => request('tahun')]) }}"
           class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M9 17v-6m4 6V7m4 10V4"/>

            </svg>

            <span>Monitoring</span>

        </a>


        <!-- Analisis & Prediksi -->
        <a href="{{ route('user.analisis', ['tahun' => request('tahun')]) }}"
           class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M7 17l4-4 4 4 4-8"/>

            </svg>

            <span>Analisis & Prediksi</span>

        </a>


        <!-- Rekomendasi -->
        <a href="{{ route('user.rekomendasi', ['tahun' => request('tahun')]) }}"
           class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="w-5 h-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M13 10V3L4 14h7v7l9-11h-7z"/>

            </svg>

            <span>Rekomendasi</span>

        </a>

    </div>


    <!-- LOGOUT -->
    <div class="absolute bottom-0 left-0 w-full px-4 pb-6 pt-4 border-t border-blue-700 bg-blue-950">

        <form method="POST" action="{{ route('logout') }}">

            @csrf

            <button
                type="submit"
                class="w-full flex items-center gap-3 px-4 py-3 text-red-400 hover:bg-blue-700 rounded-xl transition">

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a2 2 0 01-2 2H6a2 2 0 01-2-2V7a2 2 0 012-2h5a2 2 0 012 2v1"/>

                </svg>

                Logout

            </button>

        </form>

    </div>

</div>


<!-- =========================================================
     CONTENT AREA
     ========================================================= -->

<div class="ml-72 min-h-screen">

    <!-- HEADER -->
    <div class="bg-white border-b border-slate-200">

        <div class="flex items-center gap-3 px-6 py-2">

            <img
                src="{{ asset('images/logo-p3akb.svg') }}"
                alt="Logo P3AKB"
                class="w-16 h-16 object-contain">

            <div>

                <h1 class="font-bold text-xl text-slate-800">
                    Aplikasi Monitoring
                </h1>

                <p class="text-xs text-slate-500">
                    Dinas P3AKB Provinsi Kalimantan Selatan
                </p>

            </div>

        </div>

    </div>


    <!-- PAGE CONTENT -->
    <main class="p-10">

        @yield('content')

    </main>

</div>


</body>
</html>