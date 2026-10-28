<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Kasus;
use Illuminate\Http\Request;

class PdfController extends Controller
{
    public function kasus(Request $request)
    {
        $query = Kasus::with([
            'kabupatenKota',
            'statusPekerjaan',
            'statusPerkawinan',
            'tempatKejadian',
            'bentukKekerasan',
            'tingkatPendidikan',
            'jenisLayanan'
        ]);

        if ($request->filled('tahun')) {
            $query->where('tahun', $request->tahun);
        }

        $kasus = $query->get();

        $tahun = $request->tahun ?? 'Semua Tahun';

        $pdf = Pdf::loadView(
            'pdf.kasus',
            compact('kasus', 'tahun')
        )->setPaper('a4', 'landscape');

        return $pdf->download(
            'laporan-data-kasus-' . ($request->tahun ?? 'semua') . '.pdf'
        );
    }
}