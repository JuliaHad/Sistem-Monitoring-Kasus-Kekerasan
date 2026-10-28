<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Laporan;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        $userId = auth()->id();

        // =====================================================
        // STATISTIK LAPORAN USER
        // =====================================================

        $totalLaporan = Laporan::where('user_id', $userId)->count();

        $menunggu = Laporan::where('user_id', $userId)
            ->where('status_verifikasi', 'Menunggu')
            ->count();

        $diverifikasi = Laporan::where('user_id', $userId)
            ->where('status_verifikasi', 'Diverifikasi')
            ->count();

        $ditolak = Laporan::where('user_id', $userId)
            ->where('status_verifikasi', 'Ditolak')
            ->count();

        $laporanTerbaru = Laporan::where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();


        // =====================================================
        // TOTAL SELURUH KASUS
        // =====================================================

        $totalKasus = Kasus::count();


        // =====================================================
        // TOP 6 KABUPATEN / KOTA DOMINAN
        // =====================================================

        $kabupatenTop6 = Kasus::with('kabupatenKota')
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


        // =====================================================
        // TOP 6 BENTUK KEKERASAN DOMINAN
        // =====================================================

        $kekerasanTop6 = Kasus::with('bentukKekerasan')
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


        // =====================================================
        // TOP 6 JENIS LAYANAN DOMINAN
        // =====================================================

        $layananTop6 = Kasus::with('jenisLayanan')
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


        // =====================================================
        // DATA DOMINAN UTAMA
        // =====================================================

        $kabupatenTertinggi = $kabupatenTop6->keys()->first()
            ?? 'Belum ada data';

        $kekerasanTertinggi = $kekerasanTop6->keys()->first()
            ?? 'Belum ada data';

        $layananTertinggi = $layananTop6->keys()->first()
            ?? 'Belum ada data';


        // =====================================================
        // KIRIM DATA KE VIEW
        // =====================================================

        return view(
            'user.dashboard',
            compact(
                'totalLaporan',
                'menunggu',
                'diverifikasi',
                'ditolak',
                'laporanTerbaru',

                'totalKasus',

                'kabupatenTop6',
                'kekerasanTop6',
                'layananTop6',

                'kabupatenTertinggi',
                'kekerasanTertinggi',
                'layananTertinggi'
            )
        );
    }


    // =========================================================
    // MONITORING
    // =========================================================

    public function monitoring()
    {
        return app(
            UserMonitoringController::class
        )->index();
    }


    // =========================================================
    // ANALISIS
    // =========================================================

    public function analisis()
    {
        return app(
            UserAnalisisController::class
        )->index();
    }


    // =========================================================
    // REKOMENDASI
    // =========================================================

    public function rekomendasi()
    {
        return app(
            RekomendasiController::class
        )->index();
    }
}