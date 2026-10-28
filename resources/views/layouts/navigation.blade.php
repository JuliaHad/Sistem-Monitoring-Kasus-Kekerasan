<nav class="bg-slate-100 min-h-screen">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-64 bg-[#123B68] text-white shadow-xl">

            <!-- LOGO -->
            <div class="p-6 border-b border-blue-800">

                <h1 class="text-3xl font-bold leading-tight">
                    APLIKASI
                    <br>
                    MONITORING
                </h1>

            </div>

            <!-- PROFILE -->
            <div class="flex flex-col items-center py-8">

                <div class="w-24 h-24 rounded-full bg-white flex items-center justify-center shadow-lg">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-12 h-12 text-[#123B68]"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M5.121 17.804A9.955 9.955 0 0112 15c2.21 0 4.253.714 5.879 1.924M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>

                    </svg>

                </div>

                <h3 class="mt-4 font-semibold text-lg">
                    {{ Auth::user()->name }}
                </h3>

                <p class="text-blue-200 text-sm">
                    Administrator
                </p>

            </div>

            <!-- MENU -->
<div class="px-4 pb-6">

    <ul class="space-y-2">

        <!-- DASHBOARD -->
        <li>
            <a href="{{ route('user.dashboard') }}"
   class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

    <!-- SVG Dashboard -->

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
        </li>

        <!-- KELOLA LAPORAN -->
        <li>
<a href="{{ route('laporan.index') }}"
   class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

    <!-- SVG Kelola Laporan -->

    <svg xmlns="http://www.w3.org/2000/svg"
     class="w-5 h-5"
     fill="none"
     viewBox="0 0 24 24"
     stroke="currentColor">

    <path stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>

</svg>

    <span>Kelola Laporan</span>

</a>
        </li>

        <li>
            <a href="{{ route('laporan.riwayat') }}"
   class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

    <!-- SVG Riwayat Laporan -->

    <svg xmlns="http://www.w3.org/2000/svg"
     class="w-5 h-5"
     fill="none"
     viewBox="0 0 24 24"
     stroke="currentColor">

    <path stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>

</svg>

    <span>Riwayat Laporan</span>

</a>
        </li>

        <!-- DATA KASUS -->
        <li>
            <a href="{{ route('kasus.index') }}"
   class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

    <!-- SVG Data Kasus -->

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
        </li>

        <!-- MONITORING -->
        <li>
             <a href="{{ route('admin.monitoring.index') }}"
   class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

    <!-- SVG Monitoring -->

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

        </li>

        <!-- ANALISIS -->
        <li>
            <a href="{{ route('admin.analisis.index') }}"
   class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

    <!-- SVG Analisis & Prediksi -->

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
        </li>

        <!-- REKOMENDASI -->
        <li>
            <a href="{{ route('admin.rekomendasi.index') }}"
   class="flex items-center gap-3 p-3 rounded hover:bg-blue-800">

    <!-- SVG Rekomendasi -->

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
        </li>

    </ul>

</div>

        <!-- LOGOUT -->
<div class="mt-auto px-4 pb-6 border-t border-blue-700 pt-4">

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

        </aside>

        <!-- CONTENT -->
        <div class="flex-1 bg-slate-100">

            <!-- TOPBAR -->
<header class="bg-white shadow-sm px-8 py-4 flex justify-between items-center">

    <div class="flex items-center gap-3">

        <img
            src="{{ asset('images/logo-p3akb.svg') }}"
            alt="Logo P3AKB"
            class="w-16 h-16 object-contain">

        <div>

            <h1 class="font-bold text-xl text-slate-800">
                Sistem Monitoring
            </h1>

            <p class="text-xs text-slate-500">
                Dinas P3AKB Provinsi Kalimantan Selatan
            </p>

        </div>

    </div>

    <div class="text-right">

        <p class="font-semibold text-slate-700">
            {{ Auth::user()->name }}
        </p>

        <p class="text-sm text-gray-500">
            Administrator
        </p>

    </div>

</header>

            <!-- PAGE CONTENT -->
            <main class="p-8">

                @yield('content')

            </main>

        </div>

    </div>

</nav>