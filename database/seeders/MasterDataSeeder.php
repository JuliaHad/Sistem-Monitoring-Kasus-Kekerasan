<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | KABUPATEN / KOTA
        |--------------------------------------------------------------------------
        */

        $kabupatenKota = [
            'Kabupaten Balangan',
            'Kabupaten Banjar',
            'Kabupaten Barito Kuala',
            'Kabupaten Hulu Sungai Selatan',
            'Kabupaten Hulu Sungai Tengah',
            'Kabupaten Hulu Sungai Utara',
            'Kabupaten Kotabaru',
            'Kabupaten Tabalong',
            'Kabupaten Tanah Bumbu',
            'Kabupaten Tanah Laut',
            'Kabupaten Tapin',
            'Kota Banjarbaru',
            'Kota Banjarmasin',
        ];

        foreach ($kabupatenKota as $nama) {

            if (!DB::table('kabupaten_kota')
                ->where('nama_kabupaten', $nama)
                ->exists()) {

                DB::table('kabupaten_kota')->insert([
                    'nama_kabupaten' => $nama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | STATUS PEKERJAAN
        |--------------------------------------------------------------------------
        */

        $pekerjaan = [
            'Pelajar/Mahasiswa',
            'PNS',
            'Pegawai Swasta',
            'Wiraswasta',
            'Ibu Rumah Tangga',
            'Petani',
            'Nelayan',
            'Buruh',
            'Tidak Bekerja',
            'Lainnya',
        ];

        foreach ($pekerjaan as $nama) {

            if (!DB::table('status_pekerjaan')
                ->where('nama_pekerjaan', $nama)
                ->exists()) {

                DB::table('status_pekerjaan')->insert([
                    'nama_pekerjaan' => $nama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | STATUS PERKAWINAN
        |--------------------------------------------------------------------------
        */

        $perkawinan = [
            'Belum Menikah',
            'Menikah',
            'Cerai Hidup',
            'Cerai Mati',
        ];

        foreach ($perkawinan as $nama) {

            if (!DB::table('status_perkawinan')
                ->where('nama_perkawinan', $nama)
                ->exists()) {

                DB::table('status_perkawinan')->insert([
                    'nama_perkawinan' => $nama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | TEMPAT KEJADIAN
        |--------------------------------------------------------------------------
        */

        $tempat = [
            'Rumah',
            'Sekolah',
            'Tempat Kerja',
            'Tempat Umum',
            'Fasilitas Kesehatan',
            'Media Sosial/Internet',
            'Lainnya',
        ];

        foreach ($tempat as $nama) {

            if (!DB::table('tempat_kejadian')
                ->where('nama_tempat', $nama)
                ->exists()) {

                DB::table('tempat_kejadian')->insert([
                    'nama_tempat' => $nama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | BENTUK KEKERASAN
        |--------------------------------------------------------------------------
        */

        $kekerasan = [
            'Kekerasan Fisik',
            'Kekerasan Psikis',
            'Kekerasan Seksual',
            'Penelantaran',
            'Eksploitasi',
            'Kekerasan Dalam Rumah Tangga',
            'Lainnya',
        ];

        foreach ($kekerasan as $nama) {

            if (!DB::table('bentuk_kekerasan')
                ->where('nama_kekerasan', $nama)
                ->exists()) {

                DB::table('bentuk_kekerasan')->insert([
                    'nama_kekerasan' => $nama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | TINGKAT PENDIDIKAN
        |--------------------------------------------------------------------------
        */

        $pendidikan = [
            'Tidak Sekolah',
            'SD/Sederajat',
            'SMP/Sederajat',
            'SMA/Sederajat',
            'Diploma',
            'Sarjana',
            'Pascasarjana',
        ];

        foreach ($pendidikan as $nama) {

            if (!DB::table('tingkat_pendidikan')
                ->where('nama_pendidikan', $nama)
                ->exists()) {

                DB::table('tingkat_pendidikan')->insert([
                    'nama_pendidikan' => $nama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | JENIS LAYANAN
        |--------------------------------------------------------------------------
        */

        $layanan = [
            'Pengaduan',
            'Konseling',
            'Pendampingan Hukum',
            'Pelayanan Kesehatan',
            'Rehabilitasi',
            'Perlindungan',
            'Rujukan',
            'Lainnya',
        ];

        foreach ($layanan as $nama) {

            if (!DB::table('jenis_layanan')
                ->where('nama_layanan', $nama)
                ->exists()) {

                DB::table('jenis_layanan')->insert([
                    'nama_layanan' => $nama,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}