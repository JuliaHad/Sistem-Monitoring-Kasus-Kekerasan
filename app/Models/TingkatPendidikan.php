<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TingkatPendidikan extends Model
{
    protected $table = 'tingkat_pendidikan';

    protected $fillable = [
        'nama_pendidikan'
    ];

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}