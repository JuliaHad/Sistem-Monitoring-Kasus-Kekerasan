<?php

namespace App\Http\Controllers\Operator;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\KasusImport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kasus;
use App\Models\Laporan;
use App\Models\KabupatenKota;
use App\Models\StatusPekerjaan;
use App\Models\StatusPerkawinan;
use App\Models\TempatKejadian;
use App\Models\BentukKekerasan;
use App\Models\TingkatPendidikan;
use App\Models\JenisLayanan;

class KasusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Kasus::with([
            'laporan',
            'kabupatenKota',
            'statusPekerjaan',
            'statusPerkawinan',
            'tempatKejadian',
            'bentukKekerasan',
            'tingkatPendidikan',
            'jenisLayanan'
        ]);

        if (request('tahun')) {
            $query->where(
                'tahun',
                request('tahun')
            );
        }

        $kasus = $query->get();

        return view(
            'operator.kasus.index',
            compact('kasus')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $laporan = null;

        if (request('laporan_id')) {
            $laporan = Laporan::findOrFail(
                request('laporan_id')
            );
        }

        $laporans = Laporan::all();
        $kabupatenKotas = KabupatenKota::all();
        $statusPekerjaans = StatusPekerjaan::all();
        $statusPerkawinans = StatusPerkawinan::all();
        $tempatKejadians = TempatKejadian::all();
        $bentukKekerasans = BentukKekerasan::all();
        $tingkatPendidikans = TingkatPendidikan::all();
        $jenisLayanans = JenisLayanan::all();

        return view(
            'operator.kasus.create',
            compact(
                'laporan',
                'laporans',
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'laporan_id' => 'nullable',
            'tahun' => 'required',
            'kabupaten_kota_id' => 'required',
            'status_pekerjaan_id' => 'required',
            'status_perkawinan_id' => 'required',
            'tempat_kejadian_id' => 'required',
            'bentuk_kekerasan_id' => 'required',
            'tingkat_pendidikan_id' => 'required',
            'jenis_layanan_id' => 'required',
            'usia_korban' => 'required|integer|min:0',
        ]);

        if ($request->laporan_id) {

            $cekKasus = Kasus::where(
                'laporan_id',
                $request->laporan_id
            )->first();

            if ($cekKasus) {

                return back()->with(
                    'error',
                    'Laporan sudah diverifikasi'
                );
            }
        }

        Kasus::create([
            'laporan_id' => $request->laporan_id,
            'tahun' => $request->tahun,
            'kabupaten_kota_id' => $request->kabupaten_kota_id,
            'status_pekerjaan_id' => $request->status_pekerjaan_id,
            'status_perkawinan_id' => $request->status_perkawinan_id,
            'tempat_kejadian_id' => $request->tempat_kejadian_id,
            'bentuk_kekerasan_id' => $request->bentuk_kekerasan_id,
            'tingkat_pendidikan_id' => $request->tingkat_pendidikan_id,
            'jenis_layanan_id' => $request->jenis_layanan_id,
            'usia_korban' => $request->usia_korban,
        ]);

        if ($request->laporan_id) {

            Laporan::where(
                'id',
                $request->laporan_id
            )->update([
                'status_verifikasi' => 'Diverifikasi'
            ]);
        }

        return redirect()
            ->route('operator.kasus.index')
            ->with(
                'success',
                'Data kasus berhasil disimpan.'
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kasus = Kasus::findOrFail($id);

        $laporans = Laporan::all();
        $kabupatenKotas = KabupatenKota::all();
        $statusPekerjaans = StatusPekerjaan::all();
        $statusPerkawinans = StatusPerkawinan::all();
        $tempatKejadians = TempatKejadian::all();
        $bentukKekerasans = BentukKekerasan::all();
        $tingkatPendidikans = TingkatPendidikan::all();
        $jenisLayanans = JenisLayanan::all();

        return view(
            'operator.kasus.edit',
            compact(
                'kasus',
                'laporans',
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

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $kasus = Kasus::findOrFail($id);

        $laporan = Laporan::find($request->laporan_id);

        $kasus->update([
            'laporan_id' => $request->laporan_id,
            'tahun' => $laporan
                ? $laporan->tahun
                : $request->tahun,
            'kabupaten_kota_id' => $request->kabupaten_kota_id,
            'status_pekerjaan_id' => $request->status_pekerjaan_id,
            'status_perkawinan_id' => $request->status_perkawinan_id,
            'tempat_kejadian_id' => $request->tempat_kejadian_id,
            'bentuk_kekerasan_id' => $request->bentuk_kekerasan_id,
            'tingkat_pendidikan_id' => $request->tingkat_pendidikan_id,
            'jenis_layanan_id' => $request->jenis_layanan_id,
            'usia_korban' => $request->usia_korban,
        ]);

        return redirect()
            ->route('operator.kasus.index')
            ->with(
                'success',
                'Data kasus berhasil diperbarui.'
            );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);

        $kasus->delete();

        return redirect()
            ->route('operator.kasus.index')
            ->with(
                'success',
                'Data kasus berhasil dihapus.'
            );
    }

    /**
     * Import data from Excel.
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        Excel::import(
            new KasusImport,
            $request->file('file')
        );

        return redirect()
            ->route('operator.kasus.index')
            ->with(
                'success',
                'Data berhasil diimport'
            );
    }
}