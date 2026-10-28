<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Laporan;

class OperatorController extends Controller
{
    public function dashboard()
    {
        /*
        |--------------------------------------------------------------------------
        | STATISTIK LAPORAN
        |--------------------------------------------------------------------------
        */

        $totalLaporan = Laporan::count();

        $menunggu = Laporan::where(
            'status_verifikasi',
            'Menunggu'
        )->count();

        $diverifikasi = Laporan::where(
            'status_verifikasi',
            'Diverifikasi'
        )->count();

        $ditolak = Laporan::where(
            'status_verifikasi',
            'Ditolak'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | TOTAL KASUS
        |--------------------------------------------------------------------------
        */

        $totalKasus = Kasus::count();


        /*
        |--------------------------------------------------------------------------
        | LAPORAN TERBARU
        |--------------------------------------------------------------------------
        */

        $laporanTerbaru = Laporan::latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | STATUS LAPORAN
        |--------------------------------------------------------------------------
        */

        $statusLaporan = [
            'Diverifikasi' => $diverifikasi,
            'Ditolak' => $ditolak,
            'Menunggu' => $menunggu,
        ];


        /*
        |--------------------------------------------------------------------------
        | KABUPATEN/KOTA TERBANYAK
        |--------------------------------------------------------------------------
        */

        $kabupatenTerbanyak = Kasus::with('kabupatenKota')
            ->get()
            ->groupBy(function ($item) {
                return $item->kabupatenKota->nama_kabupaten ?? 'Tidak diketahui';
            })
            ->map->count()
            ->sortDesc()
            ->keys()
            ->first() ?? '-';


        /*
        |--------------------------------------------------------------------------
        | BENTUK KEKERASAN TERBANYAK
        |--------------------------------------------------------------------------
        */

        $kekerasanTerbanyak = Kasus::with('bentukKekerasan')
            ->get()
            ->groupBy(function ($item) {
                return $item->bentukKekerasan->nama_kekerasan ?? 'Tidak diketahui';
            })
            ->map->count()
            ->sortDesc()
            ->keys()
            ->first() ?? '-';


        /*
        |--------------------------------------------------------------------------
        | JENIS LAYANAN TERBANYAK
        |--------------------------------------------------------------------------
        */

        $layananTerbanyak = Kasus::with('jenisLayanan')
            ->get()
            ->groupBy(function ($item) {
                return $item->jenisLayanan->nama_layanan ?? 'Tidak diketahui';
            })
            ->map->count()
            ->sortDesc()
            ->keys()
            ->first() ?? '-';


        return view('operator.dashboard', compact(
            'totalLaporan',
            'menunggu',
            'diverifikasi',
            'ditolak',
            'totalKasus',
            'laporanTerbaru',
            'statusLaporan',
            'kabupatenTerbanyak',
            'kekerasanTerbanyak',
            'layananTerbanyak'
        ));
    }
}