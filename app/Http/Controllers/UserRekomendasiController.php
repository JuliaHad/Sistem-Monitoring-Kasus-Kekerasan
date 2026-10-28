<?php

namespace App\Http\Controllers;

use App\Models\Kasus;

class UserRekomendasiController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | FILTER TAHUN
        |--------------------------------------------------------------------------
        */

        $tahun = request('tahun');


        /*
        |--------------------------------------------------------------------------
        | DATA KASUS UNTUK ANALISIS TREND
        |--------------------------------------------------------------------------
        |
        | Jika tahun dipilih, analisis menggunakan data sampai tahun tersebut.
        | Contoh:
        | ?tahun=2025
        | maka data 2020, 2021, ..., 2025 digunakan.
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
        | REGRESI LINEAR
        |--------------------------------------------------------------------------
        */

        $x = [];
        $y = [];

        foreach ($data as $i => $d) {
            $x[] = $i + 1;
            $y[] = (int) $d->jumlah;
        }

        $n = count($x);

        $a = 0;
        $b = 0;

        $trend = 'DATA BELUM CUKUP';
        $prediksi = 0;
        $tahunPrediksi = null;


        if ($n > 1) {

            $sumX = array_sum($x);
            $sumY = array_sum($y);

            $sumXY = 0;
            $sumX2 = 0;

            for ($i = 0; $i < $n; $i++) {
                $sumXY += $x[$i] * $y[$i];
                $sumX2 += $x[$i] * $x[$i];
            }

            $pembagi = ($n * $sumX2) - ($sumX * $sumX);


            if ($pembagi != 0) {

                /*
                | Koefisien regresi
                */
                $b = (
                    (($n * $sumXY) - ($sumX * $sumY))
                    / $pembagi
                );

                /*
                | Konstanta
                */
                $a = (
                    ($sumY - ($b * $sumX))
                    / $n
                );


                /*
                | Trend
                */
                if ($b > 0) {
                    $trend = 'MENINGKAT';
                } elseif ($b < 0) {
                    $trend = 'MENURUN';
                } else {
                    $trend = 'STABIL';
                }


                /*
                | Tahun prediksi
                */
                $tahunTerakhir = (int) $data->last()->tahun;

                $tahunPrediksi = $tahunTerakhir + 1;


                /*
                | Prediksi tahun berikutnya
                */
                $prediksi = round(
                    $a + ($b * ($n + 1))
                );

                /*
                | Prediksi tidak boleh negatif
                */
                $prediksi = max(0, $prediksi);
            }

        } elseif ($n === 1) {

            /*
            | Jika hanya terdapat satu tahun data,
            | regresi linear belum dapat dilakukan.
            */
            $trend = 'DATA BELUM CUKUP';

            $prediksi = 0;

            $tahunPrediksi =
                (int) $data->last()->tahun + 1;
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL KASUS
        |--------------------------------------------------------------------------
        |
        | Total kasus mengikuti tahun yang dipilih.
        |
        */

        $totalKasus = Kasus::when(
            $tahun,
            fn ($q) => $q->where('tahun', $tahun)
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOP 6 KABUPATEN / KOTA
        |--------------------------------------------------------------------------
        */

        $kabupatenQuery = Kasus::with('kabupatenKota');

        if ($tahun) {
            $kabupatenQuery->where('tahun', $tahun);
        }

        $kabupatenTop6 = $kabupatenQuery
            ->get()
            ->groupBy(function ($item) {
                return optional($item->kabupatenKota)->nama_kabupaten
                    ?? 'Tidak diketahui';
            })
            ->map(function ($items) {
                return $items->count();
            })
            ->sortDesc()
            ->take(6);


        /*
        |--------------------------------------------------------------------------
        | TOP 6 BENTUK KEKERASAN
        |--------------------------------------------------------------------------
        */

        $kekerasanQuery = Kasus::with('bentukKekerasan');

        if ($tahun) {
            $kekerasanQuery->where('tahun', $tahun);
        }

        $kekerasanTop6 = $kekerasanQuery
            ->get()
            ->groupBy(function ($item) {
                return optional($item->bentukKekerasan)->nama_kekerasan
                    ?? 'Tidak diketahui';
            })
            ->map(function ($items) {
                return $items->count();
            })
            ->sortDesc()
            ->take(6);


        /*
        |--------------------------------------------------------------------------
        | TOP 6 JENIS LAYANAN
        |--------------------------------------------------------------------------
        */

        $layananQuery = Kasus::with('jenisLayanan');

        if ($tahun) {
            $layananQuery->where('tahun', $tahun);
        }

        $layananTop6 = $layananQuery
            ->get()
            ->groupBy(function ($item) {
                return optional($item->jenisLayanan)->nama_layanan
                    ?? 'Tidak diketahui';
            })
            ->map(function ($items) {
                return $items->count();
            })
            ->sortDesc()
            ->take(6);


        /*
        |--------------------------------------------------------------------------
        | DATA DOMINAN
        |--------------------------------------------------------------------------
        |
        | Mengambil kategori dengan jumlah kasus paling tinggi.
        |
        */

        $kabupatenDominan =
            $kabupatenTop6->keys()->first()
            ?? 'Tidak tersedia';

        $kekerasanDominan =
            $kekerasanTop6->keys()->first()
            ?? 'Tidak tersedia';

        $layananDominan =
            $layananTop6->keys()->first()
            ?? 'Tidak tersedia';


        /*
        |--------------------------------------------------------------------------
        | TINGKAT RISIKO
        |--------------------------------------------------------------------------
        |
        | Penentuan risiko mengikuti hasil trend analisis:
        |
        | MENINGKAT       -> TINGGI
        | STABIL          -> SEDANG
        | MENURUN         -> RENDAH
        | DATA BELUM CUKUP -> RENDAH
        |
        */

        if ($trend === 'MENINGKAT') {

            $risiko = 'TINGGI';

        } elseif ($trend === 'STABIL') {

            $risiko = 'SEDANG';

        } else {

            $risiko = 'RENDAH';
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
                    'Rekomendasi menggunakan data tahun '
                    . $tahunAwal;

            } else {

                $periodeData =
                    'Rekomendasi menggunakan data tahun '
                    . $tahunAwal
                    . '–'
                    . $tahunAkhir;
            }

        } else {

            $periodeData =
                'Data kasus belum tersedia';
        }


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            'user.rekomendasi',
            compact(
                'tahun',
                'periodeData',

                'totalKasus',

                'trend',
                'prediksi',
                'tahunPrediksi',

                'risiko',

                'kabupatenTop6',
                'kekerasanTop6',
                'layananTop6',

                'kabupatenDominan',
                'kekerasanDominan',
                'layananDominan',

                'a',
                'b'
            )
        );
    }
}