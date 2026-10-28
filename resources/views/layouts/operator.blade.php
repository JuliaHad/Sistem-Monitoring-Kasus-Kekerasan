<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Operator P3AKB</title>

    @vite(['resources/css/app.css'])

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    >

</head>

<body class="bg-slate-200">

<div class="flex min-h-screen">

    <!-- =====================================================
         SIDEBAR OPERATOR
         DESAIN DISAMAKAN DENGAN SIDEBAR USER
    ====================================================== -->

    <aside class="w-64 bg-blue-950 text-white flex flex-col fixed inset-y-0 left-0 z-40">

        <!-- LOGO / JUDUL -->

        <div class="px-6 py-6 border-b border-blue-800">

            <div class="flex items-center gap-3">


                <div>

                    <h1 class="font-bold text-lg">
                        APLIKASI
                    </h1>

                    <h1 class="font-bold text-lg">
                        MONITORING
                    </h1>

                    <p class="text-xs text-blue-200">
                        P3AKB Kalimantan Selatan
                    </p>

                </div>

            </div>

        </div>


        <!-- =================================================
             PROFIL OPERATOR
        ================================================== -->

        <div class="px-6 py-6 border-b border-blue-800 text-center">

            <div class="w-24 h-24 bg-white rounded-full mx-auto flex items-center justify-center">

                <i class="fa-regular fa-user text-4xl text-blue-900"></i>

            </div>

            <h2 class="font-bold text-lg mt-4">

                {{ auth()->user()->name ?? 'Operator P3AKB' }}

            </h2>

            <p class="text-sm text-blue-200">

                Operator

            </p>

        </div>


        <!-- =================================================
             MENU OPERATOR
        ================================================== -->

        <nav class="flex-1 px-4 py-5 overflow-y-auto">

            <p class="text-xs text-blue-300 uppercase tracking-wider mb-4 px-2">
                Menu Operator
            </p>


            <!-- Dashboard -->

            <a
                href="{{ route('operator.dashboard') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2
                {{ request()->routeIs('operator.dashboard')
                    ? 'bg-blue-600'
                    : 'hover:bg-blue-900' }}"
            >

                <i class="fa-solid fa-house w-5"></i>

                <span>
                    Dashboard
                </span>

            </a>


            <!-- Riwayat Laporan -->

            <a
                href="{{ route('operator.laporan.riwayat') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2
                {{ request()->routeIs('operator.laporan.riwayat')
                    ? 'bg-blue-600'
                    : 'hover:bg-blue-900' }}"
            >

                <i class="fa-regular fa-clock w-5"></i>

                <span>
                    Riwayat Laporan
                </span>

            </a>


            <!-- Data Kasus -->

            <a
                href="{{ route('operator.kasus.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2
                {{ request()->routeIs('operator.kasus.*')
                    ? 'bg-blue-600'
                    : 'hover:bg-blue-900' }}"
            >

                <i class="fa-solid fa-bars w-5"></i>

                <span>
                    Data Kasus
                </span>

            </a>


            <!-- Monitoring -->

            <a
                href="{{ route('operator.monitoring.index') }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2
                {{ request()->routeIs('operator.monitoring.*')
                    ? 'bg-blue-600'
                    : 'hover:bg-blue-900' }}"
            >

                <i class="fa-solid fa-chart-column w-5"></i>

                <span>
                    Monitoring
                </span>

            </a>


            <!-- Analisis & Prediksi -->

            <a href="{{ route('operator.analisis.index', ['tahun' => request('tahun')]) }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2
                {{ request()->routeIs('operator.analisis.*')
                    ? 'bg-blue-600'
                    : 'hover:bg-blue-900' }}"
            >

                <i class="fa-solid fa-chart-line w-5"></i>

                <span>
                    Analisis & Prediksi
                </span>

            </a>


            <!-- Rekomendasi -->

            <a href="{{ route('operator.rekomendasi.index', ['tahun' => request('tahun')]) }}"
                class="flex items-center gap-3 px-4 py-3 rounded-lg mb-2
                {{ request()->routeIs('operator.rekomendasi.*')
                    ? 'bg-blue-600'
                    : 'hover:bg-blue-900' }}"
            >

                <i class="fa-solid fa-lightbulb w-5"></i>

                <span>
                    Rekomendasi
                </span>

            </a>

        </nav>


        <!-- =================================================
             LOGOUT
        ================================================== -->

        <div class="px-4 py-4 border-t border-blue-800">

            <form
                method="POST"
                action="{{ route('logout') }}"
            >

                @csrf

                <button
                    type="submit"
                    class="w-full flex items-center gap-3 px-4 py-3 rounded-lg
                           text-red-400 hover:bg-red-500 hover:text-white transition"
                >

                    <i class="fa-solid fa-right-from-bracket w-5"></i>

                    <span>
                        Logout
                    </span>

                </button>

            </form>

        </div>

    </aside>


    <!-- =====================================================
         AREA KONTEN
    ====================================================== -->

    <div class="flex-1 ml-64">

        <!-- HEADER -->

        <header class="bg-white shadow-sm h-16 flex items-center justify-between px-8">

    <div class="flex items-center gap-4">

        <img
            src="{{ asset('images/logo-p3akb.svg') }}"
            alt="Logo Provinsi Kalimantan Selatan"
            class="h-12 w-auto object-contain"
        >

        <div>
            <h1 class="text-lg font-semibold text-slate-800">
                Aplikasi Monitoring
            </h1>

            <p class="text-xs text-slate-500">
                Dinas P3AKB Provinsi Kalimantan Selatan
            </p>
        </div>

    </div>

    <div class="text-right">

        <p class="font-semibold text-sm text-slate-800">
            {{ auth()->user()->name ?? 'Operator P3AKB' }}
        </p>

        <p class="text-xs text-slate-500">
            Operator
        </p>

    </div>

</header>


        <!-- CONTENT -->

        <main>

            @yield('content')

        </main>

    </div>

</div>

</body>

</html>