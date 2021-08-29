<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penebak extends Model
{
    use HasFactory;
    protected $table = "penebak";
    protected $primaryKey = "id_penebak";
    public $timestamps = false;


    public function dompet()
    {
        return $this->belongsTo('App\Models\DompetDigital', 'id_dompet', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_kepala_cabang', 'id');
    }
}
