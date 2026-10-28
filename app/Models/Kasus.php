<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasus extends Model
{
    use HasFactory;

    protected $table = 'kasus';

    protected $fillable = [
        'laporan_id',
        'tahun',
        'kabupaten_kota_id',
        'status_pekerjaan_id',
        'status_perkawinan_id',
        'tempat_kejadian_id',
        'bentuk_kekerasan_id',
        'tingkat_pendidikan_id',
        'jenis_layanan_id',
        'usia_korban'
    ];

    /**
     * Relasi ke laporan
     * Banyak kasus dimiliki satu laporan
     */
    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    /**
     * Relasi ke kabupaten/kota
     */
    public function kabupatenKota()
    {
        return $this->belongsTo(KabupatenKota::class);
    }

    /**
     * Relasi ke status pekerjaan
     */
    public function statusPekerjaan()
    {
        return $this->belongsTo(StatusPekerjaan::class);
    }

    /**
     * Relasi ke status perkawinan
     */
    public function statusPerkawinan()
    {
        return $this->belongsTo(StatusPerkawinan::class);
    }

    /**
     * Relasi ke tempat kejadian
     */
    public function tempatKejadian()
    {
        return $this->belongsTo(TempatKejadian::class);
    }

    /**
     * Relasi ke bentuk kekerasan
     */
    public function bentukKekerasan()
    {
        return $this->belongsTo(BentukKekerasan::class);
    }

    /**
     * Relasi ke tingkat pendidikan
     */
    public function tingkatPendidikan()
    {
        return $this->belongsTo(TingkatPendidikan::class);
    }

    /**
     * Relasi ke jenis layanan
     */
    public function jenisLayanan()
    {
        return $this->belongsTo(JenisLayanan::class);
    }
}