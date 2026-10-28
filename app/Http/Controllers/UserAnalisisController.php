<?php

namespace App\Http\Controllers;

use App\Models\Kasus;

class UserAnalisisController extends Controller
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
        |
        | Jika tahun dipilih:
        |
        | 2025
        |
        | maka data regresi:
        |
        | 2023
        | 2024
        | 2025
        |
        | sehingga prediksi:
        |
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
        | REGRESI LINEAR
        |--------------------------------------------------------------------------
        */

        if ($n > 1) {

            $sumX = array_sum($x);
            $sumY = array_sum($y);

            $sumXY = 0;
            $sumX2 = 0;

            for ($i = 0; $i < $n; $i++) {

                $sumXY +=
                    $x[$i] * $y[$i];

                $sumX2 +=
                    $x[$i] * $x[$i];
            }


            /*
            |--------------------------------------------------------------------------
            | PEMBAGI
            |--------------------------------------------------------------------------
            */

            $pembagi =
                ($n * $sumX2)
                - ($sumX * $sumX);


            if ($pembagi != 0) {

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
                    / $pembagi;


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

                if ($b > 0) {

                    $trend = 'MENINGKAT';

                } elseif ($b < 0) {

                    $trend = 'MENURUN';

                } else {

                    $trend = 'STABIL';
                }


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

                $prediksi =
                    round(
                        $a + ($b * ($n + 1))
                    );

                $prediksi =
                    max(0, $prediksi);
            }

        } elseif ($n === 1) {

            /*
            |--------------------------------------------------------------------------
            | DATA BELUM CUKUP
            |--------------------------------------------------------------------------
            */

            $trend =
                'DATA BELUM CUKUP';

            $prediksi = 0;

            $tahunPrediksi =
                (int) $data->last()->tahun + 1;
        }


        /*
        |--------------------------------------------------------------------------
        | DATA GRAFIK
        |--------------------------------------------------------------------------
        */

        $labels = [];

        $dataAsli = [];

        $dataTrend = [];

        foreach ($data as $i => $d) {

            $labels[] =
                (int) $d->tahun;

            $dataAsli[] =
                (int) $d->jumlah;

            if ($n > 1) {

                $dataTrend[] =
                    round(
                        $a + ($b * ($i + 1))
                    );

            } else {

                $dataTrend[] = null;
            }
        }


        /*
        |--------------------------------------------------------------------------
        | TAMBAHKAN TITIK PREDIKSI
        |--------------------------------------------------------------------------
        */

        if (
            $n > 1 &&
            $tahunPrediksi !== null
        ) {

            $labels[] =
                $tahunPrediksi;

            $dataAsli[] =
                null;

            $dataTrend[] =
                $prediksi;
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL KASUS
        |--------------------------------------------------------------------------
        */

        $totalKasus = Kasus::when(
            $tahun,
            fn ($q) => $q->where('tahun', $tahun)
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOP 6 KABUPATEN / KOTA
        |--------------------------------------------------------------------------
        |
        | Variabel ini harus bernama $wilayah karena Blade menggunakan:
        |
        | @forelse($wilayah as $nama => $total)
        |
        */

        $wilayahQuery = Kasus::with('kabupatenKota');

        if ($tahun) {

            $wilayahQuery->where(
                'tahun',
                $tahun
            );
        }

        $wilayah = $wilayahQuery
            ->get()
            ->groupBy(function ($item) {

                return optional(
                    $item->kabupatenKota
                )->nama_kabupaten
                    ?? 'Tidak diketahui';
            })
            ->map(function ($items) {

                return $items->count();
            })
            ->sortDesc()
            ->take(6);


        /*
        |--------------------------------------------------------------------------
        | KABUPATEN / KOTA TERTINGGI
        |--------------------------------------------------------------------------
        |
        | Tetap disediakan sebagai alias agar kompatibel
        | dengan bagian sistem yang mungkin masih menggunakannya.
        |
        */

        $kabupatenTertinggi =
            $wilayah->keys()->first()
            ?? null;


        /*
        |--------------------------------------------------------------------------
        | PERIODE ANALISIS
        |--------------------------------------------------------------------------
        */

        if ($data->count() > 0) {

            $tahunAwal =
                (int) $data->first()->tahun;

            $tahunAkhir =
                (int) $data->last()->tahun;

            if ($tahunAwal === $tahunAkhir) {

                $periodeData =
                    'Analisis menggunakan data tahun '
                    . $tahunAwal;

            } else {

                $periodeData =
                    'Analisis menggunakan data tahun '
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
        | NILAI SLOPE DAN INTERCEPT
        |--------------------------------------------------------------------------
        */

        $slope =
            round($b, 2);

        $intercept =
            round($a, 2);


        /*
        |--------------------------------------------------------------------------
        | VIEW USER
        |--------------------------------------------------------------------------
        */

        return view(
            'user.analisis',
            compact(
                'tahun',
                'periodeData',
                'totalKasus',
                'trend',
                'prediksi',
                'tahunPrediksi',
                'labels',
                'dataAsli',
                'dataTrend',
                'wilayah',
                'kabupatenTertinggi',
                'a',
                'b',
                'slope',
                'intercept'
            )
        );
    }
}