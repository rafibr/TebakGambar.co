<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penebak extends Model
{
    protected $table = "penebak";
    use HasFactory;

    protected $fillable = [
        'name',
        'alamat_idena',
        'tipe_pembayaran',
        'no_hp_pembayaran',
        'kepala_cabang',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
