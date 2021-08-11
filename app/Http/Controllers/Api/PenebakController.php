<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use Illuminate\Http\Request;

class PenebakController extends Controller
{
    public function getPenebak($id)
    {
<<<<<<< HEAD
        $penebak = Penebak::select('penebak.*', 'dompet_digital.nama_dompet', 'users.name as kepala_cabang')
            ->leftJoin('dompet_digital', 'penebak.tipe_pembayaran', 'dompet_digital.id')
            ->leftJoin('users', 'penebak.kepala_cabang', 'users.id')
            ->where('penebak.id', $id)
            ->first();
=======
        $penebak = Penebak::with('user')->where("id", $id)->first();
>>>>>>> d2e58eea8c94ee96c621bfb067fdc60688ece7e3
        return response()->json($penebak, 200);
    }
}
