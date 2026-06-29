<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memorial extends Model
{
    protected $fillable = [
        'nama',
        'hubungan',
        'status',
        'tanggal_dibuat',
        'foto',
        'cerita',
        'doa',
    ];
}