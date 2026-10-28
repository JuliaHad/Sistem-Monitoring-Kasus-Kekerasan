<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login P3AKB</title>

    @vite(['resources/css/app.css'])
</head>
<body>

<div class="min-h-screen flex bg-gradient-to-r from-slate-900 via-blue-900 to-cyan-700">

    <!-- KIRI -->
    <div class="hidden lg:flex lg:w-1/2 flex-col justify-center px-16 text-white">

        <div class="flex items-center gap-4 mb-8">

            <img
                src="{{ asset('images/logo-p3akb.svg') }}"
                alt="Logo P3AKB"
                class="w-20 h-20 object-contain">

            <div>

                <h1 class="text-4xl font-bold">
                    Aplikasi Monitoring
                </h1>

                <h2 class="text-2xl font-semibold text-cyan-300">
                    Dinas P3AKB
                </h2>

            </div>

        </div>

        <p class="text-lg text-slate-200 mb-10">
            Aplikasi Monitoring Data Kekerasan Perempuan dan Anak
            Dinas Pemberdayaan Perempuan, Perlindungan Anak dan
            Keluarga Berencana Provinsi Kalimantan Selatan.
        </p>

        <div class="space-y-5">

            <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/20">

                <h3 class="font-bold text-lg">
                    📊 Monitoring Statistik
                </h3>

                <p class="text-slate-200 mt-2">
                    Memantau perkembangan kasus berdasarkan wilayah,
                    usia korban, pekerjaan dan bentuk kekerasan.
                </p>

            </div>

            <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/20">

                <h3 class="font-bold text-lg">
                    📈 Analisis & Prediksi
                </h3>

                <p class="text-slate-200 mt-2">
                    Prediksi tren kasus menggunakan metode
                    Regresi Linear Sederhana.
                </p>

            </div>

            <div class="bg-white/10 backdrop-blur-md p-5 rounded-2xl border border-white/20">

                <h3 class="font-bold text-lg">
                    📌 Rekomendasi Otomatis
                </h3>

                <p class="text-slate-200 mt-2">
                    Membantu pengambilan keputusan berdasarkan
                    hasil analisis data kasus.
                </p>

            </div>

        </div>

    </div>

    <!-- KANAN -->
    <div class="w-full lg:w-1/2 flex items-center justify-center p-8">

        <div class="w-full max-w-md bg-white/10 backdrop-blur-xl border border-white/20 shadow-2xl rounded-3xl p-8">

            <div class="text-center mb-8">

                <img
                    src="{{ asset('images/logo-p3akb.svg') }}"
                    class="w-20 h-20 mx-auto mb-4">

                <h2 class="text-3xl font-bold text-white">
                    Selamat Datang
                </h2>

                <p class="text-slate-200 mt-2">
                    Masuk untuk melanjutkan ke dashboard
                </p>

            </div>

            <x-auth-session-status
                class="mb-4"
                :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">

                @csrf

                <div>

                    <x-input-label
                        for="email"
                        :value="__('Email')"
                        class="text-white"/>

                    <x-text-input
                        id="email"
                        class="block mt-1 w-full"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        autocomplete="username" />

                </div>

                <div class="mt-4">

                    <x-input-label
                        for="password"
                        :value="__('Password')"
                        class="text-white"/>

                    <x-text-input
                        id="password"
                        class="block mt-1 w-full"
                        type="password"
                        name="password"
                        required
                        autocomplete="current-password" />

                </div>

                <div class="block mt-4">

                    <label
                        for="remember_me"
                        class="inline-flex items-center">

                        <input
                            id="remember_me"
                            type="checkbox"
                            class="rounded border-gray-300"
                            name="remember">

                        <span class="ms-2 text-sm text-white">
                            Ingat Saya
                        </span>

                    </label>

                </div>

                <div class="flex items-center justify-between mt-6">

                    @if (Route::has('password.request'))

                        <a
                            class="text-sm text-cyan-300 hover:text-cyan-200"
                            href="{{ route('password.request') }}">

                            Lupa Password?

                        </a>

                    @endif

                    <x-primary-button>

                        Masuk

                    </x-primary-button>

                </div>

                <div class="text-center mt-6">

                    <span class="text-slate-200">
                        Belum punya akun?
                    </span>

                    <a
                        href="{{ route('register') }}"
                        class="text-cyan-300 font-semibold">

                        Register

                    </a>

                </div>

            </form>

        </div>

    </div>

</div>

</body>
</html>