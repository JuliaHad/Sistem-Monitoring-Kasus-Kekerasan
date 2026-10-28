<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
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
        | DATA KASUS PER TAHUN UNTUK REGRESI
        |--------------------------------------------------------------------------
        |
        | Jika memilih tahun 2025:
        |
        | data yang digunakan:
        | 2023, 2024, 2025
        |
        | sehingga prediksi:
        | 2026
        |
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
        | NILAI AWAL
        |--------------------------------------------------------------------------
        */

        $a = 0;
        $b = 0;

        $trend = 'DATA BELUM CUKUP';

        $prediksi = 0;

        $tahunPrediksi = null;


        /*
        |--------------------------------------------------------------------------
        | ANALISIS REGRESI LINEAR
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


            /*
            |--------------------------------------------------------------------------
            | PENYEBUT
            |--------------------------------------------------------------------------
            */

            $penyebut =
                ($n * $sumX2)
                - ($sumX * $sumX);


            if ($penyebut != 0) {

                /*
                |--------------------------------------------------------------------------
                | SLOPE (b)
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
                | INTERCEPT (a)
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
                | NILAI PREDIKSI
                |--------------------------------------------------------------------------
                */

                $prediksi = round(
                    $a + ($b * ($n + 1))
                );


                /*
                |--------------------------------------------------------------------------
                | PREDIKSI TIDAK BOLEH NEGATIF
                |--------------------------------------------------------------------------
                */

                $prediksi = max(0, $prediksi);
            }

        } elseif ($n === 1) {

            /*
            |--------------------------------------------------------------------------
            | DATA BELUM CUKUP UNTUK REGRESI
            |--------------------------------------------------------------------------
            */

            $trend = 'DATA BELUM CUKUP';

            $prediksi = 0;

            $tahunPrediksi =
                (int) $data->last()->tahun + 1;
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL KASUS PADA TAHUN YANG DIPILIH
        |--------------------------------------------------------------------------
        |
        | Contoh:
        | tahun = 2025
        |
        | maka total kasus = kasus tahun 2025 saja.
        |
        */

        $totalKasus = Kasus::when(
            $tahun,
            fn ($q) => $q->where('tahun', $tahun)
        )->count();


        /*
        |--------------------------------------------------------------------------
        | DATA UNTUK WILAYAH, KEKERASAN, DAN LAYANAN
        |--------------------------------------------------------------------------
        |
        | Ketiga informasi ini mengikuti tahun yang sedang dipilih.
        |
        | Contoh:
        | tahun = 2025
        |
        | maka data yang digunakan hanya tahun 2025.
        |
        */

        $kasusTahun = Kasus::with([
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
        | KABUPATEN / KOTA TERTINGGI
        |--------------------------------------------------------------------------
        */

        $kabupatenTop6 = $kasusTahun
            ->groupBy(function ($item) {

                return $item->kabupatenKota->nama_kabupaten
                    ?? 'Tidak diketahui';

            })
            ->map
            ->count()
            ->sortDesc()
            ->take(6);


        /*
        |--------------------------------------------------------------------------
        | BENTUK KEKERASAN TERTINGGI
        |--------------------------------------------------------------------------
        */

        $kekerasanTop6 = $kasusTahun
            ->groupBy(function ($item) {

                return $item->bentukKekerasan->nama_kekerasan
                    ?? 'Tidak diketahui';

            })
            ->map
            ->count()
            ->sortDesc()
            ->take(6);


        /*
        |--------------------------------------------------------------------------
        | JENIS LAYANAN TERTINGGI
        |--------------------------------------------------------------------------
        */

        $layananTop6 = $kasusTahun
            ->groupBy(function ($item) {

                return $item->jenisLayanan->nama_layanan
                    ?? 'Tidak diketahui';

            })
            ->map
            ->count()
            ->sortDesc()
            ->take(6);


        /*
        |--------------------------------------------------------------------------
        | NILAI DOMINAN UNTUK NARASI REKOMENDASI
        |--------------------------------------------------------------------------
        |
        | Top 6 dikirim ke view. Untuk kalimat rekomendasi digunakan
        | peringkat pertama sebagai data yang paling dominan.
        |
        */

        $kabupatenDominan = $kabupatenTop6->keys()->first() ?? '-';
        $kekerasanDominan = $kekerasanTop6->keys()->first() ?? '-';
        $layananDominan = $layananTop6->keys()->first() ?? '-';

        // Nama variabel lama dipertahankan agar view lama tidak error.
        $kabupatenTertinggi = $kabupatenDominan;
        $kekerasanTertinggi = $kekerasanDominan;
        $layananTertinggi = $layananDominan;


        /*
        |--------------------------------------------------------------------------
        | TINGKAT RISIKO
        |--------------------------------------------------------------------------
        |
        | Risiko ditentukan berdasarkan hasil prediksi.
        |
        */

        if ($prediksi >= 20) {

            $risiko = 'TINGGI';

            $persentaseRisiko = 90;

        } elseif ($prediksi >= 10) {

            $risiko = 'SEDANG';

            $persentaseRisiko = 60;

        } else {

            $risiko = 'RENDAH';

            $persentaseRisiko = 20;
        }


        /*
        |--------------------------------------------------------------------------
        | REKOMENDASI OTOMATIS
        |--------------------------------------------------------------------------
        */

        $rekomendasi = [];


        if ($trend === 'MENINGKAT') {

            $rekomendasi[] =
                'Tingkatkan sosialisasi pencegahan kekerasan.';

            $rekomendasi[] =
                'Tambahkan layanan pendampingan korban.';

            $rekomendasi[] =
                'Fokus intervensi pada wilayah '
                . ($kabupatenDominan ?? '-')
                . '.';

        } elseif ($trend === 'MENURUN') {

            $rekomendasi[] =
                'Pertahankan program yang sudah berjalan.';

            $rekomendasi[] =
                'Lakukan monitoring rutin pada wilayah rawan.';

            $rekomendasi[] =
                'Tingkatkan edukasi masyarakat.';

        } else {

            $rekomendasi[] =
                'Perlu peningkatan kualitas data kasus.';

            $rekomendasi[] =
                'Lakukan evaluasi program secara berkala.';
        }


        /*
        |--------------------------------------------------------------------------
        | PERIODE DATA ANALISIS
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
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'operator.rekomendasi.index',
            compact(
                'tahun',
                'periodeData',
                'trend',
                'totalKasus',
                'prediksi',
                'tahunPrediksi',
                'risiko',
                'persentaseRisiko',
                'kabupatenTop6',
                'kekerasanTop6',
                'layananTop6',
                'kabupatenDominan',
                'kekerasanDominan',
                'layananDominan',
                'kabupatenTertinggi',
                'kekerasanTertinggi',
                'layananTertinggi',
                'rekomendasi'
            )
        );
    }
}