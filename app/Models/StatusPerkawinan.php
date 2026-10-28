<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StatusPerkawinan extends Model
{
    protected $table = 'status_perkawinan';

    protected $fillable = [
    'nama_status'
];

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}