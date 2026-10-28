<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use App\Models\Laporan;

class LaporanController extends Controller
{
    /**
     * Menampilkan laporan yang masuk
     */
    public function index()
    {
        $laporans = Laporan::latest()->get();

        return view('operator.laporan.index', compact('laporans'));
    }


    /**
     * Verifikasi laporan
     */
    public function verifikasi($id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->status_verifikasi = 'Diverifikasi';
        $laporan->save();

        return redirect()
            ->route('operator.laporan.index')
            ->with('success', 'Laporan berhasil diverifikasi.');
    }


    /**
     * Tolak laporan
     */
    public function tolak($id)
    {
        $laporan = Laporan::findOrFail($id);

        $laporan->status_verifikasi = 'Ditolak';
        $laporan->save();

        return redirect()
            ->route('operator.laporan.index')
            ->with('success', 'Laporan berhasil ditolak.');
    }


    /**
     * Riwayat verifikasi laporan
     */
    public function riwayat()
    {
        $laporans = Laporan::whereIn(
            'status_verifikasi',
            ['Diverifikasi', 'Ditolak']
        )
        ->latest()
        ->get();

        return view(
            'operator.laporan.riwayat',
            compact('laporans')
        );
    }
}