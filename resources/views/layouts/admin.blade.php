<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>Admin P3AKB</title>

    @vite(['resources/css/app.css'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            overflow-x: hidden;
        }

        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 176px;
            z-index: 50;
            overflow-y: auto;
        }

        .admin-main {
            margin-left: 176px;
            min-height: 100vh;
        }

        .admin-header {
            height: 58px;
            position: sticky;
            top: 0;
            z-index: 40;
        }

        @media (max-width: 768px) {

            .admin-sidebar {
                width: 150px;
            }

            .admin-main {
                margin-left: 150px;
            }
        }
    </style>
</head>

<body class="bg-slate-200">

    <!-- =========================================================
         SIDEBAR ADMIN
    ========================================================== -->

    <aside class="admin-sidebar bg-blue-950 text-white flex flex-col">

        <!-- BRAND -->
        <div class="px-4 py-5 border-b border-blue-800">

            <div class="text-left">

                <div class="text-lg font-bold leading-tight tracking-wide text-white">
                    APLIKASI
                </div>

                <div class="text-lg font-bold leading-tight tracking-wide text-white">
                    MONITORING
                </div>

                <div class="text-[9px] text-blue-200 mt-1">
                    P3AKB Kalimantan Selatan
                </div>

            </div>

        </div>


        <!-- PROFILE -->
        <div class="px-4 py-5 border-b border-blue-800">

            <div class="flex justify-center">

                <div class="w-16 h-16 rounded-full bg-white
                            flex items-center justify-center">

                    <i class="fa-regular fa-user
                              text-3xl text-blue-950"></i>

                </div>

            </div>

            <div class="text-center mt-3">

                <h3 class="font-bold text-sm">
                    {{ auth()->user()->name }}
                </h3>

                <p class="text-xs text-blue-200 mt-1">
                    Administrator
                </p>

            </div>

        </div>


        <!-- MENU -->
        <div class="px-3 py-4 flex-1">

            <p class="text-[9px] uppercase tracking-wide
                      text-blue-300 px-2 mb-3">
                Menu Admin
            </p>


            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
               class="flex items-center gap-3 px-3 py-2.5 mb-1
                      rounded-lg transition
                      {{ request()->routeIs('admin.dashboard')
                            ? 'bg-blue-600'
                            : 'hover:bg-blue-800' }}">

                <i class="fa-solid fa-house text-sm w-4 text-center"></i>

                <span class="text-xs font-medium">
                    Dashboard
                </span>

            </a>


            <!-- Manajemen Pengguna -->
            <a href="{{ route('admin.pengguna') }}"
               class="flex items-center gap-3 px-3 py-2.5 mb-1
                      rounded-lg transition
                      {{ request()->routeIs('admin.pengguna*')
                            ? 'bg-blue-600'
                            : 'hover:bg-blue-800' }}">

                <i class="fa-solid fa-users text-sm w-4 text-center"></i>

                <span class="text-xs font-medium">
                    Manajemen Pengguna
                </span>

            </a>


            <!-- Kelola Laporan -->
            <a href="{{ route('laporan.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 mb-1
                      rounded-lg transition
                      {{ request()->routeIs('laporan.index', 'laporan.create', 'laporan.show', 'laporan.edit')
                            ? 'bg-blue-600'
                            : 'hover:bg-blue-800' }}">

                <i class="fa-solid fa-file-lines text-sm w-4 text-center"></i>

                <span class="text-xs font-medium">
                    Kelola Laporan
                </span>

            </a>


            <!-- Riwayat Laporan -->
            <a href="{{ route('laporan.riwayat') }}"
               class="flex items-center gap-3 px-3 py-2.5 mb-1
                      rounded-lg transition
                      {{ request()->routeIs('laporan.riwayat')
                            ? 'bg-blue-600'
                            : 'hover:bg-blue-800' }}">

                <i class="fa-solid fa-clock-rotate-left text-sm w-4 text-center"></i>

                <span class="text-xs font-medium">
                    Riwayat Laporan
                </span>

            </a>


            <!-- Data Kasus -->
            <a href="{{ route('kasus.index') }}"
               class="flex items-center gap-3 px-3 py-2.5 mb-1
                      rounded-lg transition
                      {{ request()->routeIs('kasus.*')
                            ? 'bg-blue-600'
                            : 'hover:bg-blue-800' }}">

                <i class="fa-solid fa-folder-open text-sm w-4 text-center"></i>

                <span class="text-xs font-medium">
                    Data Kasus
                </span>

            </a>


            <!-- Monitoring -->
            <a href="{{ route('admin.monitoring.index', request()->filled('tahun') ? ['tahun' => request('tahun')] : []) }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition
               {{ request()->routeIs('admin.monitoring.index')
                   ? 'bg-blue-600 text-white'
                   : 'text-white hover:bg-white/10' }}">

                <svg class="w-5 h-5 flex-shrink-0"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M3 3v18h18M7 16l4-5 3 3 5-7"/>
                </svg>

                <span>
                    Monitoring
                </span>

            </a>


            <!-- Analisis -->
            <a href="{{ route('admin.analisis.index', request()->filled('tahun') ? ['tahun' => request('tahun')] : []) }}"
               class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm transition
               {{ request()->routeIs('admin.analisis.index')
                   ? 'bg-blue-600 text-white'
                   : 'text-white hover:bg-white/10' }}">

                <svg class="w-5 h-5 flex-shrink-0"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 19V5
                             M4 19h16
                             M8 16v-5
                             M12 16V8
                             M16 16v-3"/>
                </svg>

                <span>
                    Analisis &amp; Prediksi
                </span>

            </a>


            <!-- Rekomendasi -->
            <a href="{{ route('admin.rekomendasi.index', request()->filled('tahun') ? ['tahun' => request('tahun')] : []) }}"
               class="flex items-center gap-3 px-3 py-2.5 mb-1
                      rounded-lg transition
                      {{ request()->routeIs('admin.rekomendasi.*')
                            ? 'bg-blue-600'
                            : 'hover:bg-blue-800' }}">

                <i class="fa-solid fa-lightbulb text-sm w-4 text-center"></i>

                <span class="text-xs font-medium">
                    Rekomendasi
                </span>

            </a>

        </div>


        <!-- LOGOUT -->
        <div class="px-3 py-4 border-t border-blue-800">

            <form method="POST"
                  action="{{ route('logout') }}">

                @csrf

                <button type="submit"
                        class="w-full flex items-center gap-3
                               px-3 py-2.5 rounded-lg
                               text-red-400
                               hover:bg-blue-800
                               transition">

                    <i class="fa-solid fa-right-from-bracket
                              text-sm w-4 text-center"></i>

                    <span class="text-xs font-medium">
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    <!-- =========================================================
         MAIN
    ========================================================== -->

    <main class="admin-main">

        <!-- HEADER -->
        <header class="admin-header bg-white border-b border-slate-200
                       flex items-center justify-between px-5">

            <!-- LOGO + INSTANSI -->
            <div class="flex items-center gap-3">

                <img
                    src="{{ asset('images/logo-p3akb.svg') }}"
                    alt="Logo P3AKB"
                    class="w-10 h-10 object-contain">

                <div>

                    <h1 class="font-bold text-sm text-slate-800">
                        Aplikasi Monitoring
                    </h1>

                    <p class="text-[9px] text-slate-500">
                        Dinas P3AKB Provinsi Kalimantan Selatan
                    </p>

                </div>

            </div>


            <!-- ADMIN -->
            <div class="text-right">

                <p class="text-xs font-semibold text-slate-800">
                    {{ auth()->user()->name }}
                </p>

                <p class="text-[9px] text-slate-500">
                    Administrator
                </p>

            </div>

        </header>


        <!-- CONTENT -->
        <div class="p-5">

            @yield('content')

        </div>

    </main>

</body>

</html>