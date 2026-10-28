<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Laporan;
use App\Models\KabupatenKota;
use App\Models\StatusPekerjaan;
use App\Models\StatusPerkawinan;
use App\Models\TempatKejadian;
use App\Models\BentukKekerasan;
use App\Models\TingkatPendidikan;
use App\Models\JenisLayanan;

class UserMonitoringController extends Controller
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
        | PERIODE DATA
        |--------------------------------------------------------------------------
        */

        if ($tahun) {

            $periodeData =
                'Berdasarkan data tahun ' . $tahun;

        } else {

            $tahunMin = Kasus::min('tahun');
            $tahunMax = Kasus::max('tahun');

            if ($tahunMin && $tahunMax) {

                if ($tahunMin == $tahunMax) {

                    $periodeData =
                        'Berdasarkan data tahun ' . $tahunMin;

                } else {

                    $periodeData =
                        'Berdasarkan data tahun '
                        . $tahunMin
                        . '–'
                        . $tahunMax;
                }

            } else {

                $periodeData =
                    'Periode data belum tersedia';
            }
        }


        /*
        |--------------------------------------------------------------------------
        | QUERY DASAR KASUS
        |--------------------------------------------------------------------------
        */

        $kasusQuery = Kasus::query();

        if ($tahun) {

            $kasusQuery->where('tahun', $tahun);
        }


        /*
        |--------------------------------------------------------------------------
        | TOTAL KASUS
        |--------------------------------------------------------------------------
        */

        $totalKasus =
            (clone $kasusQuery)->count();


        /*
        |--------------------------------------------------------------------------
        | RATA-RATA USIA
        |--------------------------------------------------------------------------
        */

        $rataUsia =
            (clone $kasusQuery)
                ->whereNotNull('usia_korban')
                ->avg('usia_korban');

        $rataUsia =
            round($rataUsia ?? 0, 1);


        /*
        |--------------------------------------------------------------------------
        | USIA KORBAN
        |--------------------------------------------------------------------------
        */

        $usiaKorban =
            (clone $kasusQuery)
                ->selectRaw(
                    'usia_korban, COUNT(*) as total'
                )
                ->whereNotNull('usia_korban')
                ->groupBy('usia_korban')
                ->orderBy('usia_korban')
                ->get();


        /*
        |--------------------------------------------------------------------------
        | FUNGSI HITUNG MASTER DATA
        |--------------------------------------------------------------------------
        |
        | Mengambil langsung nama dari tabel master database.
        | Dengan demikian nama kategori mengikuti data yang sebenarnya.
        |
        */

        $hitungMaster =
            function (
                $masterModel,
                $namaColumn,
                $foreignKey
            ) use ($kasusQuery) {

                $master =
                    $masterModel::query()
                        ->orderBy('id')
                        ->get();

                $jumlah =
                    (clone $kasusQuery)
                        ->selectRaw(
                            "{$foreignKey}, COUNT(*) as total"
                        )
                        ->whereNotNull($foreignKey)
                        ->groupBy($foreignKey)
                        ->pluck(
                            'total',
                            $foreignKey
                        );

                return $master
                    ->mapWithKeys(
                        function ($item) use (
                            $namaColumn,
                            $jumlah
                        ) {

                            $total =
                                (int) (
                                    $jumlah[$item->id]
                                    ?? 0
                                );

                            return [
                                $item->{$namaColumn} => $total
                            ];
                        }
                    )
                    ->filter(
                        fn ($total) => $total > 0
                    );
            };


        /*
        |--------------------------------------------------------------------------
        | STATUS PEKERJAAN
        |--------------------------------------------------------------------------
        */

        $statusPekerjaan =
            $hitungMaster(
                StatusPekerjaan::class,
                'nama_pekerjaan',
                'status_pekerjaan_id'
            );


        /*
        |--------------------------------------------------------------------------
        | STATUS PERKAWINAN
        |--------------------------------------------------------------------------
        */

        $statusPerkawinan =
            $hitungMaster(
                StatusPerkawinan::class,
                'nama_perkawinan',
                'status_perkawinan_id'
            );


        /*
        |--------------------------------------------------------------------------
        | TEMPAT KEJADIAN
        |--------------------------------------------------------------------------
        */

        $tempatKejadian =
            $hitungMaster(
                TempatKejadian::class,
                'nama_tempat',
                'tempat_kejadian_id'
            );


        /*
        |--------------------------------------------------------------------------
        | BENTUK KEKERASAN
        |--------------------------------------------------------------------------
        */

        $bentukKekerasan =
            $hitungMaster(
                BentukKekerasan::class,
                'nama_kekerasan',
                'bentuk_kekerasan_id'
            );


        /*
        |--------------------------------------------------------------------------
        | TINGKAT PENDIDIKAN
        |--------------------------------------------------------------------------
        */

        $tingkatPendidikan =
            $hitungMaster(
                TingkatPendidikan::class,
                'nama_pendidikan',
                'tingkat_pendidikan_id'
            );


        /*
        |--------------------------------------------------------------------------
        | JENIS LAYANAN
        |--------------------------------------------------------------------------
        */

        $jenisLayanan =
            $hitungMaster(
                JenisLayanan::class,
                'nama_layanan',
                'jenis_layanan_id'
            );


        /*
        |--------------------------------------------------------------------------
        | KABUPATEN / KOTA
        |--------------------------------------------------------------------------
        */

        $kabupatenKota =
            $hitungMaster(
                KabupatenKota::class,
                'nama_kabupaten',
                'kabupaten_kota_id'
            );


        /*
        |--------------------------------------------------------------------------
        | TOP 6 KABUPATEN / KOTA
        |--------------------------------------------------------------------------
        */

        $kabupatenTerbanyak =
            $kabupatenKota
                ->sortDesc()
                ->take(6);


        /*
        |--------------------------------------------------------------------------
        | TOP 6 BENTUK KEKERASAN
        |--------------------------------------------------------------------------
        */

        $kekerasanTerbanyak =
            $bentukKekerasan
                ->sortDesc()
                ->take(6);


        /*
        |--------------------------------------------------------------------------
        | TOP 6 JENIS LAYANAN
        |--------------------------------------------------------------------------
        */

        $layananTerbanyak =
            $jenisLayanan
                ->sortDesc()
                ->take(6);


        /*
        |--------------------------------------------------------------------------
        | STATUS VERIFIKASI LAPORAN
        |--------------------------------------------------------------------------
        */

        $statusVerifikasiQuery =
            Laporan::query();

        if ($tahun) {

            $statusVerifikasiQuery
                ->where('tahun', $tahun);
        }

        $statusVerifikasi =
            $statusVerifikasiQuery
                ->selectRaw(
                    'status_verifikasi, COUNT(*) as total'
                )
                ->whereNotNull('status_verifikasi')
                ->groupBy('status_verifikasi')
                ->orderBy('status_verifikasi')
                ->get();


        /*
        |--------------------------------------------------------------------------
        | VIEW USER
        |--------------------------------------------------------------------------
        */

        return view(
            'user.monitoring',
            compact(
                'tahun',
                'periodeData',
                'totalKasus',
                'rataUsia',
                'usiaKorban',
                'statusPekerjaan',
                'statusPerkawinan',
                'tempatKejadian',
                'bentukKekerasan',
                'tingkatPendidikan',
                'jenisLayanan',
                'kabupatenKota',
                'kabupatenTerbanyak',
                'kekerasanTerbanyak',
                'layananTerbanyak',
                'statusVerifikasi'
            )
        );
    }
}