<?php

namespace App\Imports;

use App\Models\Kasus;
use App\Models\KabupatenKota;
use App\Models\StatusPekerjaan;
use App\Models\StatusPerkawinan;
use App\Models\TempatKejadian;
use App\Models\BentukKekerasan;
use App\Models\TingkatPendidikan;
use App\Models\JenisLayanan;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KasusImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Kasus([

            'tahun' => $row['tahun'],

            'kabupaten_kota_id' =>
                KabupatenKota::where(
                    'nama_kabupaten',
                    $row['kabupaten_kota']
                )->value('id'),

            'usia_korban' =>
                $row['usia_korban'],

            'status_pekerjaan_id' =>
                StatusPekerjaan::where(
                    'nama_pekerjaan',
                    $row['status_pekerjaan']
                )->value('id'),

            'status_perkawinan_id' =>
                StatusPerkawinan::where(
                    'nama_perkawinan',
                    $row['status_perkawinan']
                )->value('id'),

            'tempat_kejadian_id' =>
                TempatKejadian::where(
                    'nama_tempat',
                    $row['tempat_kejadian']
                )->value('id'),

            'bentuk_kekerasan_id' =>
                BentukKekerasan::where(
                    'nama_kekerasan',
                    $row['bentuk_kekerasan']
                )->value('id'),

            'tingkat_pendidikan_id' =>
                TingkatPendidikan::where(
                    'nama_pendidikan',
                    $row['tingkat_pendidikan']
                )->value('id'),

            'jenis_layanan_id' =>
                JenisLayanan::where(
                    'nama_layanan',
                    $row['jenis_layanan']
                )->value('id'),
        ]);
    }
}