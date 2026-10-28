<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
   protected $fillable = [

    'user_id',
    'tahun',

    'nama_pelapor',
    'no_hp',
    'alamat',
    'deskripsi',

    'usia_korban',

    'kabupaten_kota_id',
    'status_pekerjaan_id',
    'status_perkawinan_id',
    'tempat_kejadian_id',
    'bentuk_kekerasan_id',
    'tingkat_pendidikan_id',
    'jenis_layanan_id',

    'status_verifikasi'
];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class);
    }

    public function statusPekerjaan()
    {
        return $this->belongsTo(StatusPekerjaan::class);
    }

    public function statusPerkawinan()
    {
        return $this->belongsTo(StatusPerkawinan::class);
    }

    public function tempatKejadian()
    {
        return $this->belongsTo(TempatKejadian::class);
    }

    public function bentukKekerasan()
    {
        return $this->belongsTo(BentukKekerasan::class);
    }

    public function tingkatPendidikan()
    {
        return $this->belongsTo(TingkatPendidikan::class);
    }

    public function jenisLayanan()
{
    return $this->belongsTo(JenisLayanan::class);
}

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}