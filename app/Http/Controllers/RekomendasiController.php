<?php

namespace App\Http\Controllers;

use App\Models\Kasus;

class RekomendasiController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | TAHUN YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $tahun = request('tahun');


        /*
        |--------------------------------------------------------------------------
        | DATA REGRESI
        |--------------------------------------------------------------------------
        */

        $data = Kasus::when(
            $tahun,
            fn ($q) => $q->where('tahun', '<=', $tahun)
        )
        ->selectRaw('tahun, COUNT(*) as jumlah')
        ->groupBy('tahun')
        ->orderBy('tahun')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA X DAN Y
        |--------------------------------------------------------------------------
        */

        $x = [];
        $y = [];

        foreach ($data as $i => $d) {

            $x[] = $i + 1;
            $y[] = (int) $d->jumlah;
        }

        $n = count($x);


        /*
        |--------------------------------------------------------------------------
        | NILAI AWAL REGRESI
        |--------------------------------------------------------------------------
        */

        $a = 0;
        $b = 0;

        $trend = 'DATA BELUM CUKUP';

        $prediksi = 0;

        $tahunPrediksi = null;


        /*
        |--------------------------------------------------------------------------
        | REGRESI LINEAR SEDERHANA
        |--------------------------------------------------------------------------
        */

        if ($n > 1) {

            $sumX = array_sum($x);
            $sumY = array_sum($y);

            $sumXY = 0;
            $sumX2 = 0;

            for ($i = 0; $i < $n; $i++) {

                $sumXY += $x[$i] * $y[$i];

                $sumX2 += $x[$i] * $x[$i];
            }


            $penyebut =
                ($n * $sumX2)
                - ($sumX * $sumX);


            if ($penyebut != 0) {

                /*
                |--------------------------------------------------------------------------
                | SLOPE
                |--------------------------------------------------------------------------
                */

                $b =
                    (
                        ($n * $sumXY)
                        - ($sumX * $sumY)
                    )
                    / $penyebut;


                /*
                |--------------------------------------------------------------------------
                | INTERCEPT
                |--------------------------------------------------------------------------
                */

                $a =
                    (
                        $sumY
                        - ($b * $sumX)
                    )
                    / $n;


                /*
                |--------------------------------------------------------------------------
                | TREND
                |--------------------------------------------------------------------------
                */

                $trend =
                    $b > 0
                        ? 'MENINGKAT'
                        : ($b < 0 ? 'MENURUN' : 'STABIL');


                /*
                |--------------------------------------------------------------------------
                | TAHUN PREDIKSI
                |--------------------------------------------------------------------------
                */

                $tahunTerakhir =
                    (int) $data->last()->tahun;

                $tahunPrediksi =
                    $tahunTerakhir + 1;


                /*
                |--------------------------------------------------------------------------
                | PREDIKSI
                |--------------------------------------------------------------------------
                */

                $prediksi = round(
                    $a + ($b * ($n + 1))
                );

                $prediksi = max(0, $prediksi);
            }

        } elseif ($n === 1) {

            $trend = 'DATA BELUM CUKUP';

            $prediksi = 0;

            $tahunPrediksi =
                (int) $data->last()->tahun + 1;
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL KASUS TAHUN YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $totalKasus = Kasus::when(
            $tahun,
            fn ($q) => $q->where('tahun', $tahun)
        )->count();


        /*
        |--------------------------------------------------------------------------
        | DATA KASUS PADA PERIODE YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $kasusPeriode = Kasus::with([
            'kabupatenKota',
            'bentukKekerasan',
            'jenisLayanan',
        ])
        ->when(
            $tahun,
            fn ($q) => $q->where('tahun', $tahun)
        )
        ->get();


        /*
        |--------------------------------------------------------------------------
        | DATA DOMINAN
        |--------------------------------------------------------------------------
        */

        $kabupatenData = $kasusPeriode
            ->groupBy(function ($item) {

                return $item->kabupatenKota->nama_kabupaten
                    ?? 'Tidak diketahui';

            })
            ->map
            ->count()
            ->sortDesc();


        $kekerasanData = $kasusPeriode
            ->groupBy(function ($item) {

                return $item->bentukKekerasan->nama_kekerasan
                    ?? 'Tidak diketahui';

            })
            ->map
            ->count()
            ->sortDesc();


        $layananData = $kasusPeriode
            ->groupBy(function ($item) {

                return $item->jenisLayanan->nama_layanan
                    ?? 'Tidak diketahui';

            })
            ->map
            ->count()
            ->sortDesc();


        /*
        |--------------------------------------------------------------------------
        | TOP 6
        |--------------------------------------------------------------------------
        */

        $kabupatenTop6 =
            $kabupatenData->take(6);

        $kekerasanTop6 =
            $kekerasanData->take(6);

        $layananTop6 =
            $layananData->take(6);


        /*
        |--------------------------------------------------------------------------
        | DATA DOMINAN PERINGKAT PERTAMA
        |--------------------------------------------------------------------------
        */

        $kabupatenDominan =
            $kabupatenData->keys()->first() ?? '-';

        $kekerasanDominan =
            $kekerasanData->keys()->first() ?? '-';

        $layananDominan =
            $layananData->keys()->first() ?? '-';


        /*
        |--------------------------------------------------------------------------
        | ALIAS VARIABEL LAMA
        |--------------------------------------------------------------------------
        |
        | Dipertahankan agar Blade lama maupun Blade baru
        | tetap dapat menggunakan variabel tersebut.
        |
        */

        $wilayah =
            $kabupatenDominan;

        $bentukKekerasan =
            $kekerasanDominan;

        $jenisLayanan =
            $layananDominan;


        $kabupatenTertinggi =
            $kabupatenTop6;

        $kekerasanTertinggi =
            $kekerasanTop6;

        $layananTertinggi =
            $layananTop6;


        /*
        |--------------------------------------------------------------------------
        | TINGKAT RISIKO
        |--------------------------------------------------------------------------
        */

        if ($trend === 'MENINGKAT') {

            $tingkatRisiko = 'TINGGI';

        } elseif ($trend === 'MENURUN') {

            $tingkatRisiko = 'SEDANG';

        } elseif ($trend === 'STABIL') {

            $tingkatRisiko = 'RENDAH';

        } else {

            $tingkatRisiko = 'BELUM DITENTUKAN';
        }


        /*
        |--------------------------------------------------------------------------
        | ALIAS RISIKO
        |--------------------------------------------------------------------------
        |
        | Beberapa Blade menggunakan $risiko,
        | sedangkan Blade Admin sebelumnya menggunakan
        | $tingkatRisiko.
        |
        */

        $risiko =
            $tingkatRisiko;


        /*
        |--------------------------------------------------------------------------
        | PERSENTASE RISIKO
        |--------------------------------------------------------------------------
        |
        | Digunakan jika Blade menampilkan persentase risiko.
        |
        */

        if ($risiko === 'TINGGI') {

            $persentaseRisiko = 90;

        } elseif ($risiko === 'SEDANG') {

            $persentaseRisiko = 60;

        } elseif ($risiko === 'RENDAH') {

            $persentaseRisiko = 20;

        } else {

            $persentaseRisiko = 0;
        }


        /*
        |--------------------------------------------------------------------------
        | REKOMENDASI SISTEM
        |--------------------------------------------------------------------------
        */

        $rekomendasi = [];


        if ($trend === 'MENINGKAT') {

            $rekomendasi[] = [
                'judul' =>
                    'Tingkatkan Sosialisasi dan Edukasi',

                'deskripsi' =>
                    'Tingkatkan sosialisasi dan edukasi pencegahan kekerasan terhadap perempuan dan anak.',
            ];


            $rekomendasi[] = [
                'judul' =>
                    'Perkuat Layanan Pendampingan',

                'deskripsi' =>
                    'Perkuat layanan pendampingan dan penanganan korban.',
            ];


            if ($kabupatenDominan !== '-') {

                $rekomendasi[] = [
                    'judul' =>
                        'Prioritaskan Wilayah Dominan',

                    'deskripsi' =>
                        'Prioritaskan intervensi pada wilayah '
                        . $kabupatenDominan
                        . '.',
                ];
            }


        } elseif ($trend === 'MENURUN') {

            $rekomendasi[] = [
                'judul' =>
                    'Pertahankan Program yang Berjalan',

                'deskripsi' =>
                    'Program yang berjalan saat ini perlu dipertahankan karena tren kasus menurun.',
            ];


            $rekomendasi[] = [
                'judul' =>
                    'Monitoring Wilayah Dominan',

                'deskripsi' =>
                    'Tetap lakukan monitoring pada wilayah '
                    . ($kabupatenDominan !== '-'
                        ? $kabupatenDominan
                        : 'rawan')
                    . '.',
            ];


            $rekomendasi[] = [
                'judul' =>
                    'Pertahankan Edukasi Masyarakat',

                'deskripsi' =>
                    'Lanjutkan edukasi masyarakat untuk mempertahankan penurunan kasus.',
            ];


        } else {

            $rekomendasi[] = [
                'judul' =>
                    'Tingkatkan Kualitas Data',

                'deskripsi' =>
                    'Perlu peningkatan kelengkapan dan konsistensi pencatatan data kasus.',
            ];


            $rekomendasi[] = [
                'judul' =>
                    'Evaluasi Program',

                'deskripsi' =>
                    'Lakukan evaluasi program secara berkala berdasarkan data yang tersedia.',
            ];
        }


        /*
        |--------------------------------------------------------------------------
        | PRIORITAS PROGRAM
        |--------------------------------------------------------------------------
        */

        if ($trend === 'MENINGKAT') {

            $prioritasTinggi =
                'Penanganan kasus '
                . ($kekerasanDominan !== '-'
                    ? $kekerasanDominan
                    : 'kekerasan')
                . ' di wilayah '
                . ($kabupatenDominan !== '-'
                    ? $kabupatenDominan
                    : 'dominan')
                . '.';


            $prioritasSedang =
                'Penguatan layanan '
                . ($layananDominan !== '-'
                    ? $layananDominan
                    : 'pendampingan')
                . '.';


            $prioritasRendah =
                'Monitoring dan evaluasi rutin.';


        } elseif ($trend === 'MENURUN') {

            $prioritasTinggi =
                'Pemantauan berkelanjutan pada wilayah '
                . ($kabupatenDominan !== '-'
                    ? $kabupatenDominan
                    : 'rawan')
                . '.';


            $prioritasSedang =
                'Pemeliharaan layanan '
                . ($layananDominan !== '-'
                    ? $layananDominan
                    : 'pendampingan')
                . '.';


            $prioritasRendah =
                'Monitoring dan evaluasi rutin.';


        } else {

            $prioritasTinggi =
                'Peningkatan kualitas dan kelengkapan data kasus.';


            $prioritasSedang =
                'Evaluasi program penanganan dan pencegahan.';


            $prioritasRendah =
                'Monitoring data secara berkala.';
        }


        /*
        |--------------------------------------------------------------------------
        | PERIODE DATA
        |--------------------------------------------------------------------------
        */

        if ($data->count() > 0) {

            $tahunAwal =
                (int) $data->first()->tahun;

            $tahunAkhir =
                (int) $data->last()->tahun;


            if ($tahunAwal === $tahunAkhir) {

                $periodeData =
                    'Berdasarkan data tahun '
                    . $tahunAwal;

            } else {

                $periodeData =
                    'Berdasarkan data tahun '
                    . $tahunAwal
                    . '–'
                    . $tahunAkhir;
            }

        } else {

            $periodeData =
                'Periode data belum tersedia';
        }


        /*
        |--------------------------------------------------------------------------
        | PILIH VIEW
        |--------------------------------------------------------------------------
        */

        if (request()->routeIs('operator.*')) {

            $view =
                'operator.rekomendasi.index';

        } elseif (request()->routeIs('admin.*')) {

            $view =
                'admin.rekomendasi.index';

        } else {

            $view =
                'rekomendasi.index';
        }


        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            $view,
            compact(
                'tahun',
                'periodeData',
                'totalKasus',

                'trend',
                'a',
                'b',
                'prediksi',
                'tahunPrediksi',

                // Data dominan lama
                'wilayah',
                'bentukKekerasan',
                'jenisLayanan',

                // Data dominan baru
                'kabupatenDominan',
                'kekerasanDominan',
                'layananDominan',

                // Top 6
                'kabupatenTop6',
                'kekerasanTop6',
                'layananTop6',

                // Alias Top 6 lama
                'kabupatenTertinggi',
                'kekerasanTertinggi',
                'layananTertinggi',

                // Risiko
                'risiko',
                'tingkatRisiko',
                'persentaseRisiko',

                // Rekomendasi
                'rekomendasi',

                // Prioritas
                'prioritasTinggi',
                'prioritasSedang',
                'prioritasRendah'
            )
        );
    }
}