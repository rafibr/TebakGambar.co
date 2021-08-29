<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use Illuminate\Http\Request;

class PenebakController extends Controller
{
    public function getPenebak($id)
    {
        $penebak = Penebak::select('*')
            ->leftJoin('dompet_digital', 'penebak.id_dompet', 'dompet_digital.id_dompet')
            ->leftJoin('users', 'penebak.id_kepala_cabang', 'users.id')
            ->where('id_penebak', $id)
            ->first();
        return response()->json($penebak, 200);
    }
}
