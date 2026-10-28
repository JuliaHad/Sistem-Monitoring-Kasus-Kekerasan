<?php

namespace App\Http\Controllers;

use App\Models\Kasus;

class AnalisisController extends Controller
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
        | DATA KASUS PER TAHUN
        |--------------------------------------------------------------------------
        |
        | Jika tahun dipilih:
        | contoh 2025
        |
        | maka regresi menggunakan seluruh data:
        | 2023, 2024, 2025
        |
        | Jika tidak ada filter tahun:
        | menggunakan seluruh data yang tersedia.
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
        | PERHITUNGAN REGRESI LINEAR
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

                $trend =
                    $b > 0
                        ? 'MENINGKAT'
                        : ($b < 0 ? 'MENURUN' : 'STABIL');


                /*
                |--------------------------------------------------------------------------
                | TAHUN TERAKHIR
                |--------------------------------------------------------------------------
                */

                $tahunTerakhir =
                    (int) $data->last()->tahun;


                /*
                |--------------------------------------------------------------------------
                | PREDIKSI TAHUN BERIKUTNYA
                |--------------------------------------------------------------------------
                */

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

            $a = 0;
            $b = 0;

            $trend = 'DATA BELUM CUKUP';

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


            /*
            |--------------------------------------------------------------------------
            | NILAI GARIS TREND
            |--------------------------------------------------------------------------
            */

            if ($n > 1) {

                $dataTrend[] = round(
                    $a + ($b * ($i + 1))
                );

            } else {

                $dataTrend[] = null;

            }

        }


        /*
        |--------------------------------------------------------------------------
        | TAMBAHKAN TITIK PREDIKSI KE GRAFIK
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
        | TOP 6 KABUPATEN / KOTA
        |--------------------------------------------------------------------------
        |
        | Jika tahun dipilih, Top 6 hanya dihitung
        | dari tahun tersebut.
        |
        | Jika tidak dipilih, menggunakan seluruh
        | data yang tersedia.
        |
        */

        $wilayah = Kasus::when(
            $tahun,
            fn ($q) => $q->where('tahun', $tahun)
        )
        ->with('kabupatenKota')
        ->get()
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
        | TOTAL KASUS PADA TAHUN YANG DIPILIH
        |--------------------------------------------------------------------------
        */

        $totalKasus = Kasus::when(
            $tahun,
            fn ($q) => $q->where('tahun', $tahun)
        )
        ->count();


        /*
        |--------------------------------------------------------------------------
        | PERIODE ANALISIS
        |--------------------------------------------------------------------------
        */

        if (
            $tahun &&
            $data->count() > 0
        ) {

            $tahunAwalAnalisis =
                (int) $data->first()->tahun;

            $tahunAkhirAnalisis =
                (int) $data->last()->tahun;

            $periodeData =
                "Analisis menggunakan data tahun "
                . $tahunAwalAnalisis
                . "–"
                . $tahunAkhirAnalisis;

        } elseif ($data->count() > 0) {

            $tahunAwalAnalisis =
                (int) $data->first()->tahun;

            $tahunAkhirAnalisis =
                (int) $data->last()->tahun;

            $periodeData =
                "Analisis menggunakan data tahun "
                . $tahunAwalAnalisis
                . "–"
                . $tahunAkhirAnalisis;

        } else {

            $periodeData =
                'Data kasus belum tersedia';

        }


        /*
        |--------------------------------------------------------------------------
        | PILIH VIEW BERDASARKAN ROLE
        |--------------------------------------------------------------------------
        */

        if (request()->routeIs('operator.*')) {

            $view =
                'operator.analisis.index';

        } elseif (request()->routeIs('admin.*')) {

            $view =
                'admin.analisis.index';

        } else {

            $view =
                'analisis.index';
        }


        /*
        |--------------------------------------------------------------------------
        | KIRIM DATA KE VIEW
        |--------------------------------------------------------------------------
        */

        return view(
            $view,
            compact(
                'tahun',
                'periodeData',
                'trend',
                'a',
                'b',
                'prediksi',
                'tahunPrediksi',
                'labels',
                'dataAsli',
                'dataTrend',
                'wilayah',
                'totalKasus'
            )
        );
    }
}