<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KabupatenKota extends Model
{
    protected $table = 'kabupaten_kota';

    protected $fillable = [
        'nama_kabupaten',
    ];
}