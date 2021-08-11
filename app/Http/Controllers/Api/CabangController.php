<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function getCountPenebak($id)
    {
        $penebak = Penebak::where('kepala_cabang', $id)
            ->count();
        return response()->json($penebak, 200);
    }
}
