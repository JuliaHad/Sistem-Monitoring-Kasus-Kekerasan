<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Analisis extends Model
{
    protected $table = 'analisis';

    protected $fillable = [
        'monitoring_id',
        'slope',
        'intercept',
        'trend',
    ];

    public function monitoring()
    {
        return $this->belongsTo(Monitoring::class);
    }

    public function prediksi()
    {
        return $this->hasMany(Prediksi::class);
    }
}