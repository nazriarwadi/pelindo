<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'no_ppkb',
        'nama_kapal',
        'jam_masuk',
        'jam_deploy',
        'keterangan_from',
        'keterangan_to',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'jam_masuk' => 'datetime',
        'jam_deploy' => 'datetime',
    ];
}
