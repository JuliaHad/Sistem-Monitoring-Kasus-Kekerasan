<?php

namespace App\Http\Controllers;

use App\Models\Kasus;

class UserKasusController extends Controller
{
    public function index()
    {
        $tahun = request('tahun');

        $query = Kasus::with([
            'kabupatenKota',
            'statusPekerjaan',
            'statusPerkawinan',
            'tempatKejadian',
            'bentukKekerasan',
            'tingkatPendidikan',
            'jenisLayanan'
        ]);

        if ($tahun) {
            $query->where('tahun', $tahun);
        }

        $kasus = $query->latest()->get();

        $tahunList = Kasus::select('tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun');

        return view(
            'user.kasus.index',
            compact(
                'kasus',
                'tahunList'
            )
        );
    }
}