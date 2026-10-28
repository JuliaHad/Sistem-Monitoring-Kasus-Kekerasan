<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BentukKekerasan extends Model
{
    protected $table = 'bentuk_kekerasan';

    protected $fillable = [
        'nama_kekerasan'
    ];

    public function kasus()
    {
        return $this->hasMany(Kasus::class);
    }
}