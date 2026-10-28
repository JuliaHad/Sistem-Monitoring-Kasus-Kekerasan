<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-yellow-100 via-green-200 to-emerald-700 p-6">

        <div class="max-w-2xl mx-auto bg-white/90 backdrop-blur p-8 rounded-2xl shadow">

            <h2 class="text-xl font-bold mb-6 text-center">
                Edit Data Laporan
            </h2>

            <form action="{{ route('laporan.update', $laporan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- TAHUN KEJADIAN -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Tahun Kejadian</label>
                    <input type="text" name="tahun_kejadian"
                        value="{{ $laporan->tahun_kejadian }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                <!-- LOKASI -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Kabupaten / Kota</label>
                    <input type="text" name="lokasi"
                        value="{{ $laporan->lokasi }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                <!-- USIA -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Usia Korban</label>
                    <input type="number" name="usia_korban"
                        value="{{ $laporan->usia_korban }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                <!-- STATUS PEKERJAAN -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Status Pekerjaan</label>
                    <input type="text" name="status_pekerjaan"
                        value="{{ $laporan->status_pekerjaan }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                <!-- TEMPAT KEJADIAN -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Tempat Kejadian</label>
                    <input type="text" name="tempat_kejadian"
                        value="{{ $laporan->tempat_kejadian }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                <!-- BENTUK KEKERASAN -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Bentuk Kekerasan</label>
                    <input type="text" name="bentuk_kekerasan"
                        value="{{ $laporan->bentuk_kekerasan }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                <!-- PENDIDIKAN -->
                <div class="mb-4">
                    <label class="block mb-1 font-semibold">Tingkat Pendidikan</label>
                    <input type="text" name="tingkat_pendidikan"
                        value="{{ $laporan->tingkat_pendidikan }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                 <!-- JENIS LAYANAN -->
                <div class="mb-6">
                    <label class="block mb-1 font-semibold">Jenis Layanan</label>
                    <input type="text" name="jenis_layanan"
                        value="{{ $laporan->jenis_layanan }}"
                        class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400">
                </div>

                <!-- BUTTON -->
                <div class="text-center">
                    <button class="bg-gradient-to-r from-yellow-300 via-green-400 to-emerald-700 text-white px-6 py-2 rounded-lg shadow hover:scale-105 transition">
                        Update Data
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>