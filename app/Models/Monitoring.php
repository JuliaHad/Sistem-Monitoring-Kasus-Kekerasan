<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitoring extends Model
{
    protected $fillable = [
        'laporan_id',
        'tahun',
        'total_kasus',
    ];

    public function laporan()
    {
        return $this->belongsTo(Laporan::class);
    }

    public function analisis()
    {
        return $this->hasMany(Analisis::class);
    }
}