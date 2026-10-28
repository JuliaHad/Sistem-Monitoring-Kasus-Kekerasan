<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TempatKejadian extends Model
{
    protected $table = 'tempat_kejadian';

    protected $fillable = [
        'nama_tempat'
    ];

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}