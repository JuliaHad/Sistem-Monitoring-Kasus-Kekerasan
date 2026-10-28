<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - P3AKB</title>

    @vite(['resources/css/app.css'])
</head>
<body>

<div class="min-h-screen bg-gradient-to-br from-slate-950 via-blue-900 to-cyan-700">

    <div class="container mx-auto px-6 min-h-screen flex items-center">

        <!-- PANEL KIRI -->
        <div class="hidden lg:flex w-1/2 flex-col justify-center text-white pr-12">

            <div class="flex items-center gap-4 mb-8">

                <img
                    src="{{ asset('images/logo-p3akb.svg') }}"
                    alt="Logo P3AKB"
                    class="w-16 h-16 object-contain">

                <div>

                    <h1 class="text-5xl font-bold leading-tight">
                        Aplikasi Monitoring
                    </h1>

                    <h2 class="text-3xl font-bold text-cyan-300">
                        Dinas P3AKB
                    </h2>

                </div>

            </div>

            <p class="text-lg text-slate-200 mb-8 leading-relaxed">
                Aplikasi Monitoring Data Kekerasan Perempuan dan Anak
                Dinas Pemberdayaan Perempuan, Perlindungan Anak
                dan Keluarga Berencana Provinsi Kalimantan Selatan.
            </p>

            <div class="space-y-4">

                <div class="bg-white/10 p-5 rounded-2xl border border-white/10">

                    <h3 class="font-bold text-lg mb-2">
                        📊 Monitoring Statistik
                    </h3>

                    <p class="text-slate-200">
                        Memantau perkembangan kasus berdasarkan wilayah,
                        usia korban, pekerjaan dan bentuk kekerasan.
                    </p>

                </div>

                <div class="bg-white/10 p-5 rounded-2xl border border-white/10">

                    <h3 class="font-bold text-lg mb-2">
                        📈 Analisis & Prediksi
                    </h3>

                    <p class="text-slate-200">
                        Prediksi tren kasus menggunakan metode
                        Regresi Linear Sederhana.
                    </p>

                </div>

                <div class="bg-white/10 p-5 rounded-2xl border border-white/10">

                    <h3 class="font-bold text-lg mb-2">
                        📌 Rekomendasi Otomatis
                    </h3>

                    <p class="text-slate-200">
                        Membantu pengambilan keputusan berdasarkan
                        hasil analisis data kasus.
                    </p>

                </div>

            </div>

        </div>

        <!-- PANEL KANAN -->
        <div class="w-full lg:w-1/2 flex justify-center">

            <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl p-10">

                <div class="text-center mb-8">

                    <div class="w-20 h-20 mx-auto rounded-full bg-blue-100 flex items-center justify-center text-4xl">
                        👤
                    </div>

                    <h2 class="text-4xl font-bold text-slate-800 mt-4">
                        Register Akun
                    </h2>

                    <p class="text-slate-500 mt-2">
                        Buat akun baru untuk mengakses sistem
                    </p>

                </div>

                @if ($errors->any())
                    <div class="mb-4 p-4 rounded-lg bg-red-100 border border-red-300">
                        <ul class="text-red-600 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium">
                            Nama Lengkap
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            autofocus
                            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-500">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-500">
                    </div>

                    <div class="mb-4">
                        <label class="block mb-2 text-sm font-medium">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            required
                            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-500">
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 text-sm font-medium">
                            Konfirmasi Password
                        </label>

                        <input
                            type="password"
                            name="password_confirmation"
                            required
                            class="w-full border rounded-xl px-4 py-3 focus:ring-2 focus:ring-cyan-500">
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-cyan-600 hover:bg-cyan-700 text-white font-bold py-3 rounded-xl transition">

                        DAFTAR AKUN

                    </button>

                    <div class="text-center mt-6">

                        <span class="text-gray-600">
                            Sudah punya akun?
                        </span>

                        <a
                            href="{{ route('login') }}"
                            class="text-cyan-600 font-semibold">

                            Masuk

                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>
