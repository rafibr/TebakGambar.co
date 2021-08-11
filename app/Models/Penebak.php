<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penebak extends Model
{
    use HasFactory;
    protected $table = "penebak";

<<<<<<< HEAD

    public function dompet()
    {
        return $this->belongsTo('App\Models\DompetDigital', 'tipe_pembayaran', 'id');
    }

=======
>>>>>>> d2e58eea8c94ee96c621bfb067fdc60688ece7e3
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'kepala_cabang', 'id');
    }
}
