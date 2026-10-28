<?php

namespace App\Exports;

use App\Models\Kasus;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class KasusExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Kasus::with([
            'kabupatenKota',
            'statusPekerjaan',
            'statusPerkawinan',
            'tempatKejadian',
            'bentukKekerasan',
            'tingkatPendidikan',
            'jenisLayanan'
        ])
        ->get()
        ->map(function ($item) {

            return [

                $item->tahun,

                $item->kabupatenKota->nama_kabupaten ?? '-',

                $item->usia_korban,

                $item->statusPekerjaan->nama_status ?? '-',

                $item->statusPerkawinan->nama_status ?? '-',

                $item->tempatKejadian->nama_tempat ?? '-',

                $item->bentukKekerasan->nama_kekerasan ?? '-',

                $item->tingkatPendidikan->nama_pendidikan ?? '-',

                $item->jenisLayanan->nama_layanan ?? '-',

            ];
        });
    }

    public function headings(): array
    {
        return [

            'Tahun',
            'Kabupaten / Kota',
            'Usia Korban',
            'Status Pekerjaan',
            'Status Perkawinan',
            'Tempat Kejadian',
            'Bentuk Kekerasan',
            'Tingkat Pendidikan',
            'Jenis Layanan'

        ];
    }
}