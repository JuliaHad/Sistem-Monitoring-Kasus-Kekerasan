<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPekerjaan extends Model
{
    protected $table = 'status_pekerjaan';

    protected $fillable = [
    'nama_status'
];

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}