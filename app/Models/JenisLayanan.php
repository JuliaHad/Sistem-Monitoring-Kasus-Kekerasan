<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisLayanan extends Model
{
    protected $table = 'jenis_layanan';

    protected $fillable = [
        'nama_layanan'
    ];

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}
