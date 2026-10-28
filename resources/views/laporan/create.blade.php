<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-yellow-100 via-green-200 to-emerald-700 p-6">

        <div class="max-w-2xl mx-auto bg-white/90 backdrop-blur p-8 rounded-2xl shadow">

            <h2 class="text-xl font-bold mb-6 text-center">
                Tambah Data Laporan
            </h2>

            <form action="{{ route('laporan.store') }}" method="POST">
                @csrf

                <!-- TAHUN KEJADIAN -->
                <div class="mb-4">
    <label class="block mb-2 font-semibold">
        Tahun Kejadian
    </label>

    <input
    type="text"
    name="tahun"
    placeholder="Masukkan tahun"
    class="w-full rounded border-gray-300 focus:ring-2 focus:ring-green-400"
    required
>
</div>

                <!-- Kab/Kota -->
                <div class="mb-4">
    <label class="block mb-1">Kabupaten / Kota</label>
    <select name="lokasi" class="w-full rounded border-gray-300" required>
        <option value="">-- Pilih Kabupaten/Kota --</option>
        <option value="Balangan">Balangan</option>
        <option value="Banjar">Banjar</option>
        <option value="Barito Kuala">Barito Kuala</option>
        <option value="Hulu Sungai Selatan">Hulu Sungai Selatan</option>
        <option value="Hulu Sungai Tengah">Hulu Sungai Tengah</option>
        <option value="Hulu Sungai Utara">Hulu Sungai Utara</option>
        <option value="Kota Banjarbaru">Kota Banjarbaru</option>
        <option value="Kota Banjarmasin">Kota Banjarmasin</option>
        <option value="Kotabaru">Kotabaru</option>
        <option value="Tabalong">Tabalong</option>
        <option value="Tanah Bumbu">Tanah Bumbu</option>
        <option value="Tanah Laut">Tanah Laut</option>
        <option value="Tapin">Tapin</option>
    </select>
</div>

                <!-- Usia Korban -->
                <div class="mb-4">
    <label class="block mb-1">Usia Korban</label>
    <input type="number"
           name="usia_korban"
           placeholder="Masukkan usia (contoh: 15)"
           class="w-full rounded border-gray-300"
           min="0"
           required>
</div>

                <!-- STATUS PEKERJAAN -->
                <div class="mb-4">
    <label class="block mb-1">Status Pekerjaan</label>
    <select name="status_pekerjaan" class="w-full rounded border-gray-300">
        <option value="">-- Pilih Status --</option>
        <option value="Tidak Bekerja">Tidak Bekerja</option>
        <option value="Bekerja">Bekerja</option>
        <option value="Pelajar">Pelajar</option>
        <option value="Mengurus Rumah Tangga">Mengurus Rumah Tangga</option>
        <option value="NA">NA</option>
    </select>
</div>

<!-- STATUS PERKAWINAN -->
                <div class="mb-4">
    <label class="block mb-1">Status Perkawinan</label>
    <select name="status_pekerjaan" class="w-full rounded border-gray-300">
        <option value="">-- Pilih Status --</option>
        <option value="Tidak Bekerja">Belum Kawin</option>
        <option value="Bekerja">Kawin</option>
        <option value="Pelajar">Cerai</option>
    </select>
</div>

                <!-- TEMPAT KEJADIAN -->
                <div class="mb-4">
    <label class="block mb-1">Tempat Kejadian</label>
    <select name="tempat_kejadian" class="w-full rounded border-gray-300" required>
        <option value="">-- Pilih Tempat --</option>
        <option value="Rumah Tangga">Rumah Tangga</option>
        <option value="Tempat Kerja">Tempat Kerja</option>
        <option value="Sekolah">Sekolah</option>
        <option value="Fasilitas Umum">Fasilitas Umum</option>
        <option value="Lembaga Pendidikan Kilat">Lembaga Pendidikan Kilat</option>
        <option value="Lainnya">Lainnya</option>
    </select>
</div>

                <!-- BENTUK KEKERASAN -->
                <div class="mb-4">
    <label class="block mb-1">Bentuk Kekerasan</label>
    <select name="bentuk_kekerasan" class="w-full rounded border-gray-300" required>
        <option value="">-- Pilih Bentuk --</option>
        <option value="Fisik">Fisik</option>
        <option value="Psikis">Psikis</option>
        <option value="Seksual">Seksual</option>
        <option value="Eksploitasi">Eksploitasi</option>
        <option value="Trafficking">Trafficking</option>
        <option value="Penelantaran">Penelantaran</option>
        <option value="Lainnya">Lainnya</option>
    </select>
</div>

                <!-- PENDIDIKAN -->
                <div class="mb-4">
    <label class="block mb-1">Tingkat Pendidikan</label>
    <select name="tingkat_pendidikan" class="w-full rounded border-gray-300" required>
        <option value="">-- Pilih Pendidikan --</option>
        <option value="Tidak / Belum Pernah Sekolah">Tidak / Belum Pernah Sekolah</option>
        <option value="SD">SD</option>
        <option value="SLTP">SLTP</option>
        <option value="SLTA">SLTA</option>
        <option value="Perguruan Tinggi">Perguruan Tinggi</option>
        <option value="PAUD/TK">PAUD/TK</option>
        <option value="NA">NA</option>
    </select>
</div>

                <!-- JENIS LAYANAN -->
                <div class="mb-4">
    <label class="block mb-1">Jenis Layanan</label>
    <select name="jenis_layanan" class="w-full rounded border-gray-300" required>
        <option value="">-- Pilih Layanan --</option>
        <option value="Pengaduan">Pengaduan</option>
        <option value="Kesehatan">Kesehatan</option>
        <option value="Bantuan Hukum">Bantuan Hukum</option>
        <option value="Penegakan Hukum">Penegakan Hukum</option>
        <option value="Rehabilitasi Sosial">Rehabilitasi Sosial</option>
        <option value="Reintegrasi Sosial">Reintegrasi Sosial</option>
        <option value="Pemulangan">Pemulangan</option>
        <option value="Pendampingan Tokoh Agama">Pendampingan Tokoh Agama</option>
    </select>
</div>

                <!-- BUTTON -->
                <div class="text-center">
                    <button class="bg-gradient-to-r from-yellow-300 via-green-400 to-emerald-700 text-white px-6 py-2 rounded-lg shadow hover:scale-105 transition">
                        Simpan Data
                    </button>
                </div>

            </form>

        </div>

    </div>
</x-app-layout>