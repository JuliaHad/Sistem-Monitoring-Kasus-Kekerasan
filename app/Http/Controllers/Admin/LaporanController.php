<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Kasus;

class LaporanController extends Controller
{
    public function index()
{
    $laporans = Laporan::where(
        'status_verifikasi',
        'Menunggu'
    )
    ->latest()
    ->get();

    return view(
        'admin.laporan.index',
        compact('laporans')
    );
    }

     public function verifikasi($id)
{
    $laporan = Laporan::findOrFail($id);

    $cekKasus = Kasus::where(
        'laporan_id',
        $laporan->id
    )->first();

    if ($cekKasus) {

        return redirect()
            ->route('laporan.index')
            ->with(
                'error',
                'Laporan sudah diverifikasi'
            );
    }

    Kasus::create([
    'laporan_id' => $laporan->id,

    'tahun' => $laporan->tahun,

    'kabupaten_kota_id' => $laporan->kabupaten_kota_id,
    'status_pekerjaan_id' => $laporan->status_pekerjaan_id,
    'status_perkawinan_id' => $laporan->status_perkawinan_id,
    'tempat_kejadian_id' => $laporan->tempat_kejadian_id,
    'bentuk_kekerasan_id' => $laporan->bentuk_kekerasan_id,
    'tingkat_pendidikan_id' => $laporan->tingkat_pendidikan_id,
    'usia_korban' => $laporan->usia_korban,
    'jenis_layanan_id' => 1,
]);

    $laporan->update([
        'status_verifikasi' => 'Diverifikasi'
    ]);

    return redirect()
        ->route('laporan.index')
        ->with(
            'success',
            'Laporan berhasil diverifikasi'
        );
}

    public function tolak($id)
{
    $laporan = Laporan::findOrFail($id);

    $laporan->update([
        'status_verifikasi' => 'Ditolak'
    ]);

    return redirect()
        ->route('laporan.index')
        ->with(
            'success',
            'Laporan berhasil ditolak'
        );
}

    

public function riwayat()
{
    $laporans = Laporan::whereIn(
        'status_verifikasi',
        ['Diverifikasi', 'Ditolak']
    )
    ->latest()
    ->get();

    return view('admin.laporan.riwayat', compact('laporans'));
}



    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}