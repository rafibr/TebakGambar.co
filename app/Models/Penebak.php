<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penebak extends Model
{
    use HasFactory;
    protected $table = "penebak";
    public $timestamps = false;


    public function dompet()
    {
        return $this->belongsTo('App\Models\DompetDigital', 'tipe_pembayaran', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'kepala_cabang', 'id');
    }
}
