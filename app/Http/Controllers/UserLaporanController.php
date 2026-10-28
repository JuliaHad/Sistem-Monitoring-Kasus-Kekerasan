<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\KabupatenKota;
use App\Models\StatusPekerjaan;
use App\Models\StatusPerkawinan;
use App\Models\TempatKejadian;
use App\Models\BentukKekerasan;
use App\Models\TingkatPendidikan;
use App\Models\JenisLayanan;

class UserLaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where(
            'user_id',
            auth()->id()
        )->latest()->get();

        return view(
            'user.laporan.index',
            compact('laporans')
        );
    }

    public function create()
    {
        $kabupatenKotas = KabupatenKota::all();

        $statusPekerjaans = StatusPekerjaan::all();

        $statusPerkawinans = StatusPerkawinan::all();

        $tempatKejadians = TempatKejadian::all();

        $bentukKekerasans = BentukKekerasan::all();

        $tingkatPendidikans = TingkatPendidikan::all();

        $jenisLayanans = JenisLayanan::all();

        return view(
            'user.laporan.create',
            compact(
                'kabupatenKotas',
                'statusPekerjaans',
                'statusPerkawinans',
                'tempatKejadians',
                'bentukKekerasans',
                'tingkatPendidikans',
                'jenisLayanans'
            )
        );
    }

    public function store(Request $request)
    {
        $request->validate([
    'nama_pelapor' => 'required',
    'no_hp' => 'required',
    'alamat' => 'required',
    'usia_korban' => 'required|integer',

    'kabupaten_kota_id' => 'required|exists:kabupaten_kota,id',
    'status_pekerjaan_id' => 'required|exists:status_pekerjaan,id',
    'status_perkawinan_id' => 'required|exists:status_perkawinan,id',
    'tempat_kejadian_id' => 'required|exists:tempat_kejadian,id',
    'bentuk_kekerasan_id' => 'required|exists:bentuk_kekerasan,id',
    'tingkat_pendidikan_id' => 'required|exists:tingkat_pendidikan,id',
    'jenis_layanan_id' => 'required|exists:jenis_layanan,id',

    'deskripsi' => 'required',
]);

        Laporan::create([
            'user_id' => auth()->id(),
            'tahun' => date('Y'),
            'nama_pelapor' => $request->nama_pelapor,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'usia_korban' => $request->usia_korban,
            'kabupaten_kota_id' => $request->kabupaten_kota_id,
            'status_pekerjaan_id' => $request->status_pekerjaan_id,
            'status_perkawinan_id' => $request->status_perkawinan_id,
            'tempat_kejadian_id' => $request->tempat_kejadian_id,
            'bentuk_kekerasan_id' => $request->bentuk_kekerasan_id,
            'tingkat_pendidikan_id' => $request->tingkat_pendidikan_id,
            'jenis_layanan_id' => $request->jenis_layanan_id,
            'deskripsi' => $request->deskripsi,
            'status_verifikasi' => 'Menunggu',
        ]);

        return redirect()
            ->route('lapor-kasus.index')
            ->with(
                'success',
                'Laporan berhasil dikirim'
            );
    }
}