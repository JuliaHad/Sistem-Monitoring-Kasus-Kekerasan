<x-app-layout>

    <div class="min-h-screen bg-gray-100 p-6">

        <!-- HEADER -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-slate-800">
                Dashboard Monitoring
            </h1>

            <p class="text-gray-500 mt-1">
                Sistem Monitoring Data Kekerasan Perempuan dan Anak
            </p>
        </div>

        <!-- CARD STATISTIK -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

            <!-- TOTAL -->
            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-gray-500 text-sm mb-2">
                    Total Laporan
                </h2>

                <div class="text-4xl font-bold text-emerald-600">
                    {{ $total }}
                </div>

            </div>

            <!-- HARI INI -->
            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-gray-500 text-sm mb-2">
                    Laporan Hari Ini
                </h2>

                <div class="text-4xl font-bold text-blue-600">
                    {{ $hariIni }}
                </div>

            </div>

            <!-- TREND -->
            <div class="bg-white rounded-2xl shadow p-6">

                <h2 class="text-gray-500 text-sm mb-2">
                    Status Sistem
                </h2>

                <div class="text-xl font-semibold text-green-600">
                    Aktif
                </div>

            </div>

        </div>

        <!-- MENU FITUR -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

            <!-- KELOLA -->
            <a href="{{ route('user.dashboard')) }}"
               class="bg-white rounded-2xl shadow p-8 hover:shadow-xl transition">

                <div class="text-4xl mb-4">
                    📁
                </div>

                <h2 class="text-xl font-bold text-slate-800 mb-2">
                    Kelola Data
                </h2>

                <p class="text-gray-500">
                    Tambah, edit, dan hapus data laporan.
                </p>

            </a>

            <!-- MONITORING -->
            <a href="{{ route('user.monitoring') }}"
               class="bg-white rounded-2xl shadow p-8 hover:shadow-xl transition">

                <div class="text-4xl mb-4">
                    📊
                </div>

                <h2 class="text-xl font-bold text-slate-800 mb-2">
                    Monitoring
                </h2>

                <p class="text-gray-500">
                    Lihat statistik dan pemantauan data.
                </p>

            </a>

            <!-- ANALISIS -->
            <a href="{{ route('user.analisis') }}"
               class="bg-white rounded-2xl shadow p-8 hover:shadow-xl transition">

                <div class="text-4xl mb-4">
                    📈
                </div>

                <h2 class="text-xl font-bold text-slate-800 mb-2">
                    Analisis & Prediksi
                </h2>

                <p class="text-gray-500">
                    Analisis regresi linear dan rekomendasi.
                </p>

            </a>

        </div>

    </div>

</x-app-layout>