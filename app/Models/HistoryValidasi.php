<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryValidasi extends Model
{
    protected $table = "validasi_history";
    protected $primaryKey = 'id_history';

    use HasFactory;

    public function penebak()
    {
        return $this->belongsTo('App\Models\Penebak', 'id_penebak', 'id');
    }

    public function validasi()
    {
        return $this->belongsTo('App\Models\Validasi', 'id_validasi', 'id');
    }
}
