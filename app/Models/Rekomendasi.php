<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rekomendasi extends Model
{
    protected $table = 'rekomendasi';

    protected $fillable = [
        'prediksi_id',
        'isi_rekomendasi',
    ];

    public function prediksi()
    {
        return $this->belongsTo(Prediksi::class);
    }
}