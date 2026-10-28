<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prediksi extends Model
{
    protected $table = 'prediksi';

    protected $fillable = [
        'analisis_id',
        'tahun_prediksi',
        'hasil_prediksi',
    ];

    public function analisis()
    {
        return $this->belongsTo(Analisis::class);
    }

    public function rekomendasi()
    {
        return $this->hasMany(Rekomendasi::class);
    }
}