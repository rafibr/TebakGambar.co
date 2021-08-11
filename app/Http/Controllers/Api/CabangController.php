<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Penebak;
use App\Models\User;
use Illuminate\Http\Request;

class CabangController extends Controller
{
    public function getCountPenebak($id)
    {
        $penebak = Penebak::where('kepala_cabang', $id)
            ->count();
        return response()->json($penebak, 200);
    }
    public function getCabangProfile($id)
    {
        $penebak = User::where('id', $id)
            ->first();
        return response()->json($penebak, 200);
    }
}
